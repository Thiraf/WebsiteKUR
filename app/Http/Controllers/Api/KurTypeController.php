<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KurType;

class KurTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = KurType::orderBy('name')->get();

        return datatables()->of($data)
                ->addColumn('action',function($data){
                    $edit = "<a href='#' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil'></i> Edit</a>";
                    $delete = " <a href='#' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.kur-type.destroy',[$data->id]) . "' class='delete-item btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>";

                    return $edit.$delete;
                })
                ->editColumn('min_value',function($data){
                    return "Rp " . number_format($data->min_value,2,',','.');
                })
                ->editColumn('max_value',function($data){
                    return "Rp " . number_format($data->max_value,2,',','.');
                })
                ->rawColumns(['action'])
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
            'min_value' => 'required',
            'max_value' => 'required',
        ]);

        $req = [
            'name' => $request->name,
            'min_value' => $request->min_value,
            'max_value' => $request->max_value,
        ];

        $data = KurType::create($req);

        return $this->successResponseObj($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = KurType::find($id);

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
            'min_value' => 'required',
            'max_value' => 'required',
        ]);

        $data = KurType::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $req = [
            'name' => $request->name,
            'min_value' => $request->min_value,
            'max_value' => $request->max_value,
        ];

        $data = $data->update($req);

        $data = KurType::find($id);

        return $this->successResponseObj($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = KurType::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $data->delete($id);

        return $this->successResponseMsg("Data berhasil di hapus");


    }
}
