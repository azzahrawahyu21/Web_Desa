@extends('layouts.user')

@section('title', 'Struktur Organisasi')

@section('content')
<div class="container-fluid px-4">

    <div class="row">

        @foreach($jabatans as $jabatan)

            {{-- Skip jika tidak ada pejabat --}}
            @if($jabatan->pejabat->isEmpty())
                @continue
            @endif

            @foreach($jabatan->pejabat as $p)
            <div class="col-md-6 mb-4"> {{-- 2 card per baris --}}
                <div class="card bg-white shadow rounded-4 p-4 h-100">

                    {{-- Judul Jabatan --}}
                    <div class="card shadow rounded-4 border-0 mb-4" style="background-color: #d1e7dd;">
                        <div class="card-body text-center py-2">
                            <h2 class="fw-bold text-success text-uppercase mb-0">
                                @if($jabatan->tipe == 'multi')
                                    {{ strtoupper($p->subjabatan->nama_sub) }}
                                @else
                                    {{ strtoupper($jabatan->nama_jabatan) }}
                                @endif
                            </h2>
                        </div>
                    </div>

                    <div class="row">

                        {{-- Foto --}}
                        <div class="col-4 text-center">
                            <img src="{{ $p->foto ? asset('ufiles/'.$p->foto) : asset('noimage.png') }}"
                                 class="img-fluid rounded shadow"
                                 style="max-width: 130px;">
                        </div>

                        {{-- Detail --}}
                        <div class="col-8">
                            <h5 class="fw-bold mb-2">{{ $p->nama_pejabat }}</h5>
                            <hr class="my-2">
                            
                            @if($p->deskripsi)
                                <div style="font-size: .9rem;">
                                    {!! $p->deskripsi !!}
                                </div>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
            @endforeach

        @endforeach

    </div>

</div>
@endsection
