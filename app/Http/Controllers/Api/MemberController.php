<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = Member::orderBy('full_name')->get();

        return datatables()->of($data)
                ->addColumn('action',function($data){
                    $edit = "<a href='#' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-eye'></i> Detail</a>";
                    $delete = " <a href='#' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.member.destroy',[$data->id]) . "' class='delete-item btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>";
                    $pending = "<a href='#' @click='blockItem($data->id)' data-id='$data->id' class='block-item btn btn-addon text-center btn-sm btn-info'><i class='fa fa-times'></i> Blokir</a>";

                    return $edit.$delete.$pending;
                })
                ->editColumn('gender',function($data){
                    if($data->gender == "1"){
                        return "Laki-Laki";
                    }else{
                        return "Perempuan";
                    }
                })
                ->editColumn('is_blocked', function($data){
                    if($data->is_blocked == 1){
                        return '<span class="badge badge-danger">DIBLOKIR</span>';
                    }else{
                        return '<span class="badge badge-success">TIDAK DIBLOKIR</span>';
                    }
                })
                ->rawColumns(['action', 'gender', 'is_blocked'])
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

        $data = Member::create($req);

        return $this->successResponseObj($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Member::find($id);

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
        $data = Member::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $req = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        $data = $data->update($req);

        $data = Member::find($id);

        return $this->successResponseObj($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Member::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $data->delete($id);

        return $this->successResponseMsg("Data berhasil di hapus");
    }

    public function blockStore(Request $request, $id)
    {
        //
        $data = Member::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $req = [
            'is_blocked' => $request->is_blocked,
        ];

        $data = $data->update($req);

        $data = Member::find($id);

        return $this->successResponseObj($data);
    }
}
