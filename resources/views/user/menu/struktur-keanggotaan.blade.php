@extends('layouts.user')

@section('title', 'Visi Misi')

@section('content')
<div class="container">
  <section class="container">
    <div class="text-center mb-4">
      <div class="p-3" style="background-color:#014421; color:white; font-weight:bold; border-radius:5px;">
        STRUKTUR KEANGGOTAAN DAN PROFIL PEJABAT
      </div>
    </div>
  </section>

  <!-- Section Profil Pejabat -->
  @foreach($submenus as $submenu)
  <section class="container mb-5">
    <div class="card shadow-sm">

      {{-- Judul Section --}}
      <div class="card-header text-danger fw-bold" style="font-size: 0.9rem;">
        {{ strtoupper($submenu->judul) }}
      </div>

      <div class="card-body d-flex flex-wrap">

        {{-- Foto --}}
        <div class="me-4 mb-3"
             style="flex: 0 0 200px; background:#f0f0f0; display:flex; align-items:center; justify-content:center;">
          <img src="{{ asset('ufiles/' . $submenu->foto) }}"
               alt="{{ $submenu->judul }}"
               style="max-width:200px;">
        </div>

        {{-- Isi / Deskripsi --}}
        <div style="flex: 1;">
          <h5 class="fw-bold">{{ $submenu->judul }}</h5>
          <p>{!! $submenu->isi !!}</p>
        </div>

      </div>
    </div>
  </section>
  @endforeach
</div>
@endsection