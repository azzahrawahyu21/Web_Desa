<?php

namespace App\Http\Controllers;

use App\Models\Submenu;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;
use App\Models\KategoriStatistik;
use App\Models\JenisPPID;

class UserSubmenuController extends Controller
{
    public function showSubmenu($kategori, $menuSlug, $slug)
    {
        $submenu = Submenu::whereRaw('LOWER(REPLACE(judul, " ", "-")) = ?', [$slug])
            ->with('menu')
            ->firstOrFail();

        $menus = Menu::with('submenus')->get()->groupBy('url');
        $kategoris = KategoriStatistik::all();
        $jenisPpids = JenisPPID::all();

        return view('user.menu.show', compact('submenu', 'menus', 'kategoris', 'jenisPpids'));
    }

}
