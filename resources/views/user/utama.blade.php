<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard Desa Driyorejoj</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  {{-- Navbar --}}
  @include('user.navbar')

  {{-- Header --}}
<header class="header-2 position-relative">
  <div class="page-header min-vh-100 d-flex align-items-center justify-content-center text-center text-white"
       style="background-image: url('{{ asset('assets/img/background.jpg') }}');
              background-size: cover; background-position: center;">
    <!-- Overlay -->
    <div style="background: rgba(0,0,0,0.5); position:absolute; top:0; right:0; bottom:0; left:0;"></div>

    <!-- Teks -->
    <div class="container position-relative">
      <h1 class="fw-bold">Selamat Datang di Website Resmi Desa Driyorejo</h1>
        <p style="font-size: 25px">Sumber informasi terbuka, pelayanan mudah, dan desa maju bersama.</p>
    </div>
  </div>
</header>

  {{-- Content --}}
<main class="position-relative mb-5">
  <div class="container" style="margin-top:-250px; z-index:5; position:relative;">
    <div class="card p-4 bg-transparent text-center"
         style="border-radius:20px;
                background: linear-gradient(to bottom, rgba(13, 71, 21, 0.7), rgba(255, 255, 255, 0.9));
                box-shadow: 0 4px 15px rgba(13, 71, 21, 0.5);">

      <div class="row">
        <!-- Jumlah Penduduk -->
        <div class="col-md-4 mb-3 mb-md-0">
          <h3 class="fw-bold">3.100</h3>
          <p class="mb-0">Jumlah Penduduk</p>
          <small>Total warga yang tinggal dan terdata di Desa</small>
        </div>

        <!-- Jumlah KK -->
        <div class="col-md-4 mb-3 mb-md-0">
          <h3 class="fw-bold">130</h3>
          <p class="mb-0">Jumlah KK</p>
          <small>Total kepala keluarga sebagai dasar kependudukan</small>
        </div>

        <!-- Jumlah UMKM -->
        <div class="col-md-4">
          <h3 class="fw-bold">75</h3>
          <p class="mb-0">Jumlah UMKM</p>
          <small>Jumlah UMKM yang beroperasi di Desa Driyorejo</small>
        </div>
      </div>
    </div>
  </div>
</main>

  {{-- Footer --}}
  <footer class="bg-light py-5 border-top">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6 class="fw-bold">Pemerintahan Desa Driyorejo</h6>
          <p>Driyorejo, Nguntoronadi, Driyan, Driyorejo, Magetan, Kabupaten Magetan, Jawa Timur 63383</p>
        </div>
        <div class="col-md-3">
          <h6 class="fw-bold">Hubungi Kami</h6>
          <p>0850000000<br>driyorejo@gmail.com</p>
        </div>
        <div class="col-md-3">
          <h6 class="fw-bold">Jelajahi</h6>
          <ul class="list-unstyled">
            <li><a href="#">Lembaga</a></li>
            <li><a href="#">Struktur Keanggotaan</a></li>
            <li><a href="#">Berita</a></li>
            <li><a href="#">UMKM</a></li>
            <li><a href="#">Data Statistik</a></li>
            <li><a href="#">Galeri</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6 class="fw-bold">Lokasi</h6>
          <img src="{{ asset('assets/img/lembaga/map.png') }}" class="img-fluid" alt="Peta Lokasi">
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>