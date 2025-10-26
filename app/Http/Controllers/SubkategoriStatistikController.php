<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubkategoriStatistik;
use App\Models\KategoriStatistik;

class SubkategoriStatistikController extends Controller
{
    // Tampilkan daftar subkategori
    public function index(Request $request)
    {
        $id_kategori = $request->query('id_kategori');

        if ($id_kategori) {
            $subkategoris = SubkategoriStatistik::with('kategori')
                                ->where('id_kategori', $id_kategori)
                                ->get();
            $kategori = KategoriStatistik::find($id_kategori);
        } else {
            $subkategoris = SubkategoriStatistik::with('kategori')->get();
            $kategori = null;
        }

        return view('admin.dataStatistik.subkategoriStatistik', compact('subkategoris', 'id_kategori', 'kategori'));
    }

    // Form tambah subkategori
    public function create(Request $request)
    {
        $id_kategori = $request->query('id_kategori');

        if (!$id_kategori) {
            return redirect()->route('subkategori-statistik.index')
                             ->with('error', 'Pilih kategori terlebih dahulu.');
        }

        $kategori = KategoriStatistik::find($id_kategori);

        return view('admin.dataStatistik.tambahSubkategoriStatistik', compact('id_kategori', 'kategori'));
    }

    // Simpan subkategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_subkategori' => 'required|string|max:45',
            'id_kategori' => 'required|exists:kategori_statistik,id_kategori',
        ]);

        SubkategoriStatistik::create([
            'nama_subkategori' => $request->nama_subkategori,
            'id_kategori' => $request->id_kategori,
        ]);

        return redirect()->route('subkategori-statistik.index', ['id_kategori' => $request->id_kategori])
                         ->with('success', 'Subkategori berhasil ditambahkan!');
    }

    // Edit subkategori
    public function edit($id_subkategori)
    {
        $subkategori = SubkategoriStatistik::findOrFail($id_subkategori);
        return view('admin.dataStatistik.editSubkategoriStatistik', compact('subkategori'));
    }

    // Update subkategori
    public function update(Request $request, $id_subkategori)
    {
        $request->validate([
            'nama_subkategori' => 'required|string|max:45',
        ]);

        $subkategori = SubkategoriStatistik::findOrFail($id_subkategori);
        $subkategori->update(['nama_subkategori' => $request->nama_subkategori]);

        return redirect()->route('subkategori-statistik.index', ['id_kategori' => $subkategori->id_kategori])
                         ->with('success', 'Subkategori berhasil diperbarui!');
    }

    // Hapus subkategori
    public function destroy($id_subkategori)
    {
        $subkategori = SubkategoriStatistik::findOrFail($id_subkategori);
        $id_kategori = $subkategori->id_kategori;
        $subkategori->delete();

        return redirect()->route('subkategori-statistik.index', ['id_kategori' => $id_kategori])
                         ->with('success', 'Subkategori berhasil dihapus!');
    }

    // Detail subkategori
    public function show($id_subkategori)
    {
        $subkategori = SubkategoriStatistik::with('kategori', 'dataStatistik')->findOrFail($id_subkategori);
        return view('admin.dataStatistik.detailSubkategoriStatistik', compact('subkategori'));
    }
}
