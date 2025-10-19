<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Support\Facades\Auth;

class SubmenuController extends Controller
{
    public function index($id_menu)
    {
        $menu = Menu::findOrFail($id_menu);
        $submenus = Submenu::where('id_menu', $id_menu)->get();
        return view('admin.submenu', compact('menu', 'submenus'));
    }

    public function store(Request $request, $id_menu)
    {
        $request->validate([
            'judul' => 'required|string|max:45',
            'isi'   => 'nullable|string',
            'foto'  => 'nullable|string|max:255',
        ]);

        // Ambil pengguna yang sedang login
        $pengguna = Auth::user();

        if (!$pengguna) {
            return redirect()->back()->withErrors(['auth' => 'Anda harus login terlebih dahulu.']);
        }

        $fotoUrl = $request->input('foto') ?: null;

        Submenu::create([
            'judul'       => $request->judul,
            'isi'         => $request->isi,
            'foto'        => $fotoUrl, // ini nanti hasil URL dari ElFinder
            'id_menu'     => $id_menu,
            'id_pengguna' => $pengguna->id_pengguna,
        ]);

        return redirect()
            ->route('submenu.index', $id_menu)
            ->with('success', 'Submenu berhasil ditambahkan!');
    }
}
