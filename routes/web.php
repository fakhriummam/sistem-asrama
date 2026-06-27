<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PembayaranController;

// Halaman Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Area Tamu (Hanya bisa diakses jika BELUM login)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProses']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProses']);
});

// Area Admin/Pengurus (HANYA bisa diakses jika SUDAH login)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Halaman Dashboard Utama
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // CRUD Otomatis (Akan memanggil fungsi index, create, store, edit, update, destroy di Controller)
    Route::resource('dashboard/anggota', AnggotaController::class);
    Route::resource('dashboard/pembayaran', PembayaranController::class);
});
