<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\KategoriStatistikController;
use App\Http\Controllers\SubkategoriStatistikController;
use App\Http\Controllers\DataStatistikController;
use App\Http\Controllers\UserController;
use App\Models\Menu;
use Barryvdh\Elfinder\ElfinderController;
use App\Http\Controllers\PageController;

// Halaman utama
Route::get('/', function () {
    $menus = Menu::all()->groupBy('url');
    return view('user.utama', compact('menus'));
});

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Lupa password & reset
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'sendResetCode'])->name('forgot.password.submit');
Route::get('/verify-code', [AuthController::class, 'showVerifyCode'])->name('verify.code');
Route::post('/verify-code', [AuthController::class, 'verifyCode'])->name('verify.code.submit');
Route::get('/reset-password', [AuthController::class, 'showResetPassword'])->name('reset.password');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset.password.submit');

Route::middleware(['auth'])->group(function () {

    // Dashboard & Profil Admin
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-admin', [AuthController::class, 'addAdmin'])->name('addAdmin');
    Route::post('/add-admin', [AuthController::class, 'storeAdmin'])->name('superadmin.addAdmin.submit');
    Route::post('/toggle-admin/{id_pengguna}', [AuthController::class, 'toggleAdmin'])->name('superadmin.toggleAdmin');
    Route::post('/toggle-admin-ajax/{id_pengguna}', [AuthController::class, 'toggleAdminAjax'])->name('superadmin.toggleAdminAjax');
    Route::delete('/delete-pengguna/{id_pengguna}', [AuthController::class, 'deletePengguna'])->name('superadmin.deletePengguna');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::put('/superadmin/update-pengguna/{id_pengguna}', [AuthController::class, 'updatePengguna'])->name('superadmin.updatePengguna');

    // Admin Dashboard
    Route::get('/admin/dashboard', [MenuController::class, 'index'])->name('admin.dashboard');

    // Menu CRUD
    Route::prefix('admin/menu')->group(function () {
        Route::get('/', [MenuController::class, 'showMenu'])->name('menu.index');
        Route::get('/tambah', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/store', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/{id_menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/{id_menu}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/{id_menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

        // Submenu
        Route::get('/{id_menu}/submenu', [SubmenuController::class, 'index'])->name('submenu.index');
        Route::get('/{id_menu}/submenu/create', [SubmenuController::class, 'create'])->name('submenu.create');
        Route::post('/{id_menu}/submenu', [SubmenuController::class, 'store'])->name('submenu.store');
        Route::get('/{id_menu}/submenu/{id_submenu}/edit', [SubmenuController::class, 'edit'])->name('submenu.edit');
        Route::put('/{id_menu}/submenu/{id_submenu}', [SubmenuController::class, 'update'])->name('submenu.update');
        Route::delete('/{id_menu}/submenu/{id_submenu}', [SubmenuController::class, 'destroy'])->name('submenu.destroy');
        Route::get('/{id_menu}/kelola', [SubmenuController::class, 'kelola'])->name('submenu.kelola');
    });

     // Kategori Statistik
    Route::get('/admin/kategori-statistik', [KategoriStatistikController::class, 'index'])->name('kategori-statistik.index');
    Route::get('/admin/kategori-statistik/tambah', [KategoriStatistikController::class, 'create'])->name('kategori-statistik.create');
    Route::post('/admin/kategori-statistik/store', [KategoriStatistikController::class, 'store'])->name('kategori-statistik.store');
    Route::get('/admin/kategori-statistik/edit/{id}', [KategoriStatistikController::class, 'edit'])->name('kategori-statistik.edit');
    Route::put('/admin/kategori-statistik/update/{id}', [KategoriStatistikController::class, 'update'])->name('kategori-statistik.update');
    Route::delete('/admin/kategori-statistik/hapus/{id}', [KategoriStatistikController::class, 'destroy'])->name('kategori-statistik.destroy');
    Route::get('/admin/kategori-statistik/{id}', [KategoriStatistikController::class, 'show'])->name('kategori-statistik.show');

    // 📁 Subkategori Statistik
    Route::get('/admin/subkategori', [App\Http\Controllers\SubkategoriController::class, 'index'])->name('admin.subkategori.index');

    Route::get('/admin/subkategori-statistik', [SubkategoriStatistikController::class, 'index'])->name('subkategori-statistik.index');
    Route::get('/admin/subkategori-statistik/tambah', [SubkategoriStatistikController::class, 'create'])->name('subkategori-statistik.create');
    Route::post('/admin/subkategori-statistik/store', [SubkategoriStatistikController::class, 'store'])->name('subkategori-statistik.store');
    Route::get('/admin/subkategori-statistik/edit/{id}', [SubkategoriStatistikController::class, 'edit'])->name('subkategori-statistik.edit');
    Route::put('/admin/subkategori-statistik/update/{id}', [SubkategoriStatistikController::class, 'update'])->name('subkategori-statistik.update');
    Route::delete('/admin/subkategori-statistik/hapus/{id}', [SubkategoriStatistikController::class, 'destroy'])->name('subkategori-statistik.destroy');
    Route::get('/admin/subkategori-statistik/{id}/detail', [SubkategoriStatistikController::class, 'show'])->name('subkategori-statistik.show');

    // 📈 Data Statistik
    Route::get('/admin/data-statistik', [DataStatistikController::class, 'index'])->name('data-statistik.index');
    Route::get('/admin/data-statistik/tambah', [DataStatistikController::class, 'create'])->name('data-statistik.create');
    Route::post('/admin/data-statistik/store', [DataStatistikController::class, 'store'])->name('data-statistik.store');
    Route::get('/admin/data-statistik/edit/{id}', [DataStatistikController::class, 'edit'])->name('data-statistik.edit');
    Route::put('/admin/data-statistik/update/{id}', [DataStatistikController::class, 'update'])->name('data-statistik.update');
    Route::delete('/admin/data-statistik/hapus/{id}', [DataStatistikController::class, 'destroy'])->name('data-statistik.destroy');
    Route::post('/admin/data-statistik/store', [DataStatistikController::class, 'store'])->name('data-statistik.store');

});

// Profil Desa
Route::prefix('profil')->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('profil_desa');
    Route::get('/tambah', [PageController::class, 'create'])->name('profil.tambah');
    Route::post('/', [PageController::class, 'store'])->name('profil.store');
    Route::get('/edit/{id}', [PageController::class, 'edit'])->name('profil.edit');
    Route::put('/update/{id}', [PageController::class, 'update'])->name('profil.update');
    Route::delete('/hapus/{id}', [PageController::class, 'destroy'])->name('profil.hapus');
});

// Navbar & menu user
Route::get('/menu/{id}', [UserController::class, 'show'])->name('menu.show');
Route::get('/navbar', [UserController::class, 'index'])->name('navbar');

// Elfinder
Route::group(['prefix' => 'elfinder'], function() {
    Route::get('/', [ElfinderController::class, 'showIndex'])->name('elfinder.index');
    Route::any('connector', [ElfinderController::class, 'showConnector'])->name('elfinder.connector');
    Route::get('popup/{input_id?}', [ElfinderController::class, 'showPopup'])->name('elfinder.popup');
});
