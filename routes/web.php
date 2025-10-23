<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


// BASIC ROUTE
Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

// Route::get('/mahasiswa', function () {
//     return 'Halo Mahasiswa';
// });

// ROUTE PARAMETER
// required
Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: ' . $param1;
});
// Router parameter tidak required
Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: ' . $param1;
});

// NAMED ROUTE

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);


Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/success', [AuthController::class, 'login'])->name('auth.login');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('warga', WargaController::class);
Route::get('/data', [WargaController::class, 'index'])->name('data');



Route::resource('produk', ProdukController::class);

