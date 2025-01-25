<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataSKController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NonasnController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


// Route::get('/', function () {
//     return view('auth.login-user');
// });

//Proses Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/proses_login', [LoginController::class, 'login_proses']);
Route::get('/proseslogout', [LoginController::class, 'logout']);


Route::middleware('auth:pegawai')->group(function () {
//User Input SK
Route::get('/beranda', [BerandaController::class, 'view']);
Route::get('/sk/create', [BerandaController::class, 'create']);
Route::post('/sk/store', [BerandaController::class, 'store']);
Route::get('/sk/edit/{id_sk}', [BerandaController::class, 'edit']);
Route::post('/sk/rubah', [BerandaController::class, 'update']);
Route::get('/sk/hapus/{id_sk}', [BerandaController::class, 'hapus']);


//User Profile
Route::get('/profile/{id_sk}', [ProfileController::class, 'view']);
Route::get('/profile/edit/{id_sk}', [ProfileController::class, 'edit']);
Route::post('/profile/update', [ProfileController::class, 'update']);
});

//Proses Login Admin
Route::get('/panel', [AuthController::class, 'index']);
Route::post('/login_proses', [AuthController::class, 'login_proses']);
Route::get('/panel/proseslogout', [AuthController::class, 'logout']);



//Akses Level Admin
Route::middleware('auth:user')->group(function () {

//home
Route::get('/panel/home', [HomeController::class, 'view']);

//data non-asn
Route::get('/panel/data-nonasn/view', [NonasnController::class, 'view']);
Route::get('/panel/data-nonasn/create', [NonasnController::class, 'create']);
Route::post('/panel/data-nonasn/store', [NonasnController::class, 'store']);
Route::get('/panel/data-nonasn/edit/{id_nonasn}', [NonasnController::class, 'edit']);
Route::post('/panel/data-nonasn/update', [NonasnController::class, 'update']);
Route::get('/panel/data-nonasn/hapus/{id_nonasn}', [NonasnController::class, 'hapus']);

//data non-asn
Route::get('/panel/sk/view', [DataSKController::class, 'view']);
Route::get('/panel/sk/create', [DataSKController::class, 'create']);
Route::post('/panel/sk/store', [DataSKController::class, 'store']);
Route::get('/panel/sk/edit/{id_sk}', [DataSKController::class, 'edit']);
Route::post('/panel/sk/update', [DataSKController::class, 'update']);
Route::get('/panel/sk/hapus/{id_sk}', [DataSKController::class, 'hapus']);
});
