<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Desa Driyorejo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  {{-- Navbar --}}
  @include('user.navbar')

  {{-- Header --}}
<header class="header-2 position-relative">
  <div class="page-header d-flex align-items-center justify-content-center text-center text-white"
       style="background-image: url('{{ asset('assets/img/image_desa.jpg') }}');
              background-size: cover; background-position: center; height: 60vh; position: relative;">
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
  <div class="container d-flex justify-content-center" 
       style="margin-top:-100px; z-index:5; position:relative;">
    <div class="card p-4 bg-transparent text-center"
         style="border-radius:20px;
                max-width: 1000px;
                min-height: 200px;
                background: linear-gradient(to bottom, rgba(255, 255, 255, 0.84), rgba(104, 152, 117, 100));
                box-shadow: 0 4px 15px rgba(210, 231, 213, 0.5);">

      <div class="row mt-4">
        <!-- Jumlah Penduduk -->
        <div class="col-md-4 mb-md-0">
          <h3 class="fw-bold">3.100</h3>
          <h5 class="mb-0">Jumlah Penduduk</h5>
          <small>Total warga yang tinggal dan terdata di Desa</small>
        </div>

        <!-- Jumlah KK -->
        <div class="col-md-4 mb-md-0 border-start border-end" style="border-color: black !important;">
          <h3 class="fw-bold">130</h3>
          <h5 class="mb-0">Jumlah KK</h5>
          <small>Total kepala keluarga sebagai dasar kependudukan</small>
        </div>

        <!-- Jumlah UMKM -->
        <div class="col-md-4">
          <h3 class="fw-bold">75</h3>
          <h5 class="mb-0">Jumlah UMKM</h5>
          <small>Jumlah UMKM yang beroperasi di Desa Driyorejo</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Bagian Profil Desa -->
  <div class="container my-5 px-5">
    <div class="row align-items-center">
      
      <!-- Kolom kiri: Profil teks -->
      <div class="col-md-6 mb-4 mb-md-0">
        <h3 class="fw-bold mb-3">
          Profil Desa
          <div style="width: 90px; height: 4px; background-color: #d35400; margin-top: 5px;"></div>
        </h3>

        <div class="mt-4">
          <p><strong>Nama Desa</strong> : Driyorejo</p>
          <p><strong>Luas Wilayah</strong> : ± 248,35 hektar (sekitar 2,4835 km²)</p>
          <p><strong>Letak Geografis</strong> : Terletak di Kecamatan Nguntoronadi, Kabupaten Magetan, Jawa Timur</p>
          <p><strong>Kode Pos</strong> : 63383</p>
          <p><strong>Kecamatan</strong> : Nguntoronadi</p>
          <p><strong>Kabupaten</strong> : Magetan</p>
        </div>
      </div>

      <!-- Kolom kanan: Gambar dengan ornamen -->
      <div class="col-md-6 d-flex justify-content-center">
        <div class="position-relative" style="display: inline-block;">
          <!-- Ornamen kanan atas -->
          <div style="
            position: absolute;
            top: -15px;
            right: -15px;
            width: 120px;
            height: 120px;
            background-color: #e67e22;
            border-radius: 15px;
            z-index: 1;
          "></div>

          <!-- Ornamen kiri bawah -->
          <div style="
            position: absolute;
            bottom: -15px;
            left: -15px;
            width: 120px;
            height: 120px;
            background-color: #e67e22;
            border-radius: 15px;
            z-index: 1;
          "></div>

          <!-- Gambar utama -->
          <img src="assets/img/image_profil_desa.jpg"
              alt="Profil Desa"
              class="img-fluid rounded-4 position-relative"
              style="z-index: 2; width: 100%; max-width: 400px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
        </div>
      </div>
    </div>
  </div>

  <!-- Bagian Jam Kerja & SOTK -->
  <div class="container my-5 px-5">
    <div class="row mt-4">
      <!-- Jam Kerja -->
      <div class="col-md-3 mb-4 mb-md-0">
        <div class="border border-success rounded p-4 text-center h-100">
          <h5 class="fw-bold mb-2">Jam Kerja</h5>
          <div style="width: 90px; height: 4px; background-color: #2A774C; margin: 0 auto 15px auto;"></div>
          <div class="d-flex justify-content-between align-items-center mb-2">
          <span class="badge text-white px-4 py-2" style="background-color: #e67e22;">Senin</span>
          <span class="border border-warning rounded-pill px-3 py-2">08:00 - 13:00</span>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="badge text-white px-4 py-2" style="background-color: #e67e22;">Selasa</span>
            <span class="border border-warning rounded-pill px-3 py-2">08:00 - 13:00</span>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="badge text-white px-4 py-2" style="background-color: #e67e22;">Rabu</span>
            <span class="border border-warning rounded-pill px-3 py-2">08:00 - 13:00</span>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="badge text-white px-4 py-2" style="background-color: #e67e22;">Kamis</span>
            <span class="border border-warning rounded-pill px-3 py-2">08:00 - 13:00</span>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="badge text-white px-4 py-2" style="background-color: #e67e22;">Jumat</span>
            <span class="border border-warning rounded-pill px-3 py-2">08:00 - 11:00</span>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="badge text-white px-4 py-2" style="background-color: #e67e22;">Sabtu</span>
            <span class="border border-warning rounded-pill px-3 py-2">Libur</span>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <span class="badge text-white px-4 py-2" style="background-color: #e67e22;">Minggu</span>
            <span class="border border-warning rounded-pill px-3 py-2">Libur</span>
          </div>
        </div>
      </div>

      <!-- SOTK -->
      <div class="col-md-8">
        <div class="border border-success rounded p-4 text-center h-100">
          <h5 class="fw-bold mb-2">SOTK</h5>
          <div style="width: 90px; height: 4px; background-color: #2A774C; margin: 0 auto 15px auto;"></div>
          <img src="assets/img/sotk.png" alt="Struktur Organisasi" class="img-fluid mb-3">
          <a href="#" class="btn btn-warning text-white" style="background-color: #e67e22; border: none;">
            Baca Selengkapnya
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bagian Berita -->
  <div class="container my-5 px-5">
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
      <h3 class="fw-bold mb-0">Berita</h3>
      <a href="#" class="btn btn-warning text-white fw-semibold px-3 py-1 mt-2 mt-sm-0"
        style="background-color: #e67e22; border: none;">Baca Selengkapnya</a>
    </div>

    <div style="width: 90px; height: 4px; background-color: #2A774C; margin-bottom: 25px;"></div>

    <!-- Scrollable Berita -->
    <div class="d-flex flex-nowrap overflow-auto pb-3 px-1" style="gap: 1rem; scroll-snap-type: x mandatory;">

      <!-- Card 1 -->
      <div class="card shadow-sm border-success flex-shrink-0" 
          style="min-width: 260px; max-width: 300px; scroll-snap-align: start;">
        <img src="assets/img/dashboard/berita.png" class="card-img-top img-fluid" alt="Berita 1"
            style="object-fit: cover; height: 180px;">
        <div class="card-body">
          <small class="text-muted"><i class="bi bi-calendar-event"></i> 14 September 2025</small>
          <h6 class="fw-bold mt-2">Desa Driyorejo Mengesahkan Pembukaan Tempat Wisata Baru</h6>
          <p class="text-muted small mb-2">
            Pemerintah Desa Driyorejo bersama Badan Permusyawaratan Desa (BPD) secara resmi mengesahkan pembukaan tempat...
          </p>
          <a href="#" class="text-success fw-semibold text-decoration-none">Baca Selengkapnya</a>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="card shadow-sm border-success flex-shrink-0" 
          style="min-width: 260px; max-width: 300px; scroll-snap-align: start;">
        <img src="assets/img/dashboard/berita.png" class="card-img-top img-fluid" alt="Berita 2"
            style="object-fit: cover; height: 180px;">
        <div class="card-body">
          <small class="text-muted"><i class="bi bi-calendar-event"></i> 14 September 2025</small>
          <h6 class="fw-bold mt-2">Desa Driyorejo Meningkatkan Kualitas UMKM Lokal</h6>
          <p class="text-muted small mb-2">
            Melalui pelatihan dan dukungan pemerintah desa, pelaku UMKM kini lebih siap menghadapi pasar digital...
          </p>
          <a href="#" class="text-success fw-semibold text-decoration-none">Baca Selengkapnya</a>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="card shadow-sm border-success flex-shrink-0" 
          style="min-width: 260px; max-width: 300px; scroll-snap-align: start;">
        <img src="assets/img/dashboard/berita.png" class="card-img-top img-fluid" alt="Berita 3"
            style="object-fit: cover; height: 180px;">
        <div class="card-body">
          <small class="text-muted"><i class="bi bi-calendar-event"></i> 14 September 2025</small>
          <h6 class="fw-bold mt-2">Desa Driyorejo Adakan Gotong Royong Bersama Warga</h6>
          <p class="text-muted small mb-2">
            Dalam rangka mempererat kebersamaan, warga Desa Driyorejo menggelar kegiatan bersih lingkungan bersama...
          </p>
          <a href="#" class="text-success fw-semibold text-decoration-none">Baca Selengkapnya</a>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="card shadow-sm border-success flex-shrink-0" 
          style="min-width: 260px; max-width: 300px; scroll-snap-align: start;">
        <img src="assets/img/dashboard/berita.png" class="card-img-top img-fluid" alt="Berita 1"
            style="object-fit: cover; height: 180px;">
        <div class="card-body">
          <small class="text-muted"><i class="bi bi-calendar-event"></i> 14 September 2025</small>
          <h6 class="fw-bold mt-2">Desa Driyorejo Mengesahkan Pembukaan Tempat Wisata Baru</h6>
          <p class="text-muted small mb-2">
            Pemerintah Desa Driyorejo bersama Badan Permusyawaratan Desa (BPD) secara resmi mengesahkan pembukaan tempat...
          </p>
          <a href="#" class="text-success fw-semibold text-decoration-none">Baca Selengkapnya</a>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="card shadow-sm border-success flex-shrink-0" 
          style="min-width: 260px; max-width: 300px; scroll-snap-align: start;">
        <img src="assets/img/dashboard/berita.png" class="card-img-top img-fluid" alt="Berita 2"
            style="object-fit: cover; height: 180px;">
        <div class="card-body">
          <small class="text-muted"><i class="bi bi-calendar-event"></i> 14 September 2025</small>
          <h6 class="fw-bold mt-2">Desa Driyorejo Meningkatkan Kualitas UMKM Lokal</h6>
          <p class="text-muted small mb-2">
            Melalui pelatihan dan dukungan pemerintah desa, pelaku UMKM kini lebih siap menghadapi pasar digital...
          </p>
          <a href="#" class="text-success fw-semibold text-decoration-none">Baca Selengkapnya</a>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="card shadow-sm border-success flex-shrink-0" 
          style="min-width: 260px; max-width: 300px; scroll-snap-align: start;">
        <img src="assets/img/dashboard/berita.png" class="card-img-top img-fluid" alt="Berita 3"
            style="object-fit: cover; height: 180px;">
        <div class="card-body">
          <small class="text-muted"><i class="bi bi-calendar-event"></i> 14 September 2025</small>
          <h6 class="fw-bold mt-2">Desa Driyorejo Adakan Gotong Royong Bersama Warga</h6>
          <p class="text-muted small mb-2">
            Dalam rangka mempererat kebersamaan, warga Desa Driyorejo menggelar kegiatan bersih lingkungan bersama...
          </p>
          <a href="#" class="text-success fw-semibold text-decoration-none">Baca Selengkapnya</a>
        </div>
      </div>
    </div>
  </div>

</main>

  {{-- Footer --}}
  @include('user.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>