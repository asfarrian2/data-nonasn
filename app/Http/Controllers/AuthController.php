<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index() {
        return view('auth.login-admin');

    }

    public function login_proses(Request $request){
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/panel/home');
        } else {
            return redirect('/panel')->with(['warning' => 'Email / Password Salah']);
        }
    }

    public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/panel');
    }



}
