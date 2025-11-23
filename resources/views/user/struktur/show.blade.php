@extends('layouts.user')

@section('title', $jabatan->nama_jabatan)

@section('content')
<div class="container py-5">

    {{-- Judul --}}
    <h2 class="text-center text-success mb-4">
        {{ $jabatan->nama_jabatan }}
    </h2>

    <div class="row">

        @forelse($pejabat as $item)
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">

                    {{-- Foto pejabat --}}
                    @if($item->foto)
                        <img src="{{ asset($item->foto) }}" class="card-img-top" alt="">
                    @else
                        <img src="{{ asset('img/default.jpg') }}" class="card-img-top" alt="">
                    @endif

                    <div class="card-body text-center">

                        <h5 class="card-title">{{ $item->nama }}</h5>

                        {{-- NIP opsional --}}
                        @if($item->nip)
                            <p class="mb-1">NIP: {{ $item->nip }}</p>
                        @endif

                        {{-- Tombol jika ingin detail --}}
                        {{-- <a href="{{ route('pejabat.detail', $item->id_pejabat) }}" 
                           class="btn btn-sm btn-success mt-2">
                            Lihat Selengkapnya
                        </a> --}}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada pejabat pada jabatan ini.</p>
        @endforelse

    </div>

</div>
@endsection
