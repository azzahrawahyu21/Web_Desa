<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\UserController;
use App\Models\Menu;
use Barryvdh\Elfinder\ElfinderController;

Route::get('/', function () {
    // return view('user.utama');
    $menus = Menu::all()->groupBy('url'); // ambil data dari tabel menu
    return view('user.utama', compact('menus')); // kirim ke halaman utama
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk lupa kata sandi
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'sendResetCode'])->name('forgot.password.submit');
Route::get('/verify-code', [AuthController::class, 'showVerifyCode'])->name('verify.code');
Route::post('/verify-code', [AuthController::class, 'verifyCode'])->name('verify.code.submit');
Route::get('/reset-password', [AuthController::class, 'showResetPassword'])->name('reset.password');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset.password.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-admin', [AuthController::class, 'addAdmin'])->name('addAdmin');
    Route::post('/add-admin', [AuthController::class, 'storeAdmin'])->name('superadmin.addAdmin.submit');
    Route::post('/toggle-admin/{id_pengguna}', [AuthController::class, 'toggleAdmin'])->name('superadmin.toggleAdmin');
    Route::post('/toggle-admin-ajax/{id_pengguna}', [AuthController::class, 'toggleAdminAjax'])->name('superadmin.toggleAdminAjax');
    Route::delete('/delete-pengguna/{id_pengguna}', [AuthController::class, 'deletePengguna'])->name('superadmin.deletePengguna');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::put('/superadmin/update-pengguna/{id_pengguna}', [AuthController::class, 'updatePengguna'])->name('superadmin.updatePengguna');

    Route::get('/admin/dashboard', [MenuController::class, 'index'])->name('admin.dashboard');

    // Menu CRUD
    Route::get('/admin/menu', [MenuController::class, 'showMenu'])->name('menu.index');
    Route::get('/admin/tambahMenu', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/admin/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/admin/menu/{id_menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/admin/menu/{id_menu}', [MenuController::class, 'update'])->name('menu.update');
    // Route::put('/admin/menu/{id_menu}/update', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/admin/menu/{id_menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

    // Submenu
    Route::get('/admin/menu/{id_menu}/submenu', [SubmenuController::class, 'index'])->name('submenu.index');
    Route::post('/admin/menu/{id_menu}/submenu', [SubmenuController::class, 'store'])->name('submenu.store');
    Route::get('/admin/menu/{id_menu}/submenu/create', [SubmenuController::class, 'create'])->name('submenu.create');
    // Route::put('/admin/submenu/{id_submenu}', [SubmenuController::class, 'update'])->name('submenu.update');
    // Route::delete('/admin/submenu/{id_submenu}', [SubmenuController::class, 'destroy'])->name('submenu.destroy');
    Route::get('/admin/menu/{id_menu}/kelola', [SubmenuController::class, 'kelola'])->name('submenu.kelola');
    Route::get('/admin/menu/{id_menu}/submenu/{id_submenu}/edit', [SubmenuController::class, 'edit'])->name('submenu.edit');
    Route::put('/admin/menu/{id_menu}/submenu/{id_submenu}', [SubmenuController::class, 'update'])->name('submenu.update');
    Route::delete('/admin/menu/{id_menu}/submenu/{id_submenu}', [SubmenuController::class, 'destroy'])->name('submenu.destroy');
});
Route::get('/admin/dashboard', [MenuController::class, 'index'])->name('admin.dashboard');

// menu
Route::get('/profil', [PageController::class, 'index'])->name('profil_desa');
Route::get('/profil/tambah', [PageController::class, 'create'])->name('profil.tambah');
Route::post('/profil', [PageController::class, 'store'])->name('profil.store');
Route::get('/profil/edit/{id}', [PageController::class, 'edit'])->name('profil.edit');
Route::put('/profil/update/{id}', [PageController::class, 'update'])->name('profil.update');
Route::delete('/profil/hapus/{id}', [PageController::class, 'destroy'])->name('profil.hapus');

// Pengguna
Route::get('/menu/{id}', [UserController::class, 'show'])->name('menu.show');
Route::get('/navbar', [UserController::class, 'index'])->name('navbar');

// Elfinder Routes
Route::group(['prefix' => 'elfinder'], function() {
    Route::get('/', [ElfinderController::class, 'showIndex'])->name('elfinder.index');
    Route::any('connector', [ElfinderController::class, 'showConnector'])->name('elfinder.connector');
    Route::get('popup/{input_id?}', [ElfinderController::class, 'showPopup'])->name('elfinder.popup');
});

// Pengguna
Route::get('/menu/{id}', [UserController::class, 'show'])->name('menu.show');
Route::get('/navbar', [UserController::class, 'index'])->name('navbar');

// Elfinder Routes
Route::group(['prefix' => 'elfinder'], function() {
    Route::get('/', [ElfinderController::class, 'showIndex'])->name('elfinder.index');
    Route::any('connector', [ElfinderController::class, 'showConnector'])->name('elfinder.connector');
    Route::get('popup/{input_id?}', [ElfinderController::class, 'showPopup'])->name('elfinder.popup');
});