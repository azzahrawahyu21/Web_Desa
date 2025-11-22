<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class UserController extends Controller
{
    public function index()
    {
        // Kelompokkan berdasarkan kolom 'url' (karena itu enum kategori)
        $menus = Menu::all()->groupBy('url');
        return view('user.navbar');
    }
}
