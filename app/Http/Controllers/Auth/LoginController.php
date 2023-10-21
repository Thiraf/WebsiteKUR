<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    // use AuthenticatesUsers;

    //
    // protected $redirectTo = '/manage';

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }


    public function loginUser(Request $request){
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'proses login gagal ekk',
                'data' => $validator -> errors()
            ], 401);
        }

        if(!Auth::guard('web')->attempt($request->only(['email', 'password']))){
            return response()->json([
                'status'=> false,
                'message' => 'email dan pass salah y'
            ], 401);
        }

        // $cek = Auth::user()->role_id;
        $cek = auth()->user()->role_id;


        $datauser = User::where('email', $request->email)->first();
        return response()->json([
            'status' => true,
            'message' => 'berhasil proses login nya uu',
            'token' => $datauser->createToken('token-login')->plainTextToken,
            'cekrole' => $cek,
        ]);

        // $accessToken =  $datauser->createToken('token-login')->plainTextToken;
        // return redirect('/manage')->with('token', $accessToken);
    }


    // public function logout(Request $request)
    // {
    //     $this->performLogout($request);
    //     return redirect()->to('/login');
    // }

}
