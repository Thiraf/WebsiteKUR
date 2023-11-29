<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\CreditRequest;
use App\Models\Activity;
use App\Models\User;
use App\Models\UserPostalCode;
use Illuminate\Support\Facades\DB;

// use App\Http\Controllers\Backend\Auth;
use Illuminate\Support\Facades\Auth;

use App\Exports\CreditRequestExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;

use App\Mail\AcceptPengajuan;
use App\Mail\ConfirmPengajuan;
use App\Mail\PendingPengajuan;
use App\Mail\RejectPengajuan;
use App\Mail\RedirectPengajuan;





class CreditRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function exportExcel(Request $request)
     {

        $res =  Excel::download(new CreditRequestExport(
            $request->bank,
            $request->start_date,
            $request->end_date,
        $request->status,
        $request->regency
        ), 'credit_request.xlsx');
        ob_end_clean();

        return $res;
     }


    public function index()
    {
        //
        return view('backend.pages.credit_request.index', [
            'banks' => Bank::where('status', '1')->orderBy('name')->get()
        ]);
    }

    public function history()
    {
        return view('backend.pages.credit_request.history',[
            'banks' => Bank::where('status', '1')->orderBy('name')->get()
        ]);
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
    }

    public function accept($id)
    {
        $data['data'] = CreditRequest::find($id);
        $data['activity'] = Activity::where('ref_id', $id)->orderBy('created_at', 'DESC')->get();

        if(auth()->user()->role_id == 0 || (auth()->user()->role_id == 1 && auth()->user()->bank_id == $data['data']->bank_id)) {
            return view('backend.pages.credit_request.accept',$data);
        }
        if(auth()->user()->role_id == 2 && auth()->user()->id == $data['data']->pic_contact) {
            return view('backend.pages.credit_request.accept',$data);
        }

        abort(403);

    }

    public function redirect($id)
    {
        $data['data'] = CreditRequest::find($id);
        $data['pics'] = User::with(['roles'])
                            ->where('users.role_id',2)
                            //->where('district_id',$data['data']->district_id)
                            ->where('users.bank_id',$data['data']->bank_id)
                            ->get();
        // dd(\App\UserPostalCode::get()->toArray());
        foreach ($data['pics'] as $key => $value) {
            $value->userpostalcode = UserPostalCode::where('user_id',$value->id)->get();
            $value->bank = Bank::where('id',$value->bank_id)->first();
        }

        // return response()->json($data['pics']);

        $data['activity'] = Activity::where('ref_id', $id)->orderBy('created_at', 'DESC')->get();

        if(auth()->user()->role_id == 0 || (auth()->user()->role_id == 1 && auth()->user()->bank_id == $data['data']->bank_id)) {
            return view('backend.pages.credit_request.redirect',$data);
        }
        if(auth()->user()->role_id == 2 && auth()->user()->id == $data['data']->pic_contact) {
            return view('backend.pages.credit_request.redirect',$data);
        }
        abort(403);
    }

    public function reject($id)
    {
        $data['data'] = CreditRequest::find($id);
        $data['activity'] = Activity::where('ref_id', $id)->orderBy('created_at', 'DESC')->get();

        if(auth()->user()->role_id == 0 || (auth()->user()->role_id == 1 && auth()->user()->bank_id == $data['data']->bank_id)) {
            return view('backend.pages.credit_request.reject',$data);
        }
        if(auth()->user()->role_id == 2 && auth()->user()->id == $data['data']->pic_contact) {
            return view('backend.pages.credit_request.reject',$data);
        }

        abort(403);
    }

    public function pending($id)
    {
        $data['data'] = CreditRequest::find($id);
        $data['activity'] = Activity::where('ref_id', $id)->orderBy('created_at', 'DESC')->get();

        if(auth()->user()->role_id == 0 || (auth()->user()->role_id == 1 && auth()->user()->bank_id == $data['data']->bank_id)) {
            return view('backend.pages.credit_request.pending',$data);
        }
        if(auth()->user()->role_id == 2 && auth()->user()->id == $data['data']->pic_contact) {
            return view('backend.pages.credit_request.pending',$data);
        }

        abort(403);
    }

    public function show($id)
    {
        $data['data'] = CreditRequest::find($id);
        $data['activity'] = Activity::where('ref_id', $id)->orderBy('created_at', 'DESC')->get();


        // return response()->json($data);


        // if(auth()->user()->role_id == 0 || (auth()->user()->role_id == 1 && auth()->user()->bank_id == $data['data']->bank_id)) {


        if(auth()->user()->role_id == 0 || (auth()->user()->role_id == 1 && Auth::user()->bank_id == $data['data']->bank_id)) {
            return view('backend.pages.credit_request.detail',$data);
        }
        if(auth()->user()->role_id == 2 &&  auth()->user()->id == $data['data']->pic_contact) {
            return view('backend.pages.credit_request.detail',$data);
        }

        if(auth()->user()->role_id == 3){
            return view('backend.pages.credit_request.detail',$data);
        }

        // return view('backend.pages.credit_request.detail',$data);

        abort(403);

        // return view('backend.pages.credit_request.history',[
        //     'banks' => Bank::where('status', '1')->orderBy('name')->get()
        // ]);
    }

    public function acceptStore(Request $request,$id)
    {
        try{
            $data = CreditRequest::find($id);

            if(!$data) {
                abort(404);
            }

            $plafond = str_replace('.', '', $request->accepted_plafond);

            $data->update([
                'status' => 'DISETUJUI',
                'accepted_plafond' => $plafond,
                'process_by' => auth()->user()->id,
            ]);

            $this->addActivity([
                'ref_id' => $id,
                'user_id' => auth()->user()->id,
                'remark' => "Pengajuan Kur Disetujui Dengan Plafond Yang Diterima Rp.". number_format($plafond,0,',','.') ." oleh ". auth()->user()->name .".",
                'type' => 'DISETUJUI'
            ]);

            Mail::to($data->member->email )
                ->send(new AcceptPengajuan($data));

            $data = CreditRequest::find($id);

            return redirect()->route('manage.credit-request.show',[$id]);
        } catch(\Exception $e) {
            DB::rollback();
            return $this->errorResponseMsg($e->getMessage());
        } catch(\Throwable $e) {
            DB::rollback();
            return $this->errorResponseMsg($e->getMessage());
        }
    }

    public function redirectStore(Request $request,$id)
    {
        DB::beginTransaction();
        try{
            $data = CreditRequest::find($id);

            if(!$data) {
                abort(404);
            }

            $data->update([
                'status' => 'DIPROSES',
                'pic_contact' => $request->pic_contact,
                'process_by' => auth()->user()->id,
            ]);

            $this->addActivity([
                'ref_id' => $id,
                'user_id' => auth()->user()->id,
                'remark' => "Pengajuan Kur Dialihkan Ke Sub Admin oleh ". auth()->user()->name .".",
                'type' => 'DIALIHKAN'
            ]);

            Mail::to($data->member->email )
                ->send(new RedirectPengajuan($data));

            $user = User::find($request->pic_contact);
            $data = CreditRequest::find($id);

            DB::commit();
            return redirect()->route('manage.credit-request.show',[$id]);
        } catch(\Exception $e) {
            DB::rollback();
            return $this->errorResponseMsg($e->getMessage());
        } catch(\Throwable $e) {
            DB::rollback();
            return $this->errorResponseMsg($e->getMessage());
        }
    }


    public function rejectStore(Request $request,$id)
    {
        try {
            $data = CreditRequest::find($id);

            if(!$data) {
                abort(404);
            }

            $data->update([
                'status' => 'DITOLAK',
                'reject_message' => $request->reject_message,
                'process_by' => auth()->user()->id,
            ]);

            $this->addActivity([
                'ref_id' => $id,
                'user_id' => auth()->user()->id,
                'remark' => "Pengajuan Kur Ditolak Dengan Alasan {$request->reject_message} oleh ". auth()->user()->name .".",
                'type' => 'DITOLAK'
            ]);

            Mail::to($data->member->email )
                ->send(new RejectPengajuan($data));

            $data = CreditRequest::find($id);

            return redirect()->route('manage.credit-request.show',[$id]);
        } catch(\Exception $e) {
            DB::rollback();
            return $this->errorResponseMsg($e->getMessage());
        } catch(\Throwable $e) {
            DB::rollback();
            return $this->errorResponseMsg($e->getMessage());
        }
    }


    public function pendingStore(Request $request,$id)
    {
        try {
            $data = CreditRequest::find($id);

            if(!$data) {
                abort(404);
            }

            $data->update([
                'status' => 'DIPENDING',
                'pending_message' => $request->pending_message,
                'process_by' => auth()->user()->id,
            ]);

            $this->addActivity([
                'ref_id' => $id,
                'user_id' => auth()->user()->id,
                'remark' => "Pengajuan Kur Dipending Dengan Alasan {$request->pending_message} oleh ". auth()->user()->name .".",
                'type' => 'DIPENDING'
            ]);

            Mail::to($data->member->email )
                ->send(new PendingPengajuan($data));

            $data = CreditRequest::find($id);

            return redirect()->route('manage.credit-request.show',[$id]);
        } catch(\Exception $e) {
            DB::rollback();
            return $this->errorResponseMsg($e->getMessage());
        } catch(\Throwable $e) {
            DB::rollback();
            return $this->errorResponseMsg($e->getMessage());
        }
    }


    // public function confirm(Request $request, $id)
    // {
    //     try {
    //         return DB::transaction(function () use ($id) {
    //             $data = CreditRequest::find($id);

    //             if (!$data) {
    //                 abort(404);
    //             }

    //             $data->update([
    //                 'is_confirmed' => 1,
    //                 'process_by' => auth()->user()->id,
    //             ]);

    //             $this->addActivity([
    //                 'ref_id' => $id,
    //                 'user_id' => auth()->user()->id,
    //                 'remark' => "Pengajuan Kur telah Dikonfirmasi oleh " . auth()->user()->name . ".",
    //                 'type' => 'DIKONFIMASI'
    //             ]);

    //             Mail::to($data->member->email)
    //                 ->send(new ConfirmPengajuan($data));

    //             $data = CreditRequest::find($id);

    //             return redirect()->route('manage.credit-request.show', [$id]);
    //         });
    //     } catch (\Exception $e) {
    //         return $this->errorResponseMsg($e->getMessage());
    //     } catch (\Throwable $e) {
    //         return $this->errorResponseMsg($e->getMessage());
    //     }
    // }

    public function confirm(Request $request,$id)
    {
        try {
            $data = CreditRequest::find($id);

            if(!$data) {
                abort(404);
            }

            $data->update([
                'is_confirmed' => 1,
                'process_by' => auth()->user()->id,
            ]);

            $this->addActivity([
                'ref_id' => $id,
                'user_id' => auth()->user()->id,
                'remark' => "Pengajuan Kur telah Dikonfirmasi oleh ". auth()->user()->name .".",
                'type' => 'DIKONFIMASI'
            ]);

            Mail::to($data->member->email )
                ->send(new ConfirmPengajuan($data));

            $data = CreditRequest::find($id);

            return redirect()->route('manage.credit-request.show',[$id]);
        } catch(\Exception $e) {
            DB::rollback();
            return $this->errorResponseMsg($e->getMessage());
        } catch(\Throwable $e) {
            DB::rollback();
            return $this->errorResponseMsg($e->getMessage());
        }
    }




    /**
     * Display the specified resource.
     */


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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
                // Delete without prompt
                $data = CreditRequest::find($id);

                if(!$data) {
                    return $this->errNotFoundMsg();
                }

                $data->delete($id);
                return redirect('/manage');
    }




    public function delete($id){
        $data['data'] = CreditRequest::find($id);
        $data['activity'] = Activity::where('ref_id', $id)->delete();

        if(auth()->user()->role_id == 0 || (auth()->user()->role_id == 1 && auth()->user()->bank_id == $data['data']->bank_id)) {
            return view('backend.pages.credit_request.reject',$data);
        }
        if(auth()->user()->role_id == 2 && auth()->user()->id == $data['data']->pic_contact) {
            return view('backend.pages.credit_request.reject',$data);
        }

        return response()->json([
            'status'=>200,
            'message'=>'Data Deleted Successfully',
        ]);
    }


}
