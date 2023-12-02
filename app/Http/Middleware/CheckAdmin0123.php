<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdmin0123
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // bisa diakses semua admin

        if ((Auth::user()->role_id == 0 || Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)) {
            return $next($request);

        } else {
            // return response()->json([
            //     'status'=> false,
            //     'message' => 'Anda TIDAK memiliki izin untuk mengakses ini, role != 0123, middlware/CheckAdmin0123. ',
            // ], 403);

            abort(404);
        }

    }
}
