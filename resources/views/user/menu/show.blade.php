@extends('layouts.user')

@section('title', $menu->nama_menu)

@section('content')
<div class="container py-5">
  <h2 class="text-center text-success mb-4">{{ $menu->nama_menu }}</h2>

  <div class="row">
    @forelse($submenus as $submenu)
      <div class="col-md-4 mb-3">
        <div class="card h-100 shadow-sm">
          @if($submenu->foto)
            <img src="{{ asset($submenu->foto) }}" class="card-img-top" alt="">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $submenu->judul }}</h5>
            <a href="{{ route('user.submenu.show', [
                'kategori' => $menu->url,
                'menu' => Str::slug($menu->nama_menu),
                'slug' => Str::slug($submenu->judul)
            ]) }}" class="btn btn-sm btn-success">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>
    @empty
      <p class="text-center">Belum ada submenu untuk menu ini.</p>
    @endforelse
  </div>
</div>
@endsection
