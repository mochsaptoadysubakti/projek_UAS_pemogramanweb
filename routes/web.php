<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\TransaksiController;



// Redirect ke login jika mengakses root ('/')
Route::get('/', fn() => redirect()->route('login'));

// Grup middleware untuk pengguna yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('homepage'); // Homepage / Dashboard setelah login
    Route::get('/profile', [UserProfileController::class, 'index'])->name('userprofile');
    Route::put('/profile/update', [ProfileController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Logout
    Route::get('/sewa-motor', [RentalController::class, 'index'])->name('sewa-motor');
    Route::post('/sewa-motor/{id}', [RentalController::class, 'rent'])->name('sewa-motor.rent');

    // ✅ Route untuk upload profile
    Route::post('/upload_profile', [ProfileController::class, 'uploadProfile'])->name('upload_profile');
    Route::get('/upload_profile', function () {
        return view('upload_profile', ['user' => Auth::user()]);
    })->middleware('auth')->name('upload_profile');
});

// Grup middleware untuk guest (tamu) yang belum login
Route::middleware(['guest'])->group(function () {
    // Routes untuk Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');

    // Routes untuk Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');
});

  //Route untuk alur transaksi
Route::get('/transaksi/sewa/{motor}', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/sukses/{transaksi}', [TransaksiController::class, 'sukses'])->name('transaksi.sukses');