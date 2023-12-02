<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FinancialInstitutionUmi;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



class FinancialInstitutionUmiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = FinancialInstitutionUmi::orderBy('name')->get();

        return datatables()->of($data)
                ->addColumn('action',function($data){
                    $edit = "<a href='#' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil'></i> Edit</a>";
                    $delete = " <a href='#' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.financial-institution-umi.destroy',[$data->id]) . "' class='delete-item btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>";

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
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',
            'logo' => 'required',
        ]);

        $file_name = $request->file('logo')->getClientOriginalName();

        $file = $request->file('logo');

        $file = Image::make($file);

        if (!file_exists(storage_path('app/public/financial-institution-umi/'))) {
            mkdir(storage_path('app/public/financial-institution-umi/'), 0777, true);
        }

        // dd(!file_exists('app/public/bank/'));

        $uploadedFileName = md5($file_name)."_".strtotime(date('Y-m-d H:i:s'))."_300px.".$request->file('logo')->getClientOriginalExtension();
        $file->resize(null, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path('app/public/financial-institution-umi/'.$uploadedFileName));

        $req = [
            'name' => $request->name,
            'link' => $request->link,
            'code' => $request->code,
            'status' => $request->status,
            'reason_status' => $request->reason_status,
            'logo' => route('storage.financial-institution-umi',[$uploadedFileName]),
        ];

        $data = FinancialInstitutionUmi::create($req);

        return $this->successResponseObj($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = FinancialInstitutionUmi::find($id);

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
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',
            'logo' => 'required',
        ]);

        $data = FinancialInstitutionUmi::find($id);

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

            if (!file_exists(storage_path('app/public/financial-institution-umi/'))) {
                mkdir(storage_path('app/public/financial-institution-umi/'), 0777, true);
            }

            // dd(!file_exists('storage/app/public/bank/'));

            $uploadedFileName = md5($file_name)."_".strtotime(date('Y-m-d H:i:s'))."_300px.".$request->file('logo')->getClientOriginalExtension();
            $file->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/financial-institution-umi/'.$uploadedFileName));

            $logo = route('storage.financial-institution-umi',[$uploadedFileName]);
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

        $data = FinancialInstitutionUmi::find($id);

        return $this->successResponseObj($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = FinancialInstitutionUmi::find($id);
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
        $data = FinancialInstitutionUmi::select('financial_institution_umis.id','financial_institution_umis.name','financial_institution_umis.code');

        if($request->search) {
            $data = $data->where(function($query) use($request){
                $query->where('financial_institution_umis.name','like',"%$request->search%");
                $query->orWhere('financial_institution_umis.code','like',"%$request->search%");
            });
        }

        $data = $data->limit(7)->get();
        return $this->successResponseObj($data);
    }


}
