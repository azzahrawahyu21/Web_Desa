<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      background-color: #f8faf9;
    }

    .navbar {
      background-color: #ffffff;
      border-radius: 0 0 20px 20px;
    }

    .navbar-brand span {
      color: #0D4715;
    }

    .navbar-nav .nav-link:hover {
      color: #0D4715 !important;
    }

    /* Tombol Logout */
    form.logout-btn button {
      border-radius: 20px;
      background-color: #0D4715;
      border: none;
      color: #fff;
      padding: 8px 24px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    form.logout-btn button:hover {
      background-color: #fff;
      color: #0D4715;
      border: 1px solid #0D4715;
      transform: scale(1.05);
    }

    /* Garis oranye bawah judul */
    .underline {
      width: 192px;
      height: 3px;
      background-color: #f97316; /* orange */
      border-radius: 2px;
      margin-top: 6px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg shadow fixed-top py-2">
    <div class="container d-flex justify-content-between align-items-center">
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

      <!-- Tombol Logout -->
      <form method="POST" action="{{ route('logout') }}" class="logout-btn m-0">
        @csrf
        <button type="submit">
          <i class="bi bi-box-arrow-right me-1"></i> Logout
        </button>
      </form>
    </div>
  </nav>

<header class="header-2 position-relative">
  <div class="page-header d-flex align-items-center justify-content-center text-center text-white"
       style="background-image: url('{{ asset('assets/img/background.jpg') }}');
              background-size: cover; background-position: center; height: 60vh; position: relative;">
    <!-- Overlay -->
    <div style="background: rgba(0,0,0,0.5); position:absolute; top:0; right:0; bottom:0; left:0;"></div>
  </div>
</header>

  <!-- Konten utama -->
  <main class="flex justify-center p-8 position-relative"
        style="margin-top: -375px; position: relative; z-index: 10;">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-6xl border border-gray-200"
         style="box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);">

      <!-- Bagian atas: Selamat datang -->
      <div class="mb-10 text-left">
        <h4 style="font-size: 28px; font-weight: 700; margin-bottom: 8px; color: #0D4715;">
          DASHBOARD ADMIN
        </h4>
       <p style="font-size: 18px; font-weight: 500; color: #0D4715;">
            Selamat datang, 
            <span style="color: #f97316; font-weight: 600;">
                {{ auth()->user()->nama_pengguna }}
            </span>
        </p>

        <div class="underline"></div>
      </div>

        <div class="mb-8 section-wrapper">
            {{-- Menu dinamis dari database --}}
            @if($menus->isNotEmpty())
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    @foreach($menus as $menu)
                        <a href="{{ route('submenu.index', $menu->id_menu) }}" 
                            class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900 text-center transition-all">
                            {{ strtoupper($menu->nama_menu) }}
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 italic mb-6">Belum ada menu yang ditambahkan.</p>
            @endif

            <div style="width: 100%; height: 3px; background-color: #f3ab77ff; border-radius: 3px; margin-top: 28px; margin-bottom: 28px;"></div>
        </div>

        <!-- TOMBOL TAMBAH MENU -->
        <div class="section-wrapper text-center mb-8">
            <h4 class="text-[#0D4715] font-bold mb-4">Ingin Menambahkan Menu Baru?</h4>
            <a href="{{ route('menu.create') }}"
                class="bg-[#0D4715] text-white font-semibold py-3 px-6 rounded-lg shadow hover:bg-green-900 inline-block transition-all">
                <i class="bi bi-plus-circle me-2"></i> Tambah Menu
            </a>
        </div>

      {{-- <!-- PROFIL DESA -->
      <div class="mb-8 section-wrapper">
        <h3 class="text-[#0D4715] font-bold mb-4">PROFIL DESA</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">VISI MISI</button>
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">STRUKTUR KEANGGOTAAN</button>
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">REGULASI</button>
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">UMKM</button>
        </div>
        <div style="width: 100%; height: 3px; background-color: #f3ab77ff; border-radius: 3px; margin-top: 28px; margin-bottom: 28px;"></div>
      </div>


      <!-- DATA STATISTIK -->
      <div class="mb-8 section-wrapper">
        <h3 class="text-[#0D4715] font-bold mb-4">DATA STATISTIK</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">PENDUDUK</button>
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">PENDIDIKAN</button>
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">PEKERJAAN</button>
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">AGAMA</button>
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">PERKAWINAN</button>
        </div>
        <div style="width: 100%; height: 3px; background-color: #f3ab77ff; border-radius: 3px; margin-top: 28px; margin-bottom: 28px;"></div>
      </div>

      <!-- LEMBAGA -->
      <div class="mb-8 section-wrapper">
        <h3 class="text-[#0D4715] font-bold mb-4">LEMBAGA</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">RT/RW</button>
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">PPID</button>
        </div>
        <div style="width: 100%; height: 4px; background-color: #f3ab77ff; border-radius: 3px; margin-top: 28px; margin-bottom: 28px;"></div>
      </div>

      <!-- BERITA DAN GALERI -->
      <div class="section-wrapper">
        <h3 class="text-[#0D4715] font-bold mb-4">BERITA DAN GALERI</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">BERITA</button>
          <button class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900">FOTO</button>
        </div>
        <div style="width: 100%; height: 4px; background-color: #f3ab77ff; border-radius: 3px; margin-top: 28px; margin-bottom: 28px;"></div>
      </div> --}}

    </div>
  </main>
{{-- <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-6xl border border-gray-200"
    style="box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);">
<div class="section-wrapper">
    <h4 class="text-[#0D4715] font-bold mb-4">Ingin Menambahkan Menu Baru?</h4>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a 
            href="{{ route('menu.create') }}"
            class="bg-[#0D4715] text-white font-semibold py-3 rounded-lg shadow hover:bg-green-900 text-center">
            Tambah Menu
        </a>
    </div>
</div>

</div> --}}


    {{-- Footer --}}
    @include('admin.footerAdmin')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>