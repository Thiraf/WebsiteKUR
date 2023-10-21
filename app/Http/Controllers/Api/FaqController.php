<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Page::orderBy('title')->where('type','FAQ')->get();

        return datatables()->of($data)
                ->addColumn('action',function($data){
                    $edit = "<a href='#' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil'></i> Edit</a>";
                    $delete = " <a href='#' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='delete-item btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>";

                    return $edit.$delete;
                })
                ->addColumn('img_rendered',function($data){
                    return "<img src='$data->img' loading='lazy' class='mini-img'/>";
                })
                ->rawColumns(['action','img_rendered'])
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
            'title' => $request->title,
            'content' => $request->content,
            'type' => "FAQ",
            'slug' => Str::slug($request->title),
            'img' => null,
        ];

        $data = Page::create($req);

        return $this->successResponseObj($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Page::find($id);

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
        $data = Page::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $img = $data->img;

        if($request->file('img')) {
            $file_name = $request->file('img')->getClientOriginalName();

            $path = explode("storage/",$data->img);
            Storage::delete('public/'.$path[1]);

            $file = $request->file('img');

            $file = Image::make($file);


            $uploadedFileName = md5($file_name)."_".strtotime(date('Y-m-d H:i:s'))."_300px.".$request->file('img')->getClientOriginalExtension();
            $file->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/page/'.$uploadedFileName));

            $img = route('storage.page',[$uploadedFileName]);
        }


        $req = [
            'title' => $request->title,
            'content' => $request->content,
            'type' => "FAQ",
            'slug' => Str::slug($request->title),
            'img' => $img,
        ];

        $data = $data->update($req);

        $data = Page::find($id);

        return $this->successResponseObj($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Page::find($id);

        if(!$data) {
            return $this->errNotFoundMsg();
        }

        $data->delete($id);

        return $this->successResponseMsg("Data berhasil di hapus");

    }
}
