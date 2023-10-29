<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Termin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Yajra\DataTables\Facades\DataTables;
// use DataTables;


class TerminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = Termin::orderBy('value')->get();

        return datatables()->of($data)
                ->addColumn('action',function($data){
                    $edit = "<a href='#' @click='editTermin($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil'></i> Edit</a>";
                    $delete = " <a href='#' @click='deleteTermin($data->id)' data-id='$data->id' data-url='" . route('api.termin.destroy',[$data->id]) . "' class='delete-item btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>";

                    return $edit.$delete;
                })
                ->editColumn('value',function($data){
                    return $data->value;
                })
                ->rawColumns(['action', 'value'])
                ->make(true);


        #gabungin sama json pesan pribadi
        // $result = datatables()->of($data)

        // ->addColumn('action', function ($data) {
        //     $edit = "<a href='#' @click='editTermin($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil'></i> Edit</a>";
        //     $delete = " <a href='#' @click='deleteTermin($data->id)' data-id='$data->id' data-url='" . route('api.termin.destroy', [$data->id]) . "' class='delete-item btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>";

        //     return $edit . $delete;
        // })
        // ->editColumn('value', function ($data) {
        //     return $data->value;
        // })
        // ->rawColumns(['action', 'value'])
        // ->make(true);

    //     // $cek = auth()->user()->role;
        // $cek = auth()->user()->role_id;
    // // Tambahkan pesan respons pribadi di sini
    // $response = [
    //     'custom_message buat cekrole. Api/Termincontroller' => $cek,
    //     'status' => true,
    //     'message' => 'Data termin berhasil diambil.',
    //     'data' => $result, // Hasil datatables
    // ];

    // return response()->json($response);

    }

    // make(true): Ini adalah metode untuk menghasilkan dan mengirimkan respons JSON yang berisi data yang siap ditampilkan oleh DataTables.

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $req = [
            'name' => $request->name,
            'value' => $request->value,
        ];

        $data = Termin::create($req);

        return $this->successResponseObj($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Termin::find($id);

        return $this->successResponseObj($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Termin::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $req = [
            'name' => $request->name,
            'value' => $request->value,
        ];

        $data = $data->update($req);

        $data = Termin::find($id);

        return $this->successResponseObj($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Termin::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $data->delete($id);
        // Termin::where('id', $id)->forceDelete();

        return $this->successResponseMsg("Data berhasil di hapus");
    }
}
