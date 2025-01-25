<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

        public function index() {
            return view('auth.login-user');

        }

        public function login_proses(Request $request){
            if (Auth::guard('pegawai')->attempt(['nik' => $request->email, 'password' => $request->password])) {
                return redirect('/beranda');
            } else {
                return redirect('/')->with(['warning' => 'Email / Password Salah']);
            }
        }

        public function logout(Request $request)
        {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
        }

}
