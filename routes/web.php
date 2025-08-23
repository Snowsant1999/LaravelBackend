<?php

use App\Http\Controllers\keluhcontroller;
use App\Http\Controllers\logincontroller;
use Illuminate\Support\Facades\Route;

// ====================
// Auth & Login Routes
// ====================
Route::get('/', [logincontroller::class, 'index'])->name('login');
Route::get('/register', [logincontroller::class, 'register'])->name('register');
Route::post('/register', [logincontroller::class, 'registerpost'])->name('registpost');
Route::post('/', [logincontroller::class, 'loginpost'])->name('loginpost');
Route::post('/logout', [logincontroller::class, 'logout'])->name('logout');

// ====================
// Keluhan Routes (Siswa)
// ====================
Route::middleware(['auth', 'role:Siswa'])->group(function () {
    Route::get('/siswa', [keluhcontroller::class, 'siswa'])->name('indexsiswa');
    Route::get('/create', [keluhcontroller::class, 'create'])->name('create');
    Route::post('/create', [keluhcontroller::class, 'store'])->name('store');
    Route::get('/edit/{siswa}', [keluhcontroller::class, 'edit'])->name('edit');
    Route::put('/edit/{siswa}', [keluhcontroller::class, 'update'])->name('update');
    Route::get('/balasan/{siswa}', [keluhcontroller::class, 'balasan'])->name('balasan');
});

// ====================
// Keluhan Routes (Guru)
// ====================
Route::middleware(['auth', 'role:Guru'])->group(function () {
    Route::get('/guru', [keluhcontroller::class, 'guru'])->name('indexguru');
    Route::get('/balas/{siswa}', [keluhcontroller::class, 'balas'])->name('balas');
    Route::put('/balas/{siswa}', [keluhcontroller::class, 'balasput'])->name('balasput');
});

// ====================
// Routes Guru dan Siswa
// ====================
Route::middleware(['auth', 'role:Siswa,Guru'])->group(function () {
    Route::get('/show/{siswa}', [keluhcontroller::class, 'show'])->name('show');
    Route::delete('/siswa/{id}', [keluhcontroller::class, 'destroy'])->name('destroy');
});