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

        // Cek apakah email terdaftar
        $pengguna = \App\Models\Pengguna::where('email', $request->email)->first();

        if (!$pengguna) {
            return back()->withErrors(['email' => 'Akun tidak ditemukan.']);
        }

        // Cek status aktif
        if ($pengguna->status !== 'Aktif') {
            return back()->withErrors(['email' => 'Akun Anda tidak aktif.']);
        }

        // Cek kecocokan password
        if (!\Illuminate\Support\Facades\Hash::check($request->kata_sandi, $pengguna->kata_sandi)) {
            return back()->withErrors(['email' => 'Kata sandi salah.']);
        }

        // Login dan redirect sesuai peran
        \Illuminate\Support\Facades\Auth::login($pengguna);

        $role = strtolower($pengguna->peran); // ubah semua jadi lowercase

        if ($role === 'superadmin') {
            return redirect()->route('addAdmin');
        } elseif ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Jika peran bukan admin/superadmin
        return back()->withErrors(['email' => 'Akun tidak ditemukan, tidak aktif, atau tidak memiliki akses.']);
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
        // return view('superadmin.addAdmin');
        $admins = Pengguna::where('peran', 'admin')->get();
        return view('superadmin.addAdmin', compact('admins'));
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

    public function toggleAdmin($id_pengguna)
    {
        $admin = Pengguna::findOrFail($id_pengguna);

        // Pastikan hanya admin yang dapat diubah statusnya
        if ($admin->peran !== 'Admin') {
            return redirect()->back()->with('error', 'Hanya admin yang dapat diubah statusnya.');
        }

        // Toggle status
        $admin->status = $admin->status === 'aktif' ? 'nonaktif' : 'aktif';
        $admin->save();

        return redirect()->back()->with('success', 'Status admin berhasil diubah.');
    }
    public function toggleAdminAjax($id_pengguna)
    {
        $admin = Pengguna::findOrFail($id_pengguna);

        // if ($admin->peran !== 'Admin') {
        if (strtolower($admin->peran) !== 'admin') {
            return response()->json(['error' => 'Hanya admin yang dapat diubah statusnya.'], 403);
        }

        // Ubah status
        $admin->status = $admin->status === 'Aktif' ? 'Tidak Aktif' : 'Aktif';
        $admin->save();

        return response()->json([
            'success' => true,
            'status' => $admin->status
        ]);
    }
}
