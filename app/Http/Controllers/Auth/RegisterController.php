<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Session;




class RegisterController extends Controller
{

    public function register()
    {
        return view('register');
    }

    public function actionregister(Request $request)
    {

        $user = User::create([
            'email' => $request->email,
            'name' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 0,
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }


}
