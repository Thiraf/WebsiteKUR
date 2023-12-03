<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CreditRequest;
use App\Models\KurType;
use App\Models\Bank;


class StatistikController extends Controller
{

    public function filterDate(Request $request){

        $satu = $request->start_date;
        $dua = $request->end_date;
        $dua = Carbon::parse($dua)->addDays(1)->toDateString();

        // dd($satu);
        // dd($dua);

        // note
        // where between day 02-11 => yang diitung dari tanggal 02-10 aja
        // biar hari enddate ikut kehitung, tambahkan addDays(1)

        // ------------------------------------------------------
        // tipe kur (bisa difilter rentang waktu) (1)
        $kurTypes = KurType::withCount(['creditRequests' => function ($query) use ($satu, $dua) {
            $query->whereBetween('created_at', [$satu, $dua])
                ->where('status', 'DISETUJUI');
        }])->get();

        // ------------------------------------------------------
        // jumlah bank (bisa difilter rentang waktu)(2)
        $banks = Bank::withCount(['creditRequests' => function ($query) use ($satu, $dua) {
            $query->whereBetween('created_at', [$satu, $dua])
                ->where('status', 'DISETUJUI');
        }])
        ->orderBy('name', 'asc')
        ->get();

        // ------------------------------------------------------
        // jumlah SEMUA STATUS PENGAJUAN (bisa diifilter) (3)
        $count1a = CreditRequest::whereBetween('created_at', [$satu, $dua])
        ->where('status', 'DIAJUKAN')
        ->count();

        // disetujui
        $count2a = CreditRequest::whereBetween('created_at', [$satu, $dua])
            ->where('status', 'DISETUJUI')
            ->count();

        // diproses
        $count3a = CreditRequest::whereBetween('created_at', [$satu, $dua])
            ->where('status', 'DIPROSES')
            ->count();

        // ditolak
        $count4a = CreditRequest::whereBetween('created_at', [$satu, $dua])
            ->where('status', 'DITOLAK')
            ->count();

        // dipending
        $count5a = CreditRequest::whereBetween('created_at', [$satu, $dua])
            ->where('status', 'DIPENDING')
            ->count();

        $jumlah_status = [];
        $jumlah_status[] = [
            'diajukan' => $count1a,
            'disetujui' => $count2a,
            'diproses' => $count3a,
            'ditolak' => $count4a,
            'dipending' => $count5a
        ];

        $data = [
            'kurTypes' => $kurTypes->map(function ($kurType) {
                return [
                    'name' => $kurType->name,
                    'credit_request_count' => $kurType->credit_requests_count,
                ];
            }),
            'banks' => $banks->map(function ($bank) {
                return [
                    'name' => $bank->name,
                    'credit_request_count' => $bank->credit_requests_count,
                ];
            }),
            'data_pengajuan' => $jumlah_status,
        ];

        return response()->json($data);

        }



    public function filter($days){

        if($days == -100){

            $kurTypes = KurType::withCount(['creditRequests' => function ($query) {
                $query->where('status', 'DISETUJUI');
            }])->get();

            $banks = Bank::withCount(['creditRequests' => function ($query) {
                $query->where('status', 'DISETUJUI');
            }])
            ->orderBy('name', 'asc')
            ->get();

            $count1a = CreditRequest::where('status', 'DIAJUKAN')->count();
            $count2a = CreditRequest::where('status', 'DISETUJUI')->count();
            $count3a = CreditRequest::where('status', 'DIPROSES')->count();
            $count4a = CreditRequest::where('status', 'DITOLAK')->count();
            $count5a = CreditRequest::where('status', 'DIPENDING')->count();

            $jumlah_status = [
                'diajukan' => $count1a,
                'disetujui' => $count2a,
                'diproses' => $count3a,
                'ditolak' => $count4a,
                'dipending' => $count5a
            ];

        } else {
            $DaysAgo = Carbon::now()->subDays($days)->toDateString();
            // dd($DaysAgo);

            // ------------------------------------------------------
            // tipe kur (bisa difilter rentang waktu) (1)
            $kurTypes = KurType::withCount(['creditRequests' => function ($query) use ($DaysAgo) {
                $query->where('created_at', '>=', $DaysAgo);
                $query->where('status', 'DISETUJUI');
            }])->get();

            // ------------------------------------------------------
            // jumlah bank (bisa difilter rentang waktu)(2)
            $banks = Bank::withCount(['creditRequests' => function ($query) use ($DaysAgo) {
                $query->where('created_at', '>=', $DaysAgo);
                $query->where('status', 'DISETUJUI');
            }])
            ->orderBy('name', 'asc')
            ->get();

            // ------------------------------------------------------
            // jumlah SEMUA STATUS PENGAJUAN (bisa diifilter) (3)
            $count1a = CreditRequest::where('created_at', '>=', $DaysAgo)
            ->where('status', 'DIAJUKAN')
            ->count();

            // disetujui
            $count2a = CreditRequest::whereDate('created_at','>=', $DaysAgo)
                ->where('status', 'DISETUJUI')
                ->count();

            // diproses
            $count3a = CreditRequest::whereDate('created_at','>=', $DaysAgo)
                ->where('status', 'DIPROSES')
                ->count();

            // ditolak
            $count4a = CreditRequest::whereDate('created_at','>=', $DaysAgo)
                ->where('status', 'DITOLAK')
                ->count();

            // dipending
            $count5a = CreditRequest::whereDate('created_at','>=', $DaysAgo)
                ->where('status', 'DIPENDING')
                ->count();

            $jumlah_status = [];
            $jumlah_status[] = [
                'diajukan' => $count1a,
                'disetujui' => $count2a,
                'diproses' => $count3a,
                'ditolak' => $count4a,
                'dipending' => $count5a
            ];
        }


        $data = [
            'kurTypes' => $kurTypes->map(function ($kurType) {
                return [
                    'name' => $kurType->name,
                    'credit_request_count' => $kurType->credit_requests_count,
                ];
            }),
            'banks' => $banks->map(function ($bank) {
                return [
                    'name' => $bank->name,
                    'credit_request_count' => $bank->credit_requests_count,
                ];
            }),

            'data_pengajuan' => $jumlah_status,
        ];

        return response()->json($data);

        }



