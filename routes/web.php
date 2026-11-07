<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Halaman awal diarahkan ke form login
Route::redirect('/', '/login');

// Login: tampilkan form (GET) lalu proses form (POST)
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'authenticate'])->name('login.process');

// Halaman setelah login. Username dikirim lewat request parameter: ?username=...
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
