<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditRequest;
use Intervention\Image\Facades\Image;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class CreditRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     //
    //     $data = CreditRequest::select('credit_requests.*','business_types.name as business_name','termins.name as termin_name','banks.name as bank_name','members.full_name as member_name', 'members.phone as member_phone', 'members.address as member_address', 'kur_types.name as kur_types_name')
    //                             ->when($request->bank != null && $request->bank != '', function ($query) use($request) {
    //                                 return $query->where('credit_requests.bank_id', $request->bank);
    //                             })->when($request->registration_no != null && $request->registration_no != '', function ($query) use($request) {
    //                                 return $query->where('credit_requests.registration_number', $request->registration_no);
    //                             })->when(($request->start_date != null && $request->start_date != '')
    //                                 && ($request->end_date != null && $request->end_date != ''), function ($query) use($request) {
    //                                 $start_date = $request->start_date != null && $request->start_date != '' ? date('Y-m-d', strtotime($request->start_date)) : null;
    //                                 $end_date = $request->end_date != null && $request->end_date != '' ? date('Y-m-d', strtotime($request->end_date)) : null;

    //                                 return $query->whereBetween('credit_requests.created_at', [$start_date, $end_date]);
    //                             })
    //                             ->join('business_types','business_types.id','=','credit_requests.business_type_id')
    //                             ->join('termins','termins.id','=','credit_requests.tenor')
    //                             ->join('banks','banks.id','=','credit_requests.bank_id')
    //                             ->join('members','members.id','=','credit_requests.member_id')
    //                             ->join('kur_types','kur_types.id','=','credit_requests.kur_type_id')
    //                             ->orderBy('created_at', 'DESC');

    //     if(auth()->user()->role_id == 2) {
    //         $data->whereNotNull('pic_contact')->where('pic_contact',auth()->user()->id);
    //     }

    //     if(auth()->user()->role_id == 1) {
    //         $data->where('bank_id',auth()->user()->bank_id);
    //     }

    //     return datatables()->of($data->get())
    //             ->addColumn('action',function($data){
    //                 $confirm = "";
    //                 $process = "";
    //                 $accept = "";
    //                 $pending = "";
    //                 $reject = "";

    //                 if($data->status == "DIAJUKAN" && $data->is_confirmed == 0) {
    //                     $confirm = "<a href='". route('manage.credit-request.confirm',[$data->id]) ."' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil-square-o'></i> Konfirmasi</a>";
    //                 }

    //                 if($data->status == "DIAJUKAN" && $data->is_confirmed == 1) {
    //                     $process = "<a href='". route('manage.credit-request.redirect',[$data->id]) ."' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-info'><i class='fa fa-pencil'></i> Alihkan</a>";
    //                     $accept = " <a href='". route('manage.credit-request.accept',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-success'><i class='fa fa-check'></i> Setuju</a>";
    //                     $pending = " <a href='". route('manage.credit-request.pending',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-primary'><i class='fa fa-clock-o'></i> Pending</a>";
    //                     $reject = " <a href='". route('manage.credit-request.reject',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-times'></i> Tolak</a>";
    //                 }

    //                 if($data->status == "DIPROSES" && auth()->user()->role_id == 2 && $data->is_confirmed == 1) {
    //                     $accept = " <a href='". route('manage.credit-request.accept',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-success'><i class='fa fa-check'></i> Setuju</a>";
    //                     $reject = " <a href='". route('manage.credit-request.reject',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-times'></i> Tolak</a>";
    //                 }

    //                 if($data->status == "DIPENDING" && $data->is_confirmed == 1 &&(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)) {
    //                     $process = "<a href='". route('manage.credit-request.redirect',[$data->id]) ."' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-info'><i class='fa fa-pencil'></i> Alihkan</a>";
    //                     $accept = " <a href='". route('manage.credit-request.accept',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-success'><i class='fa fa-check'></i> Setuju</a>";
    //                     $reject = " <a href='". route('manage.credit-request.reject',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-times'></i> Tolak</a>";
    //                 }

    //                 return $confirm.$process.$accept.$pending.$reject;
    //             })
    //             ->editColumn('status',function($data){
    //                 if($data->status == "DIAJUKAN"){
    //                     return '<span class="badge badge-warning">DIAJUKAN</span>';
    //                 }else if($data->status == "DIPROSES"){
    //                     return '<span class="badge badge-info">DIPROSES</span>';
    //                 }else if($data->status == "DISETUJUI"){
    //                     return '<span class="badge badge-success">DISETUJUI</span>';
    //                 }else if($data->status == "DIPENDING"){
    //                     return '<span class="badge badge-warning">DIPENDING</span>';
    //                 }else{
    //                     return "<span class='badge badge-danger'>$data->status</span>";
    //                 }
    //             })
    //             ->editColumn('amount',function($data){
    //                 return "Rp ".number_format($data->amount,0,',','.');
    //             })
    //             ->editColumn('created_at',function($data){
    //                 return date('d M Y',strtotime($data->created_at));
    //             })
    //             ->editColumn('registration_number',function($data){
    //                 // return "<a class='link text-info show-detail' data-id='$data->id' href='#'>$data->registration_number</a>";
    //                 return "<a class='link text-info show-detail' data-id='$data->id' href='" . route('manage.credit-request.show',$data->id) . "'>$data->registration_number</a>";
    //             })
    //             ->rawColumns(['status', 'action','registration_number'])
    //             ->make(true);
    // }

    public function index(Request $request)
    {
        //
        $data = CreditRequest::select('credit_requests.*','business_types.name as business_name','termins.name as termin_name','banks.name as bank_name','members.full_name as member_name', 'members.phone as member_phone', 'members.address as member_address', 'kur_types.name as kur_types_name')
                                ->when($request->bank != null && $request->bank != '', function ($query) use($request) {
                                    return $query->where('credit_requests.bank_id', $request->bank);
                                })->when($request->registration_no != null && $request->registration_no != '', function ($query) use($request) {
                                    return $query->where('credit_requests.registration_number', $request->registration_no);
                                })->when(($request->start_date != null && $request->start_date != '')
                                    && ($request->end_date != null && $request->end_date != ''), function ($query) use($request) {
                                    $start_date = $request->start_date != null && $request->start_date != '' ? date('Y-m-d', strtotime($request->start_date)) : null;
                                    $end_date = $request->end_date != null && $request->end_date != '' ? date('Y-m-d', strtotime($request->end_date)) : null;

                                    return $query->whereBetween('credit_requests.created_at', [$start_date, $end_date]);
                                })
                                ->leftJoin('business_types','business_types.id','=','credit_requests.business_type_id')
                                ->leftJoin('termins','termins.id','=','credit_requests.tenor')
                                ->leftJoin('banks','banks.id','=','credit_requests.bank_id')
                                ->leftJoin('members','members.id','=','credit_requests.member_id')
                                ->leftJoin('kur_types','kur_types.id','=','credit_requests.kur_type_id')
                                ->orderBy('created_at', 'DESC');

        if(auth()->user()->role_id == 2) {
            $data->whereNotNull('pic_contact')->where('pic_contact',auth()->user()->id);
        }

        if(auth()->user()->role_id == 1) {
            $data->where('bank_id',auth()->user()->bank_id);
        }

        return datatables()->of($data->get())
                ->addColumn('action',function($data){
                    $confirm = "";
                    $process = "";
                    $accept = "";
                    $pending = "";
                    $reject = "";

                    if($data->status == "DIAJUKAN" && $data->is_confirmed == 0) {
                        $confirm = "<a href='". route('manage.credit-request.confirm',[$data->id]) ."' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil-square-o'></i> Konfirmasi</a>";
                    }

                    if($data->status == "DIAJUKAN" && $data->is_confirmed == 1) {
                        $process = "<a href='". route('manage.credit-request.redirect',[$data->id]) ."' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-info'><i class='fa fa-pencil'></i> Alihkan</a>";
                        $accept = " <a href='". route('manage.credit-request.accept',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-success'><i class='fa fa-check'></i> Setuju</a>";
                        $pending = " <a href='". route('manage.credit-request.pending',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-primary'><i class='fa fa-clock-o'></i> Pending</a>";
                        $reject = " <a href='". route('manage.credit-request.reject',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-times'></i> Tolak</a>";
                    }

                    if($data->status == "DIPROSES" && auth()->user()->role_id == 2 && $data->is_confirmed == 1) {
                        $accept = " <a href='". route('manage.credit-request.accept',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-success'><i class='fa fa-check'></i> Setuju</a>";
                        $reject = " <a href='". route('manage.credit-request.reject',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-times'></i> Tolak</a>";
                    }

                    if($data->status == "DIPENDING" && $data->is_confirmed == 1 &&(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)) {
                        $process = "<a href='". route('manage.credit-request.redirect',[$data->id]) ."' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-info'><i class='fa fa-pencil'></i> Alihkan</a>";
                        $accept = " <a href='". route('manage.credit-request.accept',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-success'><i class='fa fa-check'></i> Setuju</a>";
                        $reject = " <a href='". route('manage.credit-request.reject',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-times'></i> Tolak</a>";
                    }

                    return $confirm.$process.$accept.$pending.$reject;
                })
                ->editColumn('status',function($data){
                    if($data->status == "DIAJUKAN"){
                        return '<span class="badge badge-warning">DIAJUKAN</span>';
                    }else if($data->status == "DIPROSES"){
                        return '<span class="badge badge-info">DIPROSES</span>';
                    }else if($data->status == "DISETUJUI"){
                        return '<span class="badge badge-success">DISETUJUI</span>';
                    }else if($data->status == "DIPENDING"){
                        return '<span class="badge badge-warning">DIPENDING</span>';
                    }else{
                        return "<span class='badge badge-danger'>$data->status</span>";
                    }
                })
                ->editColumn('amount',function($data){
                    return "Rp ".number_format($data->amount,0,',','.');
                })
                ->editColumn('created_at',function($data){
                    return date('d M Y',strtotime($data->created_at));
                })
                ->editColumn('registration_number',function($data){
                    // return "<a class='link text-info show-detail' data-id='$data->id' href='#'>$data->registration_number</a>";
                    // (yang bagian sini tak mattin tak skip dulu hehe)
                    return "<a class='link text-info show-detail' data-id='$data->id' href='" . route('manage.credit-request.show',$data->id) . "'>$data->registration_number</a>";
                })
                ->rawColumns(['status', 'action','registration_number'])
                ->make(true);
    }



    public function history(Request $request)
    {
        if($request->type == "datatable_accepted"){
            $data = CreditRequest::select('credit_requests.*','business_types.name as business_name','termins.name as termin_name','banks.name as bank_name','members.full_name as member_name', 'members.phone as member_phone', 'members.address as member_address', 'kur_types.name as kur_types_name')
                                    ->join('business_types','business_types.id','=','credit_requests.business_type_id')
                                    ->join('termins','termins.id','=','credit_requests.tenor')
                                    ->join('banks','banks.id','=','credit_requests.bank_id')
                                    ->join('members','members.id','=','credit_requests.member_id')
                                    ->join('kur_types','kur_types.id','=','credit_requests.kur_type_id')
                                    ->where('credit_requests.status', 'DISETUJUI')
                                    ->orderBy('created_at', 'DESC');

            if(auth()->user()->role_id == 2) {
                $data->whereNotNull('pic_contact')->where('pic_contact',auth()->user()->id);
            }

            if(auth()->user()->role_id == 1) {
                $data->where('bank_id',auth()->user()->bank_id);
            }

            return datatables()->of($data->get())
                    ->editColumn('status',function($data){
                        if($data->status == "DIAJUKAN"){
                            return '<span class="badge badge-warning">DIAJUKAN</span>';
                        }else if($data->status == "DIPROSES"){
                            return '<span class="badge badge-info">DIPROSES</span>';
                        }else if($data->status == "DISETUJUI"){
                            return '<span class="badge badge-success">DISETUJUI</span>';
                        }else if($data->status == "DIPENDING"){
                            return '<span class="badge badge-warning">DIPENDING</span>';
                        }else{
                            return "<span class='badge badge-danger'>$data->status</span>";
                        }
                    })
                    ->editColumn('amount',function($data){
                        return "Rp ".number_format($data->amount,0,',','.');
                    })
                    ->editColumn('created_at',function($data){
                        return date('d M Y',strtotime($data->created_at));
                    })
                    ->editColumn('registration_number',function($data){
                        return "<a class='link text-info show-detail' data-id='$data->id' href='" . route('manage.credit-request.show',$data->id) . "'>$data->registration_number</a>";
                    })
                    ->rawColumns(['status','registration_number'])
                    ->make(true);
        }

        if($request->type == "datatable_rejected"){
            $data = CreditRequest::select('credit_requests.*','business_types.name as business_name','termins.name as termin_name','banks.name as bank_name','members.full_name as member_name', 'members.phone as member_phone', 'members.address as member_address', 'kur_types.name as kur_types_name')
                                    ->join('business_types','business_types.id','=','credit_requests.business_type_id')
                                    ->join('termins','termins.id','=','credit_requests.tenor')
                                    ->join('banks','banks.id','=','credit_requests.bank_id')
                                    ->join('members','members.id','=','credit_requests.member_id')
                                    ->join('kur_types','kur_types.id','=','credit_requests.kur_type_id')
                                    ->where('credit_requests.status', '=', 'DITOLAK')
                                    ->orderBy('created_at', 'DESC');

            if(auth()->user()->role_id == 2) {
                $data->whereNotNull('pic_contact')->where('pic_contact',auth()->user()->id);
            }

            if(auth()->user()->role_id == 1) {
                $data->where('bank_id',auth()->user()->bank_id);
            }

            return datatables()->of($data->get())
                    ->editColumn('status',function($data){
                        if($data->status == "DIAJUKAN"){
                            return '<span class="badge badge-warning">DIAJUKAN</span>';
                        }else if($data->status == "DIPROSES"){
                            return '<span class="badge badge-info">DIPROSES</span>';
                        }else if($data->status == "DISETUJUI"){
                            return '<span class="badge badge-success">DISETUJUI</span>';
                        }else if($data->status == "DIPENDING"){
                            return '<span class="badge badge-warning">DIPENDING</span>';
                        }else{
                            return "<span class='badge badge-danger'>$data->status</span>";
                        }
                    })
                    ->editColumn('amount',function($data){
                        return "Rp ".number_format($data->amount,0,',','.');
                    })
                    ->editColumn('created_at',function($data){
                        return date('d M Y',strtotime($data->created_at));
                    })
                    ->editColumn('registration_number',function($data){
                        return "<a class='link text-info show-detail' data-id='$data->id' href='" . route('manage.credit-request.show',$data->id) . "'>$data->registration_number</a>";
                    })
                    ->rawColumns(['status','registration_number'])
                    ->make(true);
        }
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
        $file_name = $request->file('photo')->getClientOriginalName();

        $file = $request->file('photo');

        $file = Image::make($file);


        $uploadedFileName = md5($file_name)."_".strtotime(date('Y-m-d H:i:s'))."_300px.".$request->file('photo')->getClientOriginalExtension();
        $file
        ->resize(null, 300, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save(storage_path('app/public/page/'.$uploadedFileName));

        $req = [
            'title' => $request->title,
            'content' => $request->content,
            'type' => "NEWS",
            'slug' => Str::slug($request->title),
            'img' => route('storage.page',[$uploadedFileName]),
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
        $data = CreditRequest::select('credit_requests.*','business_types.name as business_name','termins.name as termin_name','banks.name as bank_name','regencies.name as regency_name','districts.name as district_name')
        ->join('business_types','business_types.id','=','credit_requests.business_type_id')
        ->join('termins','termins.id','=','credit_requests.tenor')
        ->join('districts','districts.id','=','credit_requests.district_id')
        ->join('regencies','regencies.id','=','credit_requests.regency_id')
        ->join('banks','banks.id','=','credit_requests.bank_id')
        ->where('credit_requests.id',$id)
        ->first();
    //     $data = CreditRequest::select('credit_requests.*', 'business_types.name as business_name', 'termins.name as termin_name', 'banks.name as bank_name', 'regencies.name as regency_name', 'districts.name as district_name')
    // ->leftJoin('business_types', function($join) {
    //     $join->on('business_types.id', '=', 'credit_requests.business_type_id');
    // })
    // ->leftJoin('termins', function($join) {
    //     $join->on('termins.id', '=', 'credit_requests.tenor');
    // })
    // ->leftJoin('districts', function($join) {
    //     $join->on('districts.id', '=', 'credit_requests.district_id');
    // })
    // ->leftJoin('regencies', function($join) {
    //     $join->on('regencies.id', '=', 'credit_requests.regency_id');
    // })
    // ->leftJoin('banks', function($join) {
    //     $join->on('banks.id', '=', 'credit_requests.bank_id');
    // })
    // ->where('credit_requests.id', $id)
    // ->first();


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

        if($request->file('photo')) {
            $file_name = $request->file('photo')->getClientOriginalName();

            $path = explode("storage/",$data->img);
            Storage::delete('public/'.$path[1]);

            $file = $request->file('photo');

            $file = Image::make($file);


            $uploadedFileName = md5($file_name)."_".strtotime(date('Y-m-d H:i:s'))."_300px.".$request->file('photo')->getClientOriginalExtension();
            $file
            // ->resize(null, 300, function ($constraint) {
            //     $constraint->aspectRatio();
            // })
            ->save(storage_path('app/public/page/'.$uploadedFileName));

            $img = route('storage.page',[$uploadedFileName]);
        }


        $req = [
            'title' => $request->title,
            'content' => $request->content,
            'type' => "NEWS",
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
    }
}
