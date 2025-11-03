@extends('layouts.admin')

@section('title', 'Edit RT')

@section('content')
<div class="container mt-5">
  <h3 class="text-[#0D4715] fw-bold mb-4">Edit RT - RW {{ $rw->no_rw }}</h3>
  <div class="card p-4 shadow-sm">
    <form action="{{ route('rt.update', ['id_rw' => $rw->id_rw, 'id_rt' => $rt->id_rt]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="no_rt" class="form-label">Nomor RT</label>
        <input type="text" name="no_rt" value="{{ old('no_rt', $rt->no_rt) }}" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="nama_rt" class="form-label">Nama RT</label>
        <input type="text" name="nama_rt" value="{{ old('nama_rt', $rt->nama_rt) }}" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
      <a href="{{ route('rw.show', $rw->id_rw) }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
