<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserMenuController extends Controller
{
public function showMenu($kategori, $menuSlug)
{
    $menu = Menu::where('url', $kategori)
        ->whereRaw('LOWER(REPLACE(nama_menu, " ", "-")) = ?', [$menuSlug])
        ->firstOrFail();

    $submenus = $menu->submenus;

    $menus = Menu::with('submenus')->get()->groupBy('url');
    $kategoris = \App\Models\KategoriStatistik::all();

    $viewName = 'user.menu.' . Str::slug($menu->nama_menu);

    if (view()->exists($viewName)) {
        return view($viewName, compact('menu', 'submenus', 'kategoris'));
    }

    return view('user.menu.show', compact('menu', 'submenus', 'kategoris'));
}

}
