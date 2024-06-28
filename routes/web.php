<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin']);

Route::get('masyarakat', function () {
    return view('home');
})->middleware(['auth', 'verified', 'role:masyarakat']);

Route::get('pegawaiDinas', function () {
    return view('home');
})->middleware(['auth', 'verified', 'role:pegawai dinas']);

Route::get('pegawaiIndividu', function () {
    return view('home');
})->middleware(['auth', 'verified', 'role:pegawai individu']);


require __DIR__.'/auth.php';
