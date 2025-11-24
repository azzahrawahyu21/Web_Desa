<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\KategoriStatistik;
use App\Models\JenisPPID;
use App\Models\Rw;
use App\Models\Jabatan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['user.*', 'user.submenu.*', 'layouts.user', 'user.navbar'], function ($view) {
            $menus = Menu::with('submenus')->get()->groupBy('url');
            $kategoris = KategoriStatistik::all();
            $jabatans = Jabatan::all();
            $jenisPpids = JenisPPID::all();
            $view->with(compact('menus', 'kategoris', 'jabatans', 'jenisPpids'));
        });

        // Untuk sidebar admin
        View::composer('admin.sidebar', function ($view) {
            $menus = Menu::with('submenus')
                        ->orderBy('id_menu', 'asc')
                        ->get();
            $kategoris = KategoriStatistik::all();
            $jenisPpids = JenisPPID::all();
            $rws = Rw::all();
            $jabatans = Jabatan::all();
            $view->with(compact('menus', 'kategoris', 'jenisPpids','rws','jabatans'));
        });    
    }
}