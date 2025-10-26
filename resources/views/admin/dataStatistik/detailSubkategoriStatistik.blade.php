@extends('layouts.admin')

@section('title', 'Detail Subkategori Statistik')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
  <h2 class="text-[#0D4715] text-2xl font-bold mb-4">
    Detail Subkategori: {{ $subkategori->nama_subkategori }}
  </h2>
  <p><strong>Kategori:</strong> {{ $subkategori->kategori->nama_kategori ?? '-' }}</p>

  {{-- Form Tambah Data Statistik --}}
  <form action="{{ route('data-statistik.store') }}" method="POST" class="mb-4">
    @csrf
    <input type="hidden" name="id_subkategori" value="{{ $subkategori->id_subkategori }}">

    <div class="row g-3 align-items-end">
      <div class="col-md-4">
        <label for="tahun" class="form-label fw-semibold">Tahun</label>
        <input type="number" name="tahun" id="tahun" class="form-control" required>
      </div>
      <div class="col-md-4">
        <label for="jumlah" class="form-label fw-semibold">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" required>
      </div>
      <div class="col-md-4">
        <button type="submit" class="btn btn-success mt-3 w-100">
          <i class="bi bi-plus-circle"></i> Tambah Data
        </button>
      </div>
    </div>
  </form>

  {{-- Daftar Data Statistik --}}
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="text-center" style="background-color: #0D4715; color: white;">
        <tr>
          <th>No</th>
          <th>Tahun</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        @forelse($dataStatistik as $index => $data)
          <tr>
            <td class="text-center">{{ $index + 1 }}</td>
            <td>{{ $data->tahun }}</td>
            <td>{{ $data->jumlah }}</td>
          </tr>
        @empty
          <tr><td colspan="3" class="text-center text-muted">Belum ada data statistik.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
