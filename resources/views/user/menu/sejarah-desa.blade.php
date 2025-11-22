@extends('layouts.user')

@section('title', 'Sejarah Desa')

@section('content')
<div class="container">
  <!-- Judul -->
  <div class="text-center mb-3">
    <h4 class="fw-bold text-white py-2 px-4" style="background-color: #014421; border-radius: 4px; display: inline-block; width: 100%;">
      Sejarah Desa
    </h4>
  </div>

  <!-- Konten Sejarah Desa -->
  @foreach($submenus as $submenu)
  <div class="border border-success rounded-bottom p-4 bg-white box-shadow: 0 4px 15px rgba(13, 71, 21, 0.5);">
      <h4 class="fw-bold mb-1">{{ $submenu->judul }}</h4>
      <div style="width: 90px; height: 4px; background-color: #e67e22; margin-bottom: 25px;"></div>

      <div class="row align-items-center">
          <!-- Gambar kiri -->
          <div class="col-md-5 mb-3 mb-md-0">
            {{-- Foto --}}
            <img src="{{ asset('ufiles/' . $submenu->foto) }}"
            alt="{{ $submenu->judul }}" class="img-fluid rounded-3 shadow-sm" style="width: 100%; height: auto;">
          </div>

          <!-- Teks kanan -->
          <div class="col-md-7">
              <div class="bg-white border border-success-subtle rounded-4 shadow-sm p-4">
                <p class="text-justify mb-2">
                    {!! $submenu->isi !!}
                </p>
              </div>
          </div>
      </div>
  </div>
  @endforeach
</div>
@endsection
