<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsCategory;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = NewsCategory::orderBy('name')->get();

        return datatables()->of($data)
                ->addColumn('action',function($data){
                    $edit = "<a href='#' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil'></i> Edit</a>";
                    $delete = " <a href='#' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.news-category.destroy',[$data->id]) . "' class='delete-item btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>";

                    return $edit.$delete;
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
        $req = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        $data = NewsCategory::create($req);

        return $this->successResponseObj($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = NewsCategory::find($id);

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
        $data = NewsCategory::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $req = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        $data = $data->update($req);

        $data = NewsCategory::find($id);

        return $this->successResponseObj($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = NewsCategory::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $data->delete($id);

        return $this->successResponseMsg("Data berhasil di hapus");

    }
}
