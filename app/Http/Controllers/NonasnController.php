<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class NonasnController extends Controller
{
    public function view(){

        $pegawai = DB::table('pegawai')
        ->get();

        return view ('admin.non_asn.view', compact('pegawai'));
    }

    public function create(){

        return view ('admin.non_asn.create');
    }

    public function store(Request $request)
    {

        $id_nonasn=DB::table('pegawai')
        ->latest('id_nonasn', 'DESC')
        ->first();

        $kodeobjek ="101";

        if($id_nonasn == null){
            $nomorurut = "001";
        }else{
            $nomorurut = substr($id_nonasn->id_nonasn, 3, 3) + 1;
            $nomorurut = str_pad($nomorurut, 3, "0", STR_PAD_LEFT);
        }
        $id=$kodeobjek.$nomorurut;

        $nik = $request->nik;
        $nama = $request->nama;
        $tpt_lahir = $request->tpt_lahir;
        $tgl_lahir = $request->tgl_lahir;
        $alamat = $request->alamat;
        $jen_kelamin = $request->jen_kelamin;
        $pendidikan = $request->pendidikan;
        $jabatan = $request->jabatan;
        $seksi = $request->seksi;
        $password   = Hash::make('456789');

        $data = [
            'id_nonasn' => $id,
            'nik' => $nik,
            'nama' => $nama,
            'tpt_lahir' => $tpt_lahir,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'jen_kelamin' => $jen_kelamin,
            'pendidikan' => $pendidikan,
            'jabatan' => $jabatan,
            'seksi' => $seksi,
            'password' => $password

        ];
        $simpan = DB::table('pegawai')->insert($data);
        if ($simpan) {
            return Redirect('/panel/data-nonasn/view')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function edit($id_nonasn){

        $pegawai = DB::table('pegawai')
        ->where('id_nonasn', $id_nonasn)
        ->first();

        return view ('admin.non_asn.edit', compact('pegawai'));
    }

    public function update(Request $request)
    {

        $id_nonasn = $request->id_nonasn;
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
            return Redirect('/panel/data-nonasn/view')->with(['success' => 'Data Berhasil Diubah']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Diubah']);
        }
    }

    public function hapus($id_nonasn){

        $delete = DB::table('pegawai')->where('id_nonasn', $id_nonasn)->delete();
        if ($delete) {
            return redirect('/panel/data-nonasn/view')->with(['success' => 'Data Berhasil Dihapus !']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus !']);
        }
    }



}
