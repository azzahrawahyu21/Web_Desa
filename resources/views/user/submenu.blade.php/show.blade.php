@extends('layouts.user')

@section('title', $submenu->judul)

@section('content')
<div class="container py-5">
  <h1 class="text-center mb-4">{{ $submenu->judul }}</h1>
  @if($submenu->foto)
    <div class="text-center mb-4">
      <img src="{{ asset($submenu->foto) }}" class="img-fluid rounded shadow">
    </div>
  @endif
  <div>{!! $submenu->isi !!}</div>
</div>
@endsection
