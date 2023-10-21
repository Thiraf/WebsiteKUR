<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdmin01
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // hanya bisa diakses admin 0 dan 1 (ADMIN OJK DAN BANK)

        if ((Auth::user()->role_id == 0 || Auth::user()->role_id == 1 )) {
            return $next($request);

        } else {
            return response()->json([
                'status'=> false,
                'message' => 'Anda TIDAK memiliki izin untuk mengakses ini, role != 0 atau 1, middlware/CheckAdmin01. ',
            ], 403);
        }
    }
}
