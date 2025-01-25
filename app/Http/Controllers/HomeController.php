<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function view(){
        return view('admin.home');
    }

    public function beranda(){
        return view('user.home');
    }

}
