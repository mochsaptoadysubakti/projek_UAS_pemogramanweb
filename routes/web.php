<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\AdminMotorController; // <-- Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda bisa mendaftarkan web routes untuk aplikasi Anda.
|
*/

// Route untuk halaman landing atau redirect ke login jika belum login
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('homepage');
    }
    return redirect()->route('login');
});

// Grup route untuk tamu (pengguna yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'processLogin']);
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'processRegister']);
});

// Grup route untuk pengguna yang sudah terotentikasi (login)
Route::middleware('auth')->group(function () {
    // Halaman utama setelah login
    Route::get('/home', [HomeController::class, 'index'])->name('homepage');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Halaman Profil Pengguna
    Route::get('/profile', [UserProfileController::class, 'index'])->name('userprofile');
    Route::post('/upload_profile', [UserProfileController::class, 'uploadProfile'])->name('upload_profile');
    // Note: Anda bisa gabungkan logic update profil di dalam UserProfileController

    // Halaman Sewa Motor
    Route::get('/sewa-motor', [RentalController::class, 'index'])->name('sewa-motor');
    
    // Alur Transaksi
    Route::get('/transaksi/sewa/{motor}', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/sukses/{transaksi}', [TransaksiController::class, 'sukses'])->name('transaksi.sukses');
});


// ======================================================
// == GRUP ROUTE BARU UNTUK HALAMAN ADMIN ==
// ======================================================
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    
    // Dasbor Admin bisa ditambahkan di sini
    // Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Route untuk CRUD Motor
    Route::resource('motors', AdminMotorController::class);

    // Route khusus untuk update status ketersediaan
    Route::patch('/motors/{motor}/status', [AdminMotorController::class, 'updateStatus'])->name('motors.updateStatus');
});