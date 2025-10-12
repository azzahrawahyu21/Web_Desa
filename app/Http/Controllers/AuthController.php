<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'kata_sandi' => 'required',
        ]);

        $pengguna = \App\Models\Pengguna::where('email', $request->email)
                    ->where('status','aktif')
                    ->first();

        if ($pengguna && \Illuminate\Support\Facades\Hash::check($request->kata_sandi, $pengguna->kata_sandi)) {
            \Illuminate\Support\Facades\Auth::login($pengguna);

            $role = strtolower($pengguna->peran); // ubah semua jadi lowercase

            if ($role === 'superadmin') {
                return redirect()->route('addAdmin');
            } elseif ($role === 'admin') {
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Dashboard dummy
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function addAdmin()
    {
        return view('superadmin.addAdmin');
    }

    public function storeAdmin(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_pengguna' => 'required|string|max:45',
            'email' => 'required|email|unique:pengguna,email',
            'kata_sandi' => 'required|string|min:6',
        ]);

        // Simpan ke tabel pengguna
        \App\Models\Pengguna::create([
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'kata_sandi' => \Illuminate\Support\Facades\Hash::make($request->kata_sandi),
            'peran' => 'admin',
            'status' => 'aktif',
        ]);

        return redirect()->back()->with('success', 'Admin berhasil ditambahkan!');
    }

}
