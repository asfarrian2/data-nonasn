<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function error(){
        return view('errors.404');
    }

    public function view(){

        $pegawai = DB::table('pegawai')
        ->leftJoin('sk', 'pegawai.id_nonasn', '=', 'sk.id_nonasn')
        ->select('pegawai.id_nonasn', 'pegawai.nama', DB::raw('COUNT(sk.id_sk) as total'))
        ->groupBy('pegawai.id_nonasn')
        ->get();


        return view('admin.home', compact('pegawai'));


    }

    public function Cetak(){

        $pegawai = DB::table('pegawai')
        ->leftJoin('sk', 'pegawai.id_nonasn', '=', 'sk.id_nonasn')
        ->select('pegawai.id_nonasn', 'pegawai.nama', 'pegawai.pendidikan','pegawai.nik', 'pegawai.jabatan', DB::raw('COUNT(sk.id_sk) as total'))
        ->groupBy('pegawai.id_nonasn')
        ->get();

        $sk = DB::table('sk')
        ->orderBy('id_nonasn', 'DESC')
        ->get();


        return view('admin.laporan', compact('pegawai', 'sk'));


    }

    public function excel(){

        $pegawai = DB::table('pegawai')
        ->leftJoin('sk', 'pegawai.id_nonasn', '=', 'sk.id_nonasn')
        ->select('pegawai.id_nonasn', 'pegawai.nama', 'pegawai.pendidikan','pegawai.nik', 'pegawai.jabatan', DB::raw('COUNT(sk.id_sk) as total'))
        ->groupBy('pegawai.id_nonasn')
        ->get();

        $sk = DB::table('sk')
        ->orderBy('id_nonasn', 'DESC')
        ->get();
        header("Content-type: application/vnd-ms-excel");
        // Mendefinisikan nama file ekspor "hasil-export.xls"
        header("Content-Disposition: attachment; filename=Laporan Penerimaan.xls");


        return view('admin.laporan', compact('pegawai', 'sk'));


    }





    public function beranda(){
        return view('user.home');
    }

}
