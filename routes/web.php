<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WargaFileController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('pages.auth.login');
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

Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/success', [AuthController::class, 'login'])->name('auth.login');


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('warga', WargaController::class);
Route::get('/data', [WargaController::class, 'index'])->name('data');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');


Route::resource('produk', ProdukController::class);

Route::resource('user', UserController::class);

Route::get('/users/create', [UserController::class, 'create'])->name('user.create');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::delete('warga-files/{wargaFile}', [WargaFileController::class, 'destroy'])->name('warga-files.destroy');

Route::get('/developer-profile', function () {
    return view('pages.auth.dev'); 
})->name('developer.profile');

Route::get('/', [UmkmController::class, 'beranda'])->name('beranda');
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
Route::get('/admin/umkm/create', [UmkmController::class, 'create'])->name('umkm.create');
Route::post('/admin/umkm', [UmkmController::class, 'store'])->name('umkm.store'); 
Route::get('/umkm/{id}', [UmkmController::class, 'show'])->name('umkm.show');
Route::get('/umkm/{id}/edit', [UmkmController::class, 'edit'])->name('umkm.edit');
Route::put('/umkm/{id}', [UmkmController::class, 'update'])->name('umkm.update');
Route::delete('/umkm/{id}', [App\Http\Controllers\UmkmController::class, 'destroy'])->name('umkm.destroy');


Route::resource('pesanan', PesananController::class);