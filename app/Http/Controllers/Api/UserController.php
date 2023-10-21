<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\UserPostalCode;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::with('userpostalcode')
                    ->select('users.*','banks.name as bank_name','districts.name as district_name','regencies.name as regency_name','roles.name as role_name')
                    ->leftJoin('banks','banks.id','=','users.bank_id')
                    ->leftJoin('roles','roles.id','=','users.role_id')
                    ->leftJoin('districts','districts.id','=','users.district_id')
                    ->leftJoin('regencies','regencies.id','=','users.regency_id')
                    ->where('users.id','!=',auth()->user()->id)
                    ->orderBy('users.name');

        if(auth()->user()->role_id == 1) {
            $data->where('bank_id',auth()->user()->bank_id)
                ->where('role_id',2);
        }

        return datatables()->of($data->get())
                ->addColumn('action',function($data){
                    $edit = "<a href='#' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil'></i> Edit</a>";
                    $delete = " <a href='#' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.user.destroy',[$data->id]) . "' class='delete-item btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>";

                    return $edit.$delete;
                })
                ->addColumn('photo_rendered',function($data){
                    if($data->photo)
                        return "<img src='$data->photo' loading='lazy' class='mini-img'/>";

                    return "-";
                })
                ->editColumn('role_name',function($data){
                    if($data->role_name)
                        return $data->role_name;

                    return "-";
                })
                ->editColumn('bank_name',function($data){
                    if($data->bank_name)
                        return $data->bank_name;

                    return "-";
                })
                ->rawColumns(['action','photo_rendered'])
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'photo' => 'required|mimes:jpg,png,jpeg',
        ]);

        if($request->role_id == "2" && ($request->postal_code == null || $request->postal_code == "")){
            return $this->errorResponseObj("Kode pos wajib diisi", null);
        }

        DB::beginTransaction();
        $photo = null;

        if($request->hasFile('photo')) {

            $file_name = $request->file('photo')->getClientOriginalName();

            $file = $request->file('photo');

            $file = Image::make($file);

            if (!file_exists(storage_path('app/public/user/'))) {
                mkdir(storage_path('app/public/user/'), 0777, true);
            }

            $uploadedFileName = md5($file_name)."_".strtotime(date('Y-m-d H:i:s'))."_300px.".$request->file('photo')->getClientOriginalExtension();
            $file->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/user/'.$uploadedFileName));

            $photo = route('storage.user',[$uploadedFileName]);
        }

        $req = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => ($request->phone != 'null' ? $request->phone : null),
            'photo' => ($photo != 'undefined' ? $photo : null),
            'role_id' => ($request->role_id != '' || $request->role_id != null) ? (int)$request->role_id : null,
            'bank_id' => ($request->bank_id != 'null' ? $request->bank_id : null),
            'financial_institution_umi_id' => ($request->financial_institution_umi_id != 'null' ? $request->financial_institution_umi_id : null),
            'regency_id' => ($request->regency_id != 'null' ? $request->regency_id : null),
            'district_id' => ($request->district_id != 'null' ? $request->district_id : null)
        ];

        $data = User::create($req);

        $postal_code = explode(',',$request->postal_code);

        foreach($postal_code as $item) {
            $reqArrayPostalCode = UserPostalCode::create([
                'user_id' => $data->id,
                'postal_code' => $item ? $item : null,
            ]);
        };

        DB::commit();
        return $this->successResponseObj($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = User::where('id',$id)
                    ->with('userpostalcode')
                    ->first();

        return $this->successResponseObj($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'photo' => 'required|mimes:jpg,png,jpeg',
        ]);

        if($request->role_id == "2" && ($request->postal_code == null || $request->postal_code == "")){
            return $this->errorResponseObj("Kode pos wajib diisi", null);
        }

        DB::beginTransaction();
        $data = User::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $photo = $data->photo;

        if($request->file('photo')) {
            $file_name = $request->file('photo')->getClientOriginalName();

            if($data->photo !== null) {

                $path = explode("storage/",$data->photo);
                Storage::delete('public/'.$path[1]);
            }

            $file = $request->file('photo');

            $file = Image::make($file);

            if (!file_exists(storage_path('app/public/user/'))) {
                mkdir(storage_path('app/public/user/'), 0777, true);
            }

            $uploadedFileName = md5($file_name)."_".strtotime(date('Y-m-d H:i:s'))."_300px.".$request->file('photo')->getClientOriginalExtension();
            $file->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/user/'.$uploadedFileName));

            $photo = route('storage.user',[$uploadedFileName]);
        }

        $req = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => ($request->phone != 'null' ? $request->phone : null),
            'photo' => ($photo != 'undefined' ? $photo : null),
            'role_id' => ($request->role_id != '' || $request->role_id != null) ? (int)$request->role_id : null,
            'bank_id' => ($request->bank_id != 'null' ? $request->bank_id : null),
            'financial_institution_umi_id' => ($request->financial_institution_umi_id != 'null' ? $request->financial_institution_umi_id : null),
            'regency_id' => ($request->regency_id != 'null' ? $request->regency_id : null),
            'district_id' => ($request->district_id != 'null' ? $request->district_id : null)
        ];

        if(!empty($request->password)) {
            $req['password'] = bcrypt($request->password);
        }

        $data = $data->update($req);

        $postal_code = explode(',',$request->postal_code);

        $dataPostalCode = UserPostalCode::where('user_id', $id)->delete();

        foreach($postal_code as $item) {
            $reqArrayPostalCode = UserPostalCode::create([
                'user_id' => $id,
                'postal_code' => $item ? $item : null,
            ]);
        };

        DB::commit();
        return $this->successResponseObj($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = User::find($id);

        if($data->photo != null) {
            $path = explode("storage/",$data->photo);
            Storage::delete('public/'.$path[1]);
        }

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $data->delete($id);

        return $this->successResponseMsg("Data berhasil di hapus");
    }
}
