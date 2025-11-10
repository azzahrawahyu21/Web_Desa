@extends('layouts.admin')

@section('title', 'Tambah RW')

@section('content')
<div class="container mt-5">
  <h3 class="text-[#0D4715] fw-bold mb-4">Tambah RW</h3>
  <div class="card p-4 shadow-sm">
    <form action="{{ route('rw.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="no_rw" class="form-label">Nomor RW</label>
        <input type="text" name="no_rw" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="nama_rw" class="form-label">Nama RW</label>
        <input type="text" name="nama_rw" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('rw.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
