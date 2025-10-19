<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\ProfilDesaController;

Route::get('/', function () {
    return view('user.utama');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/add-admin', [AuthController::class, 'addAdmin'])->middleware('auth')->name('addAdmin');
Route::post('/add-admin', [AuthController::class, 'storeAdmin'])->middleware('auth')->name('superadmin.addAdmin.submit');
Route::post('/toggle-admin/{id_pengguna}', [AuthController::class, 'toggleAdmin'])->middleware('auth')->name('superadmin.toggleAdmin');
Route::post('/toggle-admin-ajax/{id_pengguna}', [AuthController::class, 'toggleAdminAjax'])->middleware('auth')->name('superadmin.toggleAdminAjax');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [MenuController::class, 'index'])->name('admin.dashboard');

    // Menu CRUD
    Route::get('/admin/tambahMenu', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/admin/menu/store', [MenuController::class, 'store'])->name('menu.store');

    // Submenu
    Route::get('/admin/menu/{id_menu}/submenu', [SubmenuController::class, 'index'])->name('submenu.index');
    Route::post('/admin/menu/{id_menu}/submenu', [SubmenuController::class, 'store'])->name('submenu.store');
});
Route::get('/admin/dashboard', [MenuController::class, 'index'])->name('admin.dashboard');

// menu
Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil_desa');
Route::get('/profil/tambah', [ProfilDesaController::class, 'create'])->name('profil.tambah');
Route::post('/profil', [ProfilDesaController::class, 'store'])->name('profil.store');
Route::get('/profil/edit/{id}', [ProfilDesaController::class, 'edit'])->name('profil.edit');
Route::put('/profil/update/{id}', [ProfilDesaController::class, 'update'])->name('profil.update');
Route::delete('/profil/hapus/{id}', [ProfilDesaController::class, 'destroy'])->name('profil.hapus');
