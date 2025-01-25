<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function view(){

        $id_nonasn = Auth::guard('pegawai')->user()->id_nonasn;


        $pegawai = DB::table('pegawai')
        ->where('id_nonasn', $id_nonasn)
        ->first();

        return view ('user.profile.view', compact('pegawai'));
    }

    public function edit(){

        $id_nonasn = Auth::guard('pegawai')->user()->id_nonasn;


        $pegawai = DB::table('pegawai')
        ->where('id_nonasn', $id_nonasn)
        ->first();

        return view ('user.profile.edit', compact('pegawai'));
    }

    public function update(Request $request)
    {

        $id_nonasn = Auth::guard('pegawai')->user()->id_nonasn;
        $nik = $request->nik;
        $nama = $request->nama;
        $tpt_lahir = $request->tpt_lahir;
        $tgl_lahir = $request->tgl_lahir;
        $alamat = $request->alamat;
        $jen_kelamin = $request->jen_kelamin;
        $pendidikan = $request->pendidikan;
        $jabatan = $request->jabatan;
        $seksi = $request->seksi;

        $data = [
            'id_nonasn' => $id_nonasn,
            'nik' => $nik,
            'nama' => $nama,
            'tpt_lahir' => $tpt_lahir,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'jen_kelamin' => $jen_kelamin,
            'pendidikan' => $pendidikan,
            'jabatan' => $jabatan,
            'seksi' => $seksi

        ];
        $update=DB::table('pegawai')->where('id_nonasn', $id_nonasn)->update($data);
        if ($update){
            return Redirect('/profile/'.$id_nonasn)->with(['success' => 'Data Berhasil Diubah']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Diubah']);
        }
    }
}
