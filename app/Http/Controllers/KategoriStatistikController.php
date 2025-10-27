<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriStatistik;

class KategoriStatistikController extends Controller
{
    // Tampilkan semua kategori statistik
    public function index()
    {
        $kategoris = KategoriStatistik::all();
        return view('admin.dataStatistik.kategoriStatistik', compact('kategoris'));
    }

    // Form tambah kategori
    public function create()
    {
        return view('admin.dataStatistik.tambahDataStatistik');
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:45',
        ]);

        KategoriStatistik::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori-statistik.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Edit kategori
    public function edit($id_kategori)
    {
        $kategori = KategoriStatistik::findOrFail($id_kategori);
        return view('admin.dataStatistik.editDataStatistik', compact('kategori'));
    }

    // Update kategori
    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:45',
        ]);

        $kategori = KategoriStatistik::findOrFail($id_kategori);
        $kategori->update($request->only(['nama_kategori']));

        return redirect()->route('kategori-statistik.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Hapus kategori
    public function destroy($id_kategori)
    {
        $kategori = KategoriStatistik::findOrFail($id_kategori);
        $kategori->delete();

        return redirect()->route('kategori-statistik.index')->with('success', 'Kategori berhasil dihapus!');
    }

    public function show($id_kategori)
    {
        $kategori = KategoriStatistik::with('subkategoris')->findOrFail($id_kategori);
        return view('admin.dataStatistik.detailKategoriStatistik', compact('kategori'));
    }
}