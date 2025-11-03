<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\KategoriStatistik;
use App\Models\JenisPPID;
use App\Models\Rw;

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
        // Untuk navbar user
        View::composer('user.navbar', function ($view) {
            $menus = Menu::all()->groupBy('url');
            $view->with('menus', $menus);
        });

        // Untuk sidebar admin
        View::composer('admin.sidebar', function ($view) {
            $menus = Menu::all();
            $kategoris = KategoriStatistik::all();
            $jenisPpids = JenisPPID::all();
            $rws = Rw::all();
            $view->with(compact('menus', 'kategoris', 'jenisPpids','rws'));
        });
    }
}
