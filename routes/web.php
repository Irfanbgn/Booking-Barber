<?php

use App\Http\Controllers\BarberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminAuthController;

// ========== ROUTE ADMIN LOGIN ==========
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ========== ROUTE YANG BISA DI AKSES TANPA LOGIN ==========
Route::get('/', [BarberController::class, 'index']); // Halaman utama
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/teamwork', [BarberController::class, 'teamwork'])->name('teamwork');

// ========== ROUTE YANG WAJIB LOGIN ADMIN ==========
Route::middleware('auth:admin')->group(function () {
    
    // Dashboard Admin
    Route::get('/admin/dashboard', [BarberController::class, 'adminDashboard'])->name('admin.dashboard');
    
    
    // Teamwork
    
    // Manajemen Barber (Pekerja)
    Route::get('/admin/barber/add', [BarberController::class, 'create'])->name('barber.create');
    Route::post('/admin/barber/store', [BarberController::class, 'store'])->name('barber.store');
    Route::get('/admin/barber/edit/{id}', [BarberController::class, 'edit'])->name('barber.edit');
    Route::put('/admin/barber/update/{id}', [BarberController::class, 'update'])->name('barber.update');
    Route::delete('/admin/barber/delete/{id}', [BarberController::class, 'destroy'])->name('barber.destroy');
    
    // Manajemen Pemasukan
    Route::get('/admin/pemasukan/create', [BarberController::class, 'createPemasukan'])->name('pemasukan.create');
    Route::post('/admin/pemasukan/store', [BarberController::class, 'storePemasukan'])->name('pemasukan.store');
    
    // Konfirmasi Booking
    Route::put('/admin/booking/{id}/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
});

// Route booking tanpa prefix (untuk user umum)
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');