<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;
use App\Models\Menu;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 🔐 Tampilkan halaman login
    public function showLogin()
    {
        if (Auth::check()) {
            $role = strtolower(Auth::user()->peran);
            if ($role === 'superadmin') {
                return redirect()->route('addAdmin');
            } elseif ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        return view('login');
    }

    // 🔑 Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'kata_sandi' => 'required',
        ]);

        $pengguna = Pengguna::where('email', $request->email)->first();

        if (!$pengguna) {
            return back()->withErrors(['email' => 'Akun tidak ditemukan.']);
        }

        if ($pengguna->status !== 'Aktif') {
            return back()->withErrors(['email' => 'Akun Anda tidak aktif.']);
        }

        if (!Hash::check($request->kata_sandi, $pengguna->kata_sandi)) {
            return back()->withErrors(['email' => 'Kata sandi salah.']);
        }

        Auth::login($pengguna);

        $role = strtolower($pengguna->peran);

        if ($role === 'superadmin') {
            return redirect()->route('addAdmin');
        } elseif ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        Auth::logout();
        return back()->withErrors(['email' => 'Akun tidak memiliki akses.']);
    }

    // 🚪 Logout
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }

    // 📊 Dashboard Admin (Revisi: kirim $menus)
    public function dashboard()
    {
        $menus = Menu::all()->groupBy('url');
        return view('admin.dashboard', compact('menus'));
    }

    // 👤 Halaman Tambah Admin (khusus superadmin)
    public function addAdmin()
    {
        $admins = Pengguna::where('peran', 'admin')->get();
        return view('superadmin.addAdmin', compact('admins'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required|string|max:45',
            'email' => 'required|email|unique:pengguna,email',
            'kata_sandi' => 'required|string|min:6',
        ]);

        Pengguna::create([
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'kata_sandi' => Hash::make($request->kata_sandi),
            'peran' => 'admin',
            'status' => 'Aktif',
        ]);

        return redirect()->back()->with('success', 'Admin berhasil ditambahkan!');
    }

    public function toggleAdmin($id_pengguna)
    {
        $admin = Pengguna::findOrFail($id_pengguna);

        if (strtolower($admin->peran) !== 'admin') {
            return redirect()->back()->with('error', 'Hanya admin yang dapat diubah statusnya.');
        }

        $admin->status = $admin->status === 'Aktif' ? 'Tidak Aktif' : 'Aktif';
        $admin->save();

        return redirect()->back()->with('success', 'Status admin berhasil diubah.');
    }

    public function toggleAdminAjax($id_pengguna)
    {
        $admin = Pengguna::findOrFail($id_pengguna);

        if (strtolower($admin->peran) !== 'admin') {
            return response()->json(['error' => 'Hanya admin yang dapat diubah statusnya.'], 403);
        }

        $admin->status = $admin->status === 'Aktif' ? 'Tidak Aktif' : 'Aktif';
        $admin->save();

        return response()->json(['success' => true, 'status' => $admin->status]);
    }

    public function showProfil()
    {
        $admin = Auth::user();

        if (!$admin) {
            return redirect()->route('login')->withErrors('Silakan login terlebih dahulu.');
        }

        return view('admin.profil', compact('admin'));
    }

    public function editProfil()
    {
        $admin = Auth::user();
        return view('admin.editProfil', compact('admin'));
    }

    public function updateProfil(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'nama_pengguna' => 'required|string|max:45',
            'email' => 'required|email|unique:pengguna,email,' . $admin->id_pengguna . ',id_pengguna',
            'kata_sandi' => 'nullable|string|min:6',
        ]);

        $admin->nama_pengguna = $request->nama_pengguna;
        $admin->email = $request->email;

        if ($request->filled('kata_sandi')) {
            $admin->kata_sandi = Hash::make($request->kata_sandi);
        }

        $admin->save();

        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui!');
    }
}
