@extends('layouts.user')
@section('title', $jenis->nama_jenis_ppid . ' - PPID')

@section('content')
<div class="container">
    <!-- Judul -->
    <div class="text-center mb-3">
        <h4 class="fw-bold text-white py-2 px-4" style="background-color: #014421; border-radius: 4px; display: inline-block; width: 100%;">
        {{ $jenis->nama_jenis_ppid }}
        </h4>
    </div>

    <div class="card shadow-sm p-4" style="border-radius:20px; border:1px solid #cfe5d1;">

        <!-- Tombol Kembali -->
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('user.ppid.index') }}" class="btn btn-outline-success">
                ← Kembali
            </a>
        </div>

        @forelse($jenis->juduls as $judul)
        <div class="mb-5">

            <!-- Judul Tabel -->
            <h5 class="fw-bold text-center py-2 mb-3"
                style="color:#014421">
                {{ strtoupper($judul->judul) }}
            </h5>

            @if($judul->dokumens->count() > 0)

            <!-- Table -->
            <div class="table-responsive mb-4">
                <table class="table"
                   style="border:1px solid #D9D9D9; border-radius:10px;">
                    <thead>
                        <tr style="text-align:center;">
                            <th style="width:50px; background:#689875; color:black;">NO</th>
                            <th style="width:300px; background:#689875; color:black;">TANGGAL</th>
                            <th style="background:#689875; color:black;">TENTANG</th>
                            <th style="width:200px; background:#689875; color:black;">FILE</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($judul->dokumens->sortByDesc('tanggal') as $dokumen)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($dokumen->tanggal)->format('d F Y') }}
                            </td>

                            <td>{{ $dokumen->tentang }}</td>

                            <td class="text-center">
                                <a href="{{ $dokumen->file }}" target="_blank" class="text-danger fw-semibold"
                                style="text-decoration:none;">
                                    <i class="bi bi-eye"></i> Lihat File
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            @else
            <p class="text-muted text-center">Belum ada dokumen untuk judul ini.</p>
            @endif

        </div>
        @empty
        <p class="text-center text-muted">Belum ada judul informasi untuk jenis ini.</p>
        @endforelse

    </div>
</div>
@endsection