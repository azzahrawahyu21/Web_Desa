@extends('layouts.admin')

@section('title', 'Edit Submenu')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">

  {{-- Breadcrumb --}}
  <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
    <div>
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="{{ route('submenu.index', $menu->id_menu) }}" class="text-[#0D4715] fw-semibold text-decoration-none">
            <i class="bi bi-arrow-left-circle me-1"></i> Kelola Submenu - {{ $menu->nama_menu }}
          </a>
        </li>
        <li class="breadcrumb-item active text-muted" aria-current="page">Edit Submenu</li>
      </ol>
    </div>
  </div>

  {{-- Judul Halaman --}}
  <h2 class="text-[#0D4715] text-center text-2xl font-bold mb-4">Edit Submenu</h2>

  {{-- Pesan Sukses/Error --}}
  @if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
  @elseif(session('error'))
    <div class="alert alert-danger text-center">{{ session('error') }}</div>
  @endif

  {{-- Form Edit Submenu --}}
  <form action="{{ route('submenu.update', [$menu->id_menu, $submenu->id_submenu]) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Input Judul --}}
    <div class="mb-3">
      <label for="judul" class="form-label fw-semibold">Judul</label>
      <input
        type="text"
        name="judul"
        id="judul"
        class="form-control w-100"
        placeholder="Masukkan judul submenu"
        value="{{ old('judul', $submenu->judul) }}"
        required
      >
    </div>

    {{-- Input Isi --}}
    <div class="mb-3">
      <label for="isi" class="form-label fw-semibold">Isi</label>
      <textarea
        name="isi"
        id="isi"
        rows="6"
        class="form-control w-100"
        placeholder="Masukkan isi submenu"
      >{{ old('isi', $submenu->isi) }}</textarea>
    </div>

    {{-- Input Foto --}}
    <div class="mb-3">
      <label for="foto" class="form-label fw-semibold">Foto (URL)</label>
      <div class="input-group w-100">
        <input
          type="text"
          name="foto"
          id="foto"
          class="form-control"
          placeholder="Pilih atau masukkan URL foto"
          value="{{ old('foto', $submenu->foto) }}"
        >
        <button type="button" class="btn btn-secondary" id="btnBrowse">
          <i class="bi bi-folder2-open"></i> Pilih File
        </button>
      </div>

      @if($submenu->foto)
        @php
          $fotoUrl = str_replace('127.0.01', '127.0.0.1', $submenu->foto);
          $fotoUrl = str_replace('//files', '/files', $fotoUrl);
          $ext = pathinfo($fotoUrl, PATHINFO_EXTENSION);
        @endphp

        <div class="mt-3">
          @if(in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
            <img src="{{ $fotoUrl }}" alt="Foto Submenu" class="img-fluid rounded border" style="max-height:200px;">
          @elseif(strtolower($ext) === 'pdf')
            <iframe src="{{ $fotoUrl }}" class="w-100 rounded border" style="height:300px;"></iframe>
          @else
            <a href="{{ $fotoUrl }}" target="_blank" class="btn btn-sm btn-outline-secondary">
              <i class="bi bi-file-earmark"></i> Lihat File
            </a>
          @endif
        </div>
      @endif
    </div>

    {{-- Tombol Simpan --}}
    <div class="text-end mt-4">
      <button type="submit" class="btn btn-success px-4">
        <i class="bi bi-save me-1"></i> Simpan Perubahan
      </button>
    </div>
  </form>
</div>

{{-- Script ElFinder --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#btnBrowse').on('click', function() {
    var fm = window.open('/elfinder/popup/foto', 'FileManager', 'width=900,height=600');
    window.SetUrl = function(items) {
      var fileUrl = items.map(item => item.url).join(',');
      $('#foto').val(fileUrl);
    };
  });
</script>
@endsection
