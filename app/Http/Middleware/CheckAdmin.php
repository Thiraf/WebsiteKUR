<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);

        if ((Auth::user()->role_id == 0)) {
            return $next($request);
            // $cek = Auth::user()->role_id;
            // $cek2 = Auth::user()->name;
            // $cek3 = Auth::user()->email;
            // $cek = auth()->user()->role_id;

            // return response()->json([
            //     'status' => true,
            //     // 'message' => 'Akses IYA diberikan, karena Anda memiliki izin. middleware/checkadmin',
            //     'cek role di middleware / checkadmin' => $cek,
            //     'cek name di middleware / checkadmin' => $cek2,
            //     'cek email di middleware / checkadmin' => $cek3
            // ], 200);

        } else {
            return response()->json([
                'status'=> false,
                'message' => 'Anda TIDAK memiliki izin untuk mengakses ini, middlware/checkadmin yah',
            ], 403);
        }

        // if(Auth::check()){
        //     if (Auth()->user()->role_idkkkk == 0) {
        //         // return $next($request);
        //         return response()->json([
        //             'status' => true,
        //             'message' => 'Akses IYA diberikan, karena Anda memiliki izin. middleware/checkadmin',
        //         ], 200);
        //     } else {
        //         return response()->json([
        //             'status'=> false,
        //             'message' => 'Anda TIDAK memiliki izin untuk mengakses ini, middlware/checkadmin'
        //         ], 403);
        //     }

        // } else {
        //     return response()->json([
        //         'status'=> false,
        //         'message' => 'Auth gagal, belum login, middlware/checkadmin'
        //     ], 403);
        // }

        // abort(403);

    }
}
