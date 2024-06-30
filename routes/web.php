<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/faq', [FaqController::class, 'showFaqs'])->name('faq.show');

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');
    Route::resource("approval", ApprovalController::class);

    Route::patch('/users/{user}/approve', [ApprovalController::class, 'approve'])->name('users.approve');
    Route::patch('/users/{user}/reject', [ApprovalController::class, 'reject'])->name('users.reject');

    Route::resource("laporan", LaporanController::class);
    Route::resource("layanan", LayananController::class);
    Route::resource("faqs", FaqController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('web')->post('/register', 'App\Http\Controllers\Auth\RegisteredUserController@store')->name('register');

require __DIR__ . '/auth.php';
