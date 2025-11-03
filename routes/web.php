<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\KategoriStatistikController;
use App\Http\Controllers\SubkategoriStatistikController;
use App\Http\Controllers\DataStatistikController;
use App\Http\Controllers\JenisPPIDController;
use App\Http\Controllers\JudulPPIDController;
use App\Http\Controllers\PPIDController;
use App\Http\Controllers\UserController;
use App\Models\Menu;
use Barryvdh\Elfinder\ElfinderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\RtController;

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
    Route::get('/admin/kategori-statistik/edit/{id_kategori}', [KategoriStatistikController::class, 'edit'])->name('kategori-statistik.edit');
    Route::put('/admin/kategori-statistik/update/{id_kategori}', [KategoriStatistikController::class, 'update'])->name('kategori-statistik.update');
    Route::delete('/admin/kategori-statistik/hapus/{id_kategori}', [KategoriStatistikController::class, 'destroy'])->name('kategori-statistik.destroy');
    Route::get('/admin/kategori-statistik/{id_kategori}', [KategoriStatistikController::class, 'show'])->name('kategori-statistik.show');

    // Subkategori Statistik
    Route::get('/admin/subkategori-statistik/{id_kategori}', [SubkategoriStatistikController::class, 'index'])->name('subkategori-statistik.index');
    Route::get('/admin/subkategori-statistik/tambah/{id_kategori}', [SubkategoriStatistikController::class, 'create'])->name('subkategori-statistik.create');
    Route::post('/admin/subkategori-statistik/store', [SubkategoriStatistikController::class, 'store'])->name('subkategori-statistik.store');
    Route::get('/admin/subkategori-statistik/edit/{id}', [SubkategoriStatistikController::class, 'edit'])->name('subkategori-statistik.edit');
    Route::put('/admin/subkategori-statistik/update/{id}', [SubkategoriStatistikController::class, 'update'])->name('subkategori-statistik.update');
    Route::delete('/admin/subkategori-statistik/hapus/{id}', [SubkategoriStatistikController::class, 'destroy'])->name('subkategori-statistik.destroy');
    Route::get('/admin/subkategori-statistik/{id}/detail', [SubkategoriStatistikController::class, 'show'])->name('subkategori-statistik.show');

    // Data Statistik
    Route::get('/admin/data-statistik', [DataStatistikController::class, 'index'])->name('data-statistik.index');
    Route::get('/admin/data-statistik/tambah', [DataStatistikController::class, 'create'])->name('data-statistik.create');
    Route::post('/admin/data-statistik/store', [DataStatistikController::class, 'store'])->name('data-statistik.store');
    Route::get('/admin/data-statistik/edit/{id}', [DataStatistikController::class, 'edit'])->name('data-statistik.edit');
    Route::put('/admin/data-statistik/update/{id}', [DataStatistikController::class, 'update'])->name('data-statistik.update');
    Route::delete('/admin/data-statistik/hapus/{id}', [DataStatistikController::class, 'destroy'])->name('data-statistik.destroy');
    Route::post('/admin/data-statistik/store', [DataStatistikController::class, 'store'])->name('data-statistik.store');

    // Jenis PPID
    Route::get('/admin/jenis-ppid', [JenisPPIDController::class, 'index'])->name('jenis-ppid.index');
    Route::get('/admin/jenis-ppid/tambah', [JenisPPIDController::class, 'create'])->name('jenis-ppid.create');
    Route::post('/admin/jenis-ppid/store', [JenisPPIDController::class, 'store'])->name('jenis-ppid.store');
    Route::get('/admin/jenis-ppid/edit/{id}', [JenisPPIDController::class, 'edit'])->name('jenis-ppid.edit');
    Route::put('/admin/jenis-ppid/update/{id}', [JenisPPIDController::class, 'update'])->name('jenis-ppid.update');
    Route::delete('/admin/jenis-ppid/hapus/{id}', [JenisPPIDController::class, 'destroy'])->name('jenis-ppid.destroy');

    // Judul PPID
    Route::get('/admin/judul-ppid/{id_jenis_ppid}', [JudulPPIDController::class, 'index'])
     ->name('judul-ppid.index');
    Route::get('/admin/judul-ppid/tambah/{id_jenis_ppid}', [JudulPPIDController::class, 'create'])
        ->name('judul-ppid.create');
    Route::post('/admin/judul-ppid/store', [JudulPPIDController::class, 'store'])
        ->name('judul-ppid.store');
    Route::get('/admin/judul-ppid/edit/{id}', [JudulPPIDController::class, 'edit'])
    ->name('judul-ppid.edit');
    Route::put('/admin/judul-ppid/update/{id}', [JudulPPIDController::class, 'update'])
        ->name('judul-ppid.update');
    Route::delete('/admin/judul-ppid/hapus/{id}', [JudulPPIDController::class, 'destroy'])
    ->name('judul-ppid.destroy');

    // Dokumen PPID (per judul)
    Route::get('/admin/ppid/{id_judul}', [PPIDController::class, 'index'])->name('ppid.index');
    Route::get('/admin/ppid/tambah/{id_judul}', [PPIDController::class, 'create'])->name('ppid.create');
    Route::post('/admin/ppid/store', [PPIDController::class, 'store'])->name('ppid.store');
    Route::get('/admin/ppid/edit/{id_ppid}', [PPIDController::class, 'edit'])->name('ppid.edit');
    Route::put('/admin/ppid/update/{id_ppid}', [PPIDController::class, 'update'])->name('ppid.update');
    Route::delete('/admin/ppid/hapus/{id_ppid}', [PPIDController::class, 'destroy'])
        ->name('ppid.destroy');

    Route::prefix('admin')->group(function () {

        // RW
        Route::get('/rw', [RwController::class, 'index'])->name('rw.index');
        Route::get('/rw/tambah', [RwController::class, 'create'])->name('rw.create');
        Route::post('/rw', [RwController::class, 'store'])->name('rw.store');
        Route::get('/rw/{id_rw}/edit', [RwController::class, 'edit'])->name('rw.edit');
        Route::put('/rw/{id_rw}', [RwController::class, 'update'])->name('rw.update');
        Route::delete('/rw/{id_rw}', [RwController::class, 'destroy'])->name('rw.destroy');
        Route::get('/rw/{id_rw}', [RwController::class, 'show'])->name('rw.show');

        // RT (nested dalam RW)
        Route::prefix('rw/{id_rw}/rt')->group(function () {
        Route::get('/', [RtController::class, 'index'])->name('rt.index');
        Route::get('/tambah', [RtController::class, 'create'])->name('rt.create');
        Route::post('/store', [RtController::class, 'store'])->name('rt.store');
        Route::get('/{id_rt}/edit', [RtController::class, 'edit'])->name('rt.edit');
        Route::put('/{id_rt}/update', [RtController::class, 'update'])->name('rt.update');
        Route::delete('/{id_rt}/hapus', [RtController::class, 'destroy'])->name('rt.destroy');
        });
    });
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

// menu
Route::get('/profil', [PageController::class, 'index'])->name('profil_desa');
Route::get('/profil/tambah', [PageController::class, 'create'])->name('profil.tambah');
Route::post('/profil', [PageController::class, 'store'])->name('profil.store');
Route::get('/profil/edit/{id}', [PageController::class, 'edit'])->name('profil.edit');
Route::put('/profil/update/{id}', [PageController::class, 'update'])->name('profil.update');
Route::delete('/profil/hapus/{id}', [PageController::class, 'destroy'])->name('profil.hapus');

// Navbar & menu user
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