@extends('layouts.admin')

@section('title', 'Data RW')

@section('content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-[#0D4715] fw-bold">Data RW</h3>
    <a href="{{ route('rw.create') }}" class="btn btn-success">
      <i class="bi bi-plus-circle me-2"></i> Tambah RW
    </a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      @if($rws->isEmpty())
        <p class="text-center text-muted">Belum ada data RW.</p>
      @else
        <table class="table table-bordered">
          <thead class="table-success">
            <tr>
              <th>No</th>
              <th>No RW</th>
              <th>Nama RW</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rws as $index => $rw)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $rw->no_rw }}</td>
                <td>{{ $rw->nama_rw }}</td>
                <td>
                  <a href="{{ route('rw.show', $rw->id_rw) }}" class="btn btn-primary btn-sm">Detail</a>
                  <a href="{{ route('rw.edit', $rw->id_rw) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('rw.destroy', $rw->id_rw) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus RW ini?')">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>
</div>
@endsection
