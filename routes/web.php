<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController; // Asumsi menggunakan Laravel UI
use App\Http\Controllers\Auth\RegisterController; // Asumsi menggunakan Laravel UI

// Halaman Landing
Route::get('/', [PageController::class, 'landing'])->name('landing');

// Rute Otentikasi (Laravel UI biasanya menyiapkan ini)
// Jika Anda menggunakan php artisan ui bootstrap --auth, sebagian besar sudah ditangani.
// Anda mungkin perlu menyesuaikan jika Anda membangun otentikasi secara manual.
Auth::routes(); // Ini menangani /login, /register, /logout dll.

// Rute Terotentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/cuaca', [PageController::class, 'cuaca'])->name('cuaca');
    Route::get('/kalender', [PageController::class, 'kalender'])->name('kalender');
    Route::get('/sambung-niaga', [ProductController::class, 'index'])->name('sambung-niaga');

    // Tambahkan rute untuk "Input Parameter" dan "Pasca Panen" jika sudah siap
    // Route::get('/input-parameter', [SomeController::class, 'inputParameter'])->name('input.parameter');
    // Route::get('/pasca-panen', [SomeController::class, 'pascaPanen'])->name('pasca.panen');
});