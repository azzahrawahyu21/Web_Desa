@extends('layouts.user')

@section('title', 'Profil Desa')

@section('content')
<div class="container py-5">
  <h1 class="text-center text-success mb-4 page-title"> <b>Profil Desa</b></h1>
  <hr class="judul-line mb-5">

  <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
    @foreach($submenus as $submenu)
      <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold">{{ $submenu->judul }}</h3>
        <p class="text-gray-600 mt-2">{{ Str::limit(strip_tags($submenu->isi), 100) }}</p>
        <a href="{{ route('user.submenu.show', [
            'kategori' => $menu->url,
            'menu' => Str::slug($menu->nama_menu),
            'submenu' => Str::slug($submenu->judul)
        ]) }}" class="btn btn-sm btn-outline-success mt-3">Lihat Detail</a>
      </div>
    @endforeach
  </div>
</div>
@endsection
