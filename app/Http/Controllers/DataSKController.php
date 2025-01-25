<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class DataSKController extends Controller
{
    public function view(){

        $sk = DB::table('sk')
        ->leftJoin('pegawai', 'sk.id_nonasn', '=', 'pegawai.id_nonasn')
        ->get();

        return view ('admin.sk.view', compact('sk'));
    }

    public function create(){

        $pegawai = DB::table('pegawai')
        ->get();

        return view ('admin.sk.create', compact('pegawai'));
    }


    public function store(Request $request)
    {

        $id_sk=DB::table('sk')
        ->latest('id_sk', 'DESC')
        ->first();

        $kodeobjek ="SK-";

        if($id_sk == null){
            $nomorurut = "0001";
        }else{
            $nomorurut = substr($id_sk->id_sk, 3, 4) + 1;
            $nomorurut = str_pad($nomorurut, 4, "0", STR_PAD_LEFT);
        }
        $id=$kodeobjek.$nomorurut;

        $id_nonasn = $request->id_nonasn;
        $nomor = $request->nomor;
        $tgl_sk = $request->tgl_sk;
        $jabatan_sk = $request->jabatan_sk;
        $penempatan = $request->penempatan;

        $data = [
            'id_sk' => $id,
            'id_nonasn' => $id_nonasn,
            'nomor' => $nomor,
            'tgl_sk' => $tgl_sk,
            'jabatan_sk' => $jabatan_sk,
            'penempatan' => $penempatan
        ];
        $simpan = DB::table('sk')->insert($data);
        if ($simpan) {
            return Redirect('/panel/sk/view')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function edit($id_sk){

        $pegawai = DB::table('pegawai')
        ->get();

        $sk = DB::table('sk')
        ->where('id_sk',$id_sk)
        ->first();

        return view ('admin.sk.edit', compact('pegawai', 'sk'));
    }

    public function update(Request $request)
    {
        $id_sk = $request->id_sk;
        $id_nonasn = $request->id_nonasn;
        $nomor = $request->nomor;
        $tgl_sk = $request->tgl_sk;
        $jabatan_sk = $request->jabatan_sk;
        $penempatan = $request->penempatan;

        $data = [
            'id_nonasn' => $id_nonasn,
            'nomor' => $nomor,
            'tgl_sk' => $tgl_sk,
            'jabatan_sk' => $jabatan_sk,
            'penempatan' => $penempatan
        ];

        $update=DB::table('sk')->where('id_sk', $id_sk)->update($data);
        if ($update){
            return Redirect('/panel/sk/view')->with(['success' => 'Data Berhasil Diubah']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Diubah']);
        }
    }

    public function hapus($id_sk){

        $delete = DB::table('sk')->where('id_sk', $id_sk)->delete();
        if ($delete) {
            return redirect('/panel/sk/view')->with(['success' => 'Data Berhasil Dihapus !']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus !']);
        }
    }


}
