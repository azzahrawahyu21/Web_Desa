<?php

namespace App\Http\Controllers;

use App\Models\Submenu;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;
use App\Models\KategoriStatistik;

class UserSubmenuController extends Controller
{
    // public function showSubmenu($kategori, $menuSlug, $slug)
    // {
    //     $submenu = Submenu::whereRaw('LOWER(REPLACE(judul, " ", "-")) = ?', [$slug])
    //         ->with('menu')
    //         ->firstOrFail();

    //     return view('user.submenu.show', compact('submenu'));
    // }
    public function showSubmenu($kategori, $menuSlug, $slug)
{
    $submenu = Submenu::whereRaw('LOWER(REPLACE(judul, " ", "-")) = ?', [$slug])
        ->with('menu')
        ->firstOrFail();

    $menus = Menu::with('submenus')->get()->groupBy('url');
    $kategoris = KategoriStatistik::all();

    return view('user.submenu.show', compact('submenu', 'menus', 'kategoris'));
}

}
