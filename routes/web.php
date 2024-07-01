<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackingStatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// Rute untuk login dan autentikasi
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Rute untuk halaman laporan pengguna
Route::get('/laporan', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

Route::get('/faq', [FaqController::class, 'showFaqs'])->name('faq.show');
Route::get('/admin/faqs', [FaqController::class, 'index'])->name('faqs.index');

// Tambahkan rute untuk role masyarakat, pegawai dinas, dan pegawai individu
Route::middleware(['auth'])->group(function () {
    Route::get('/masyarakat', [HomeController::class, 'index'])->name('masyarakat');
    Route::get('/pegawai-dinas', [HomeController::class, 'index'])->name('pegawaiDinas');
    Route::get('/pegawai-individu', [HomeController::class, 'index'])->name('pegawaiIndividu');
});

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');
    Route::resource("approval", ApprovalController::class);

    Route::patch('/users/{user}/approve', [ApprovalController::class, 'approve'])->name('users.approve');
    Route::patch('/users/{user}/reject', [ApprovalController::class, 'reject'])->name('users.reject');

    Route::resource("laporan", LaporanController::class)->except(['create', 'store']);
    Route::resource("layanan", LayananController::class);
    Route::resource("faqs", FaqController::class);
    Route::post('laporan/{laporan}/tracking', [TrackingStatusController::class, 'store'])->name('tracking.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('web')->post('/register', 'App\Http\Controllers\Auth\RegisteredUserController@store')->name('register');

require __DIR__ . '/auth.php';
