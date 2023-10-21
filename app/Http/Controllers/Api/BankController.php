<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Bank::orderBy('name')->get();

        return datatables()->of($data)
                ->addColumn('action',function($data){
                    $edit = "<a href='#' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil'></i> Edit</a>";
                    $delete = " <a href='#' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.bank.destroy',[$data->id]) . "' class='delete-item btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>";

                    return $edit.$delete;
                })
                ->editColumn('status',function($data){
                    return $data->status == 1 ? 'Aktif' : 'Non Aktif';
                })
                ->addColumn('logo_rendered',function($data){
                    return "<img src='$data->logo' loading='lazy' class='mini-img'/>";
                })
                ->rawColumns(['action','logo_rendered'])
                ->make(true);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',
            'logo' => 'required|mimes:jpg,png,jpeg',
        ]);

        $file_name = $request->file('logo')->getClientOriginalName();

        $file = $request->file('logo');

        $file = Image::make($file);

        if (!file_exists(storage_path('app/public/bank/'))) {
            mkdir(storage_path('app/public/bank/'), 0777, true);
        }

                // dd(!file_exists('app/public/bank/'));

                $uploadedFileName = md5($file_name)."_".strtotime(date('Y-m-d H:i:s'))."_300px.".$request->file('logo')->getClientOriginalExtension();
                $file->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/bank/'.$uploadedFileName));

                $req = [
                    'name' => $request->name,
                    'link' => $request->link,
                    'code' => $request->code,
                    'status' => $request->status,
                    'reason_status' => $request->reason_status,
                    'logo' => route('storage.bank',[$uploadedFileName]),
                ];

                $data = Bank::create($req);

                return $this->successResponseObj($data);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Bank::find($id);

        return $this->successResponseObj($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',
            'logo' => 'required|mimes:jpg,png,jpeg',
        ]);

        $data = Bank::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $logo = $data->logo;

        if($request->file('logo')) {
            $file_name = $request->file('logo')->getClientOriginalName();

            $path = explode("storage/",$data->logo);
            Storage::delete('public/'.$path[1]);

            $file = $request->file('logo');

            $file = Image::make($file);

            if (!file_exists(storage_path('app/public/bank/'))) {
                mkdir(storage_path('app/public/bank/'), 0777, true);
            }

            // dd(!file_exists('storage/app/public/bank/'));

            $uploadedFileName = md5($file_name)."_".strtotime(date('Y-m-d H:i:s'))."_300px.".$request->file('logo')->getClientOriginalExtension();
            $file->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/bank/'.$uploadedFileName));

            $logo = route('storage.bank',[$uploadedFileName]);
        }

        $req = [
            'name' => $request->name,
            'link' => $request->link,
            'code' => $request->code,
            'status' => $request->status,
            'reason_status' => $request->reason_status,
            'logo' => $logo,
        ];

        // dd($data);

        $data = $data->update($req);

        $data = Bank::find($id);

        return $this->successResponseObj($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Bank::find($id);
        $path = explode("storage/",$data->logo);
        Storage::delete('public/'.$path[1]);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $data->delete($id);

        return $this->successResponseMsg("Data berhasil di hapus");

    }

    public function search(Request $request)
    {
        $data = Bank::select('banks.id','banks.name','banks.code')->where('status', '1');

        if($request->search) {
            $data = $data->where(function($query) use($request){
                $query->where('banks.name','like',"%$request->search%");
                $query->orWhere('banks.code','like',"%$request->search%");
            });
        }

        if(auth()->user()->role_id == 1){
            $data = $data->where('id', auth()->user()->bank_id)->get();
        }else{
            $data = $data->get();
        }
        return $this->successResponseObj($data);
    }
}
