@extends('layouts.admin')

@section('title', 'Tambah Subkategori Statistik')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">

  {{-- Breadcrumb --}}
  <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
    <div>
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="{{ route('subkategori-statistik.index') }}" class="text-[#0D4715] fw-semibold text-decoration-none">
            <i class="bi bi-arrow-left-circle me-1"></i> Daftar Subkategori Statistik
          </a>
        </li>
        <li class="breadcrumb-item active text-muted" aria-current="page">Tambah Subkategori</li>
      </ol>
    </div>
  </div>

  {{-- Judul --}}
<h2 class="text-[#0D4715] text-center text-2xl font-bold mb-4">
  Tambah Subkategori
</h2>

  {{-- Pesan sukses/error --}}
  @if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
  @elseif(session('error'))
    <div class="alert alert-danger text-center">{{ session('error') }}</div>
  @endif

  {{-- Form Tambah Subkategori Statistik --}}
<form action="{{ route('subkategori-statistik.store') }}" method="POST">
  @csrf
  <input type="hidden" name="id_kategori" value="{{ $id_kategori }}">

  <div class="mb-3">
    <label for="nama_subkategori" class="form-label fw-semibold">Nama Subkategori Statistik</label>
    <input type="text" name="nama_subkategori" id="nama_subkategori" class="form-control w-100" placeholder="Masukkan nama subkategori statistik" value="{{ old('nama_subkategori') }}" required>
    @error('nama_subkategori')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <div class="text-end mt-4">
    <button type="submit" class="btn btn-success px-4">
      <i class="bi bi-save me-1"></i> Simpan Subkategori
    </button>
    <a href="{{ route('subkategori-statistik.index', ['id_kategori' => $id_kategori]) }}" class="btn btn-secondary px-4 ms-2">
      <i class="bi bi-x-circle me-1"></i> Batal
    </a>
  </div>
</form>

</div>
@endsection
