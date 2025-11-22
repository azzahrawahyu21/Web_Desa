@extends('layouts.user')

@section('title', 'Profil Desa')

@section('content')
<div class="container">
  <!-- Judul -->
  @foreach($submenus as $submenu)
  <div class="text-center mb-5">
    <h4 class="fw-bold text-white py-2 px-4" style="background-color: #014421; border-radius: 4px; display: inline-block; width: 100%;">
    {{ $submenu->judul }}
    </h4>
  </div>

  <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
      <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold">{{ $submenu->judul }}</h3>
        <p class="text-gray-600 mt-2">{!! $submenu->isi !!}</p>
      </div>
    @endforeach
  </div>
</div>
@endsection
