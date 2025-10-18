<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.dashboard', compact('menus'));
    }

    public function create()
    {
        return view('admin.tambahMenu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:45',
            'url' => 'nullable|string|max:45',
        ]);

        Menu::create($request->only(['nama_menu', 'url']));

        return redirect()->route('admin.dashboard')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function dashboard()
    {
        $menus = Menu::all(); // Ambil semua menu dari database
        return view('dashboard', compact('menus'));
    }
}