    public function index()
    {

    // defaultnya "Hari Ini"
    // $DaysAgo = Carbon::now()->subDays(0)->toDateString();
    $DaysAgo = Carbon::now()->toDateString();
    $sevenDaysAgo = Carbon::now()->subDays(6);
    $today = Carbon::now();


    // tipe kur (bisa difilter rentang waktu) (1)
    $kurTypes = KurType::withCount(['creditRequests' => function ($query) use ($DaysAgo) {
        $query->where('created_at', '>=', $DaysAgo);
        $query->where('status', 'DISETUJUI');
    }])->get();

    // jumlah bank (bisa difilter rentang waktu)(2)
    $banks = Bank::withCount(['creditRequests' => function ($query) use ($DaysAgo) {
        $query->where('created_at', '>=', $DaysAgo);
        $query->where('status', 'DISETUJUI');
        // $query->whereIn('status', ['DIAJUKAN', 'DISETUJUI']);
    }])
    ->orderBy('name', 'asc')
    ->get();


    // jumlah SEMUA STATUS PENGAJUAN (bisa diifilter) (3)
    $count1a = CreditRequest::where('created_at', '>=', $DaysAgo)
    ->where('status', 'DIAJUKAN')
    ->count();

    // data disetujui
    $count2a = CreditRequest::whereDate('created_at','>=', $DaysAgo)
        ->where('status', 'DISETUJUI')
        ->count();

    // diproses
    $count3a = CreditRequest::whereDate('created_at','>=', $DaysAgo)
        ->where('status', 'DIPROSES')
        ->count();

    // ditolak
    $count4a = CreditRequest::whereDate('created_at','>=', $DaysAgo)
        ->where('status', 'DITOLAK')
        ->count();

    // dipending
    $count5a = CreditRequest::whereDate('created_at','>=', $DaysAgo)
        ->where('status', 'DIPENDING')
        ->count();

    // $jumlah_status = [];
    $jumlah_status[] = [
        'diajukan' => $count1a,
        'disetujui' => $count2a,
        'diproses' => $count3a,
        'ditolak' => $count4a,
        'dipending' => $count5a
    ];

    // Jumlah Pengajuan Peminjaman dalam 7 Hari Terakhir (4)
    // Data status PENGAJUAN berdasarkan  dalam 7 Hari Terskhir (5)
    $dataStatus7 = [];
    $dataPengajuan7 = [];
    for ($date = $today; $date >= $sevenDaysAgo; $date->subDay()) {

        // data diajukan
        $count1 = CreditRequest::whereDate('created_at', $date)
            ->where('status', 'DIAJUKAN')
            ->count();

        // data disetujui
        $count2 = CreditRequest::whereDate('created_at', $date)
            ->where('status', 'DISETUJUI')
            ->count();

        // diproses
        $count3 = CreditRequest::whereDate('created_at', $date)
            ->where('status', 'DIPROSES')
            ->count();

        // ditolak
        $count4 = CreditRequest::whereDate('created_at', $date)
            ->where('status', 'DITOLAK')
            ->count();

        // dipending
        $count5 = CreditRequest::whereDate('created_at', $date)
            ->where('status', 'DIPENDING')
            ->count();

        $dataPengajuan7[] = [
            'date' => $date->toDateString(),
            'diajukan' => $count1,
        ];

        $dataStatus7[] = [
            'date' => $date->toDateString(),
            'diajukan' => $count1,
            'disetujui' => $count2,
            'diproses' => $count3,
            'ditolak' => $count4,
            'dipending' => $count5
        ];

    }


    // presentase pengajuan
    $previousDay = now()->subDay();
    $today = Carbon::now();
    $todayCount = CreditRequest::whereDate('created_at', $today)
        ->where('status', 'DIAJUKAN')
        ->count();

    $previousDayCount = CreditRequest::whereDate('created_at', $previousDay)
        ->where('status', 'DIAJUKAN')
        ->count();


    if ($previousDayCount > 0) {
        $percentIncrease[] = (($todayCount - $previousDayCount) / $previousDayCount) * 100;
    } elseif ($previousDayCount == 0 && $todayCount > 0) {
        $percentIncrease[] = 100;
    } else if ($previousDayCount == 0 && $todayCount == 0) {
        $percentIncrease[] = 0;
    }

    // to json data
    $data = [
        'kurTypes' => $kurTypes->map(function ($kurType) {
            return [
                'name' => $kurType->name,
                'credit_request_count' => $kurType->credit_requests_count,
            ];
        }),
        'banks' => $banks->map(function ($bank) {
            return [
                'name' => $bank->name,
                'credit_request_count' => $bank->credit_requests_count,
            ];
        }),

        'data_pengajuan' => $jumlah_status,
        'jumlah_pengajuan_peminjaman_dalam_7_hari_terakhir' => $dataPengajuan7,
        'data_pengajuan_dalam_7_hari_terakhir' => $dataStatus7,
        'growth_pengajuan_kredit' => $percentIncrease,
    ];

    return response()->json($data);

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
