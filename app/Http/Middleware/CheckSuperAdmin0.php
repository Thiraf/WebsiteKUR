<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class CheckSuperAdmin0
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // hanya bisa diakses admin 0 (ADMIN OJK)

        if ((Auth::user()->role_id == 0)) {
            return $next($request);

        } else {
            return response()->json([
                'status'=> false,
                'message' => 'Anda TIDAK memiliki izin untuk mengakses ini, role != 0, middlware/CheckSuperAdmin0. ',
            ], 403);
        }
    }
}
