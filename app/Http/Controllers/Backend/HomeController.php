<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\CreditRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function index()
    //  {

    //      return view('backend.pages.dashboard.index');
    //      // return view('backend.pages.dashboard.index');
    //  }

    public function index(Request $request)
    {
        $now = date('Y-m-d');
        $pass = date('Y-m-d', strtotime('-1 year'));

        // dd($now);

        if($request->type == 'datatable') {
            $data = CreditRequest::select(
                'credit_requests.*',
                'business_types.name as business_name',
                'termins.name as termin_name',
                'banks.name as bank_name',
                'members.full_name as member_name',
                'members.phone as member_phone',
                'members.address as member_address',
                'kur_types.name as kur_types_name'
            )->when($request->registration_no != null && $request->registration_no != '', function ($query) use($request) {
                return $query->where('credit_requests.registration_number', $request->registration_no);
            })->when($request->bank != null && $request->bank != '', function ($query) use($request) {
                return $query->where('credit_requests.bank_id', $request->bank);
            })->when(($request->start_date != null && $request->start_date != '')
                && ($request->end_date != null && $request->end_date != ''), function ($query) use($request) {
                $start_date = $request->start_date != null && $request->start_date != '' ? date('Y-m-d', strtotime($request->start_date)) : null;
                $end_date = $request->end_date != null && $request->end_date != '' ? date('Y-m-d', strtotime($request->end_date)) : null;
                return $query->whereBetween('credit_requests.created_at', [$start_date, $end_date]);
            })->join('business_types','business_types.id','=','credit_requests.business_type_id')
                ->join('termins','termins.id','=','credit_requests.tenor')
                ->join('banks','banks.id','=','credit_requests.bank_id')
                ->join('members','members.id','=','credit_requests.member_id')
                ->join('kur_types','kur_types.id','=','credit_requests.kur_type_id')
                ->orderBy('created_at', 'DESC');

        if(auth()->user()->role_id == 2) {
            $data->whereNotNull('pic_contact')->where('pic_contact',auth()->user()->id);
        }

        if(auth()->user()->role_id == 1) {
            $data->where('bank_id',auth()->user()->bank_id)->whereBetween('credit_requests.created_at', [$pass, $now]);
        }

        return datatables()->of($data->get())
                ->addColumn('action',function($data){
                    $process = "";
                    $accept = "";
                    $reject = "";
                    $delete = "";

                    if($data->status == "DIAJUKAN") {

                        // $delete = " <a href='". route('manage.credit-request.delete',[$data->id]) ."' @click='deleteItem($data->id);showAlert();' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon btn-sm btn-danger fa fa-trash' id=deleteData></a>";
                        // $delete = " <a href='#' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('manage.credit-request.delete',[$data->id]) . "' class='delete-item btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>";
                        $delete = "<a href='". route('manage.credit-request.delete',[$data->id]) ."' class='btn btn-addon btn-sm btn-danger fa fa-trash' onclick=\"return confirm('Yakin menghapus data pengajuan ini?');\"></a>";
                    }

                    if($data->status == "DIPROSES" && auth()->user()->role == 2) {
                        $process = "<a href='". route('manage.credit-request.process',[$data->id]) ."' @click='editItem($data->id)' data-id='$data->id' class='edit-item btn btn-addon text-center btn-sm btn-warning'><i class='fa fa-pencil-square-o'></i> Proses</a>";
                        $accept = " <a href='". route('manage.credit-request.accept',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-success'><i class='fa fa-check'></i> Setuju</a>";
                        $reject = " <a href='". route('manage.credit-request.reject',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon text-center btn-sm btn-danger'><i class='fa fa-times'></i> Tolak</a>";
                    }

                    if($data->status == "DITOLAK") {
                        // $delete = " <a href='". route('manage.credit-request.delete',[$data->id]) ."' @click='deleteItem($data->id)' data-id='$data->id' data-url='" . route('api.faq.destroy',[$data->id]) . "' class='btn btn-addon btn-sm btn-danger fa fa-trash'></a>";
                        $delete = "<a href='". route('manage.credit-request.delete',[$data->id]) ."' class='btn btn-addon btn-sm btn-danger fa fa-trash' onclick=\"return confirm('Yakin menghapus data pengajuan ini?');\"></a>";
                    }

                    return $process.$accept.$reject.$delete;
                })
                ->editColumn('status',function($data){
                    if($data->status == "DIAJUKAN"){
                        return '<span class="badge badge-warning">DIAJUKAN</span>';
                    }else if($data->status == "DIPROSES"){
                        return '<span class="badge badge-info">DIPROSES</span>';
                    }else if($data->status == "DISETUJUI"){
                        return '<span class="badge badge-success">DISETUJUI</span>';
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
                ->rawColumns(['status','action','registration_number'])
                ->make(true);
        }
        $data['banks'] = Bank::where('status', '1')->orderBy('name')->get();
        return view('backend.pages.dashboard.index', $data);
    }

}
