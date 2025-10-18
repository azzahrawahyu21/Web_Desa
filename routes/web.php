<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('user.utama');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/add-admin', [AuthController::class, 'addAdmin'])->middleware('auth')->name('addAdmin');
Route::post('/add-admin', [AuthController::class, 'storeAdmin'])->middleware('auth')->name('superadmin.addAdmin.submit');

