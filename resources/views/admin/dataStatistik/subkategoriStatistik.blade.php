@extends('layouts.admin')

@section('title', 'Subkategori Statistik')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-[#0D4715] text-2xl fw-bold">Daftar Subkategori Statistik</h2>
    @if($kategori)
    <a href="{{ route('subkategori-statistik.create') }}?id_kategori={{ $kategori->id_kategori }}" class="btn btn-success">
  <i class="bi bi-plus-circle"></i> Tambah Subkategori
</a>

    @endif
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <table class="table table-striped align-middle">
    <thead class="table-success">
      <tr>
        <th>#</th>
        <th>Nama Subkategori</th>
        <th>Kategori</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($subkategoris as $index => $subkategori)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $subkategori->nama_subkategori }}</td>
        <td>{{ $subkategori->kategori->nama_kategori ?? '-' }}</td>
        <td>
          <a href="{{ route('subkategori-statistik.edit', $subkategori->id_subkategori) }}" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil-square"></i> Edit
          </a>
          <form action="{{ route('subkategori-statistik.destroy', $subkategori->id_subkategori) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
              <i class="bi bi-trash"></i> Hapus
            </button>
          </form>
          <a href="{{ route('subkategori-statistik.show', $subkategori->id_subkategori) }}" class="btn btn-info btn-sm text-white">
            <i class="bi bi-list-ul"></i> Detail
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
