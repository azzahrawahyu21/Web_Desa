@extends('layouts.admin')

@section('title', 'Tambah Submenu')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">

  {{-- Breadcrumb --}}
  <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
    <div>
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="{{ route('submenu.kelola', $menu->id_menu) }}" class="text-[#0D4715] fw-semibold text-decoration-none">
            <i class="bi bi-arrow-left-circle me-1"></i> Kelola Submenu - {{ $menu->nama_menu }}
          </a>
        </li>
        <li class="breadcrumb-item active text-muted" aria-current="page">Tambah Submenu</li>
      </ol>
    </div>
  </div>

  {{-- Judul --}}
  <h2 class="text-[#0D4715] text-center text-2xl font-bold mb-4">
    Tambah Submenu untuk {{ $menu->nama_menu }}
  </h2>

  {{-- Alert sukses --}}
  @if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
  @endif

  {{-- Form Tambah Submenu --}}
  <form action="{{ route('submenu.store', $menu->id_menu) }}" method="POST">
    @csrf

    {{-- Input Judul --}}
    <div class="mb-3">
      <label for="judul" class="form-label fw-semibold">Judul</label>
      <input
        type="text"
        name="judul"
        id="judul"
        class="form-control w-100"
        placeholder="Masukkan judul submenu"
        required
      >
    </div>

    {{-- Input Isi --}}
    <div class="mb-3">
      <label for="isi" class="form-label fw-semibold">Isi</label>
      <textarea
        name="isi"
        id="isi"
        rows="5"
        class="form-control w-100"
        placeholder="Tulis isi submenu di sini..."
      ></textarea>
    </div>

    {{-- Input Foto --}}
    <div class="mb-3">
      <label for="foto" class="form-label fw-semibold">File atau Gambar</label>
      <div class="input-group w-100">
        <input type="text" name="foto" id="foto" class="form-control" placeholder="URL file (opsional)">
        <button type="button" class="btn btn-secondary" id="btnBrowse">Pilih dari ElFinder</button>
      </div>
    </div>

    {{-- Tombol Simpan --}}
    <div class="text-end mt-4">
      <button type="submit" class="btn btn-success px-4">
        <i class="bi bi-save me-1"></i> Simpan
      </button>
    </div>
  </form>
</div>

{{-- Script untuk ElFinder --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#btnBrowse').on('click', function() {
    var fm = window.open('/elfinder/popup/foto', 'FileManager', 'width=900,height=600');
    window.SetUrl = function(items) {
      var fileUrl = items.map(function(item) { return item.url; }).join(',');
      $('#foto').val(fileUrl);
    };
  });
</script>
@endsection
