@extends('layouts.admin')

@section('title', 'Edit RW')

@section('content')
<div class="container mt-5">
  <h3 class="text-[#0D4715] fw-bold mb-4">Edit RW</h3>
  <div class="card p-4 shadow-sm">
    <form action="{{ route('rw.update', $rw->id_rw) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="no_rw" class="form-label">Nomor RW</label>
        <input type="text" name="no_rw" class="form-control" value="{{ $rw->no_rw }}" required>
      </div>
      <div class="mb-3">
        <label for="nama_rw" class="form-label">Nama RW</label>
        <input type="text" name="nama_rw" class="form-control" value="{{ $rw->nama_rw }}" required>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
      <a href="{{ route('rw.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
@endsection
