<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [\App\Http\Controllers\pagecontroller::class, 'login']);
    Route::post('/auth', [\App\Http\Controllers\pagecontroller::class, 'auth']);
});
// midleware petugas + siswa
Route::group(['middleware' =>  'auth'], function () {
    // Index + logout
    Route::get('/', [\App\Http\Controllers\pagecontroller::class, 'index']);
    Route::get('/home', [\App\Http\Controllers\pagecontroller::class, 'home']);
    Route::get('/logout', [\App\Http\Controllers\pagecontroller::class, 'logout']);
    // pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/transaksi/{id}', [PembayaranController::class, 'transaksi']);
    Route::post('/pembayaran/simpan', [PembayaranController::class, 'simpan']);
    Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);
    Route::post('/pembayaran/update', [PembayaranController::class, 'update']);
    Route::get('/pembayaran/hapus/{id}', [PembayaranController::class, 'hapus']);
});
//////////midleware admin 
Route::group(['middleware' => 'level:admin', 'auth'], function () {
    //Route User
    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/tambah', [\App\Http\Controllers\UserController::class, 'tambah']);
    Route::post('/user/simpan', [\App\Http\Controllers\UserController::class, 'simpan']);
    Route::get('/user/edit/{id}', [\App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/user/update', [\App\Http\Controllers\UserController::class, 'update']);
    Route::get('/user/hapus/{id}', [\App\Http\Controllers\UserController::class, 'hapus']);

    //Route Kelas
    Route::get('/kelas', [\App\Http\Controllers\KelasController::class, 'index']);
    Route::get('/kelas/tambah', [\App\Http\Controllers\KelasController::class, 'tambah']);
    Route::post('/kelas/simpan', [\App\Http\Controllers\KelasController::class, 'simpan']);
    Route::get('/kelas/edit/{id}', [\App\Http\Controllers\KelasController::class, 'edit']);
    Route::post('/kelas/update', [\App\Http\Controllers\KelasController::class, 'update']);
    Route::get('/kelas/hapus/{id}', [\App\Http\Controllers\KelasController::class, 'hapus']);

    //Route SPP
    Route::get('/spp', [\App\Http\Controllers\SPPController::class, 'index']);
    Route::get('/spp/tambah', [\App\Http\Controllers\SPPController::class, 'tambah']);
    Route::post('/spp/simpan', [\App\Http\Controllers\SPPController::class, 'simpan']);
    Route::get('/spp/edit/{id}', [\App\Http\Controllers\SPPController::class, 'edit']);
    Route::post('/spp/update', [\App\Http\Controllers\SPPController::class, 'update']);
    Route::get('/spp/hapus/{id}', [\App\Http\Controllers\SPPController::class, 'hapus']);


    //Route Siswa
    Route::get('/siswa', [\App\Http\Controllers\SiswaController::class, 'index']);
    Route::get('/siswa/tambah', [\App\Http\Controllers\SiswaController::class, 'tambah']);
    Route::post('/siswa/simpan', [\App\Http\Controllers\SiswaController::class, 'simpan']);
    Route::get('/siswa/edit/{id}', [\App\Http\Controllers\SiswaController::class, 'edit']);
    Route::post('/siswa/update', [\App\Http\Controllers\SiswaController::class, 'update']);
    Route::get('/siswa/hapus/{id}', [\App\Http\Controllers\SiswaController::class, 'hapus']);
});

// pembayaran
