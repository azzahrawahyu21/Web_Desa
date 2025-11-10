@extends('layouts.user')

@section('title', 'Sejarah Desa')

@section('content')
<div class="container py-5 bg-gray-100">
  <h2 class="text-center text-primary mb-4">Sejarah Desa Driyorejo</h2>

  <div class="row">
    @foreach($submenus as $submenu)
      <div class="col-md-6 mb-4">
        <div class="card border-0 shadow">
          @if($submenu->foto)
            <img src="{{ asset($submenu->foto) }}" class="card-img-top">
          @endif
          <div class="card-body">
            <h5 class="card-title text-success">{{ $submenu->judul }}</h5>
            <p class="card-text text-muted">{{ Str::limit(strip_tags($submenu->isi), 120) }}</p>
<a href="{{ route('user.submenu.show', [
    'kategori' => $menu->url,
    'menu' => Str::slug($menu->nama_menu),
    'submenu' => Str::slug($submenu->judul)
]) }}" class="btn btn-sm btn-outline-success mt-3">Lihat Detail</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
