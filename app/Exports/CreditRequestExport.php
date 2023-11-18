<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Models\CreditRequest;
use Maatwebsite\Excel\Concerns\FromView;



class CreditRequestExport implements FromView
{



    protected $bank;
    protected $start_date;
    protected $end_date;
    protected $status;
    protected $regency;

    public function __construct($bank, $start_date, $end_date, $status, $regency)
    {
        $this->bank = $bank;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->status = $status;
	$this->regency = $regency;
    }

    /**
     * @return View
     */
    public function view(): View
    {
        $bank = $this->bank;
        $start_date = $this->start_date != null && $this->start_date != '' ? date('Y-m-d', strtotime($this->start_date)) : null;
        $end_date = $this->end_date != null && $this->end_date != '' ? date('Y-m-d', strtotime($this->end_date)) : null;
	$status = $this->status;
        $regency = $this->regency;

        $credit_request = CreditRequest::when($bank != null && $bank != '', function ($query) use($bank) {
                return $query->where('bank_id', $bank);
            })->when(($start_date != null && $start_date != '') && ($end_date != null && $end_date != ''), function ($query) use($start_date, $end_date) {
                return $query->whereBetween('created_at', [$start_date, $end_date]);
            })->when(($status != null && $status != ''), function ($query) use($status) {
		return $query->where('status', $status);
	    })->when(($regency != null && $regency != ''), function ($query) use($regency) {
		return $query->where('regency_id', $regency);
	    });
        if(auth()->user()->role_id == 2) {
            $credit_request->whereNotNull('pic_contact')->where('pic_contact',auth()->user()->id);
        }

        if(auth()->user()->role_id == 1) {
            $credit_request->where('bank_id',auth()->user()->bank_id);
        }

        $credit_request = $credit_request->orderBy('created_at', 'DESC')->get();

        return view('export.credit_request', [
            'credit_request' => $credit_request
        ]);




    }
}
