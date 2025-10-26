@extends('layouts.admin')

@section('title', 'Edit Data Statistik')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
  <h2 class="text-[#0D4715] text-2xl font-bold mb-4">
    Edit Data Statistik untuk {{ $data->subkategoriStatistik->nama_subkategori ?? '-' }}
  </h2>
  <p><strong>Kategori:</strong> {{ $data->subkategoriStatistik->kategori->nama_kategori ?? '-' }}</p>

  {{-- Form Edit Data Statistik --}}
  <form action="{{ route('data-statistik.update', $data->id_data) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" name="id_subkategori" value="{{ $data->id_subkategori }}">

    <div class="row g-3 align-items-end">
      <div class="col-md-4">
        <label for="tahun" class="form-label fw-semibold">Tahun</label>
        <input type="number" name="tahun" id="tahun" class="form-control" value="{{ \Carbon\Carbon::parse($data->tahun)->format('Y') }}" required>
      </div>
      <div class="col-md-4">
        <label for="jumlah" class="form-label fw-semibold">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $data->jumlah }}" required>
      </div>
      <div class="col-md-4">
        <button type="submit" class="btn btn-success mt-3 w-100">
          <i class="bi bi-save"></i> Simpan Perubahan
        </button>
      </div>
    </div>
  </form>

  {{-- Tombol kembali --}}
  <div class="mt-3">
    <a href="{{ route('subkategori-statistik.show', $data->id_subkategori) }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali ke Detail Subkategori
    </a>
  </div>
</div>
@endsection
