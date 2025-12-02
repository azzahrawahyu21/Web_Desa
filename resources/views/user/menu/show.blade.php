@extends('layouts.user')
@section('title', $menu->nama_menu)

@section('content')
<div class="header-section text-white d-flex flex-column justify-content-center text-center"
    style="height: 20vh; background: url('{{ asset('assets/img/background.jpg') }}') center/cover no-repeat; position: relative;">
    
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.45);"></div>

    <h1 class="fw-bold position-relative" style="z-index: 2; font-size:30px;">
        {{ $menu->nama_menu }}
    </h1>
</div>

{{-- CEK ADA FOTO ATAU TIDAK --}}
@php 
    $adaFoto = $submenus->contains(function($s) {
        return !empty($s->foto) && file_exists(public_path('ufiles/' . $s->foto));
    });
@endphp

@if($adaFoto) 
  <div class="container" style="margin-top: -150px; padding-top: 180px; margin-bottom: 50px;">
      <div class="row justify-content-center">
          <div class="col-lg-11">
              @foreach($submenus as $submenu)
                  <div class="border border-success rounded p-4 bg-white mb-5 shadow"
                        style="box-shadow: 0 4px 20px rgba(13,71,21,0.15);">

                      <h4 class="fw-bold mb-2 text-success">{{ $submenu->judul }}</h4>
                      <div style="width: 90px; height: 4px; background-color: #e67e22; margin-bottom: 25px;"></div>

                      <div class="row align-items-start g-5">
                          @if($submenu->foto && file_exists(public_path('ufiles/' . $submenu->foto)))
                            <div class="col-md-5">
                                <img src="{{ asset('ufiles/' . $submenu->foto) }}"
                                    alt="{{ $submenu->judul }}"
                                    class="img-fluid rounded-3 shadow-sm w-100"
                                    style="max-height: 400px; object-fit: cover;">
                            </div>
                            <div class="col-md-7">
                            <div class="bg-white border border-success-subtle rounded-4 shadow-sm p-4
                                        text-justify text-break
                                        overflow-auto"
                                    style="max-height: 420px; word-wrap: break-word; overflow-wrap: break-word;">
                                {!! $submenu->isi !!}
                            </div>
                            </div>
                          @else
                            <div class="col-12">
                                <div class="bg-white border border-success-subtle rounded-4 shadow-sm p-4 text-center">
                                    {!! $submenu->isi !!}
                                </div>
                            </div>
                          @endif
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  @else
      <div class="text-center">
          <div class="mx-auto" style="max-width: 800px;">
              @foreach($submenus as $submenu)
                  <div class="mb-5">
                      <h3 class="fw-bold text-success" style="margin-top: 20px;">
                          {{ $submenu->judul }}
                      </h3>
                      <hr style="width: 100px; height: 4px; background-color: #e67e22; border: none; margin: 15px auto;">
                      <div class="bg-white border border-success-subtle rounded-4 shadow-sm p-4">
                          {!! $submenu->isi !!}
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  @endif
  </div>
</div>
@endsection