@extends('layouts.user')

@section('title', 'PPID')

@section('content')
<header class="header position-relative">
  <div class="page-header d-flex align-items-center justify-content-center text-center text-white"
       style="background-image: url('{{ asset('assets/img/lembaga/back_bpd.jpg') }}');
              background-size: cover; background-position: center; height: 60vh; position: relative;">
    <!-- Overlay -->
    <div style="background: rgba(0,0,0,0.5); position:absolute; top:0; right:0; bottom:0; left:0;"></div>

    <!-- Teks -->
    <div class="container position-relative">
      <h1 class="fw-bold">LEMBAGA DI DESA DRIYOREJO</h1>
    </div>
  </div>
</header>

<main class="position-relative mb-5">
  <div class="container" style="margin-top:-350px; z-index:5; position:relative;">
    
    <!-- Card Utama -->
    <div class="card p-4 bg-white" 
        style="border-radius:20px; box-shadow: 0 4px 15px rgba(13, 71, 21, 0.5);">
        <h4 class="bg-success text-white text-center py-2 mb-4">
            PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI (PPID)
        </h4>

        <div class="row g-4 justify-content-center">
        @forelse($jenisPpids as $jenis)
            <div class="col-lg-4 col-md-6 col-12">
                <a href="{{ route('user.ppid.show-detail', $jenis->id_jenis_ppid) }}"
                    class="text-decoration-none h-100">
                    <div class="card h-100 text-center border-0 shadow-sm hover-shadow transition-all"
                            style="border-radius: 18px; background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%); 
                                transition: all 0.3s ease; border: 1px solid #d4edda;">
                        <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <h5 class="fw-bold text-success mb-0">
                                {{ $jenis->nama_jenis_ppid }}
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">Belum ada jenis informasi publik yang tersedia.</p>
            </div>
        @endforelse
        </div><br>

        <p><strong>Pejabat Pengelola Informasi dan Dokumentasi (PPID)</strong> adalah pejabat yang bertanggung jawab di bidang 
            penyimpanan, pendokumentasian, penyediaan, dan/atau pelayanan informasi di badan publik.
        </p>

        <h5 class="text-center text-success fw-bold mt-4">DASAR HUKUM PPID</h5>
        <div class="mt-3">
            <strong>UNDANG UNDANG REPUBLIK INDONESIA</strong>
            <ol>
                <li>Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</li>
                <li>Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik.</li>
                <li>Undang-Undang Nomor 6 Tahun 2014 tentang Desa.</li>
            </ol>

            <strong>PERATURAN PEMERINTAH</strong>
            <ol>
                <li>Peraturan Pemerintah Nomor 61 Tahun 2010 Tentang Pelaksanaan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</li>
            </ol>

            <strong>PERATURAN KOMISI INFORMASI</strong>
            <ol>
            <li>Peraturan Komisi Informasi Pusat Republik Indonesia Nomor 1 Tahun 2018 tentang Standar Layanan Informasi Publik Desa.</li>
            <li>Peraturan Komisi Informasi Pusat Republik Indonesia Nomor 1 Tahun 2021 tentang Standar Layanan Informasi Publik.</li>
            </ol>

            <strong>PERATURAN MENTRI DALAM NEGERI</strong>
            <ol>
                <li>Peraturan Pemerintah Nomor 61 Tahun 2010 Tentang Pelaksanaan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</li>
            </ol>
        </div>

      </div>
    </div>
  </div>
</main>
@endsection