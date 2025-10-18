<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Desa Driyorejo</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .navbar .dropdown-menu {
      margin-top: 8px;      /* kasih jarak antara button & dropdown */
      border-radius: 12px;  /* sudut membulat */
      z-index: 2000; /* pastikan di atas elemen lain */
      position: absolute; /* wajib untuk dropdown */
    }
    .navbar-nav .nav-link:hover {
      color: #0D4715 !important;
    }

    .navbar .bi-chevron-down {
      color: #000 !important; 
      font-size: 0.9rem; 
      padding-top: 4px;
    }
    .navbar-brand {
      font-size: 1rem; 
    }
    .dropdown-menu .dropdown-item:hover {
      background-color: #0D4715 !important;
      color: #fff !important;
    }
    .btn-success:hover {
      background-color: white !important;
      border-color: #0D4715 !important;
      color: #0D4715;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-white blur blur-rounded top-0 shadow position-absolute my-4 py-1 start-0 end-0 mx-5"
       style="z-index:1050; border-radius: 50px; ">
    <div class="container">
      <!-- Logo kiri -->
      <a class="navbar-brand fw-bold text-dark d-flex align-items-center" href="#">
        <img src="{{ asset('assets/img/navbar/logo 1.png') }}" alt="Logo Desa" width="40" class="me-2">
        <div class="d-flex flex-column">
          <span style="font-size: 0.95rem; font-weight: 600;">Desa Driyorejo</span>
          <small style="font-size: 0.75rem; font-weight: 400; color: #555;">
            Kec. Driyorejo Kab. Magetan
          </small>
        </div>
      </a>

      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu tengah & tombol login kanan -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">

          <!-- Profil Desa -->
          <li class="nav-item dropdown">
            <a class="nav-link text-dark d-flex align-items-center" href="#" data-bs-toggle="dropdown">
              Profil Desa <i class="bi bi-chevron-down ms-2"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profil Desa</a></li>
              <li><a class="dropdown-item" href="#">Sejarah Desa</a></li>
              <li><a class="dropdown-item" href="#">Visi Misi</a></li>
              <li><a class="dropdown-item" href="#">Struktur Keanggotaan dan Profil Pejabat</a></li>
              <li><a class="dropdown-item" href="#">Regulasi</a></li>
              <li><a class="dropdown-item" href="#">Peta Desa</a></li>
              <li><a class="dropdown-item" href="#">UMKM</a></li>
            </ul>
          </li>

          <!-- Data Statistik -->
          <li class="nav-item dropdown">
            <a class="nav-link text-dark d-flex align-items-center" href="#" data-bs-toggle="dropdown">
              Data Statistik <i class="bi bi-chevron-down ms-2"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Statistik Penduduk</a></li>
              <li><a class="dropdown-item" href="#">Statistik Pendidikan</a></li>
              <li><a class="dropdown-item" href="#">Statistik Pekerjaan</a></li>
              <li><a class="dropdown-item" href="#">Statistik Agama</a></li>
              <li><a class="dropdown-item" href="#">Statistik Perkawinan</a></li>
            </ul>
          </li>

          <!-- Lembaga -->
          <li class="nav-item dropdown">
            <a class="nav-link text-dark d-flex align-items-center" href="#" data-bs-toggle="dropdown">
              Lembaga <i class="bi bi-chevron-down ms-2"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">BPD</a></li>
              <li><a class="dropdown-item" href="#">LPMD</a></li>
              <li><a class="dropdown-item" href="#">PKK</a></li>
              <li><a class="dropdown-item" href="#">RT/RW</a></li>
              <li><a class="dropdown-item" href="#">Karang Taruna</a></li>
              <li><a class="dropdown-item" href="#">Bumdes</a></li>
              <li><a class="dropdown-item" href="#">PPID</a></li>
              
            </ul>
          </li>

          <!-- Berita Desa -->
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Berita Desa</a>
          </li>

          <!-- Galeri -->
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Galeri</a>
          </li>
        </ul>

        <!-- Login kanan -->
        <a class="btn btn-success ms-lg-2 px-4" 
        href="{{ route('login') }}" 
        style="border-radius: 20px; background-color:#0D4715; border:none;">
        Login
        </a>
      </div>
    </div>
  </nav>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>