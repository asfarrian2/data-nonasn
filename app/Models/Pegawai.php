<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pegawai extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "pegawai";
    protected $primaryKey = "id_nonasn";
    public $incrementing = false;
    protected $fillable = [
        'id_nonasn',
        'nama',
        'tgl_lahir',
        'tpt_lahir',
        'jen_kelamin',
        'alamat',
        'jabatan',
        'password'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
