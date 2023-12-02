<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/manage');
        }else{
            return view('backend.auth.login');
        }
    }

    public function actionlogin(Request $request)
    {



        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('manage');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

















