<?php

namespace App\Http\Controllers;

use App\Models\DataStatistik;
use App\Models\SubkategoriStatistik;
use App\Models\KategoriStatistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataStatistikController extends Controller
{
    public function index()
    {
        $dataStatistik = DataStatistik::with('subkategori.kategori', 'user')->get();
        return view('admin.dataStatistik', compact('dataStatistik'));
    }

    public function create()
    {
        $kategori = KategoriStatistik::with('subkategori')->get();
        return view('admin.dataStatistik', compact('kategori'))->with('mode', 'create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'tahun' => 'required|integer',
        'jumlah' => 'required|integer',
        'id_subkategori' => 'required|exists:subkategori_statistik,id_subkategori',
    ]);

    DataStatistik::create([
        'tahun' => $request->tahun,
        'jumlah' => $request->jumlah,
        'id_subkategori' => $request->id_subkategori,
        'id_user' => auth()->id(),
    ]);

    // return back()->with('success', 'Data statistik berhasil ditambahkan!');
return redirect()->route('subkategori-statistik.show', $request->id_subkategori)
                 ->with('success', 'Data statistik berhasil ditambahkan!');

}

    public function edit($id)
    {
        $data = DataStatistik::findOrFail($id);
        $kategori = KategoriStatistik::with('subkategori')->get();
        return view('admin.dataStatistik', compact('data', 'kategori'))->with('mode', 'edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'tahun' => 'required|numeric',
            'id_subkategori' => 'required|exists:subkategori_statistik,id_subkategori',
        ]);

        $data = DataStatistik::findOrFail($id);
        $data->update($request->only('jumlah', 'tahun', 'id_subkategori'));

        return redirect()->route('data.index')->with('success', 'Data statistik berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = DataStatistik::findOrFail($id);
        $data->delete();

        return redirect()->route('data.index')->with('success', 'Data statistik berhasil dihapus!');
    }
}
