<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Menu</title>

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

  /* Header background */
  .page-header {
    background-image: url('{{ asset('assets/img/background.jpg') }}');
    background-size: cover;
    background-position: center;
    height: 100vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .page-header::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1;
  }

  /* Card Tambah Menu */
  .form-card {
    position: relative;
    z-index: 2; /* ⬅️ penting supaya di atas overlay */
    background: #fff;
    border-radius: 1rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    padding: 2rem;
    width: 100%;
    max-width: 480px;
    color: #222; /* pastikan teks gelap dan jelas */
    text-align: left;
  }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow fixed-top py-2">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand fw-bold text-dark d-flex align-items-center" href="#">
      <img src="{{ asset('assets/img/navbar/logo 1.png') }}" alt="Logo Desa" width="40" class="me-2">
      <div class="d-flex flex-column">
        <span style="font-size: 0.95rem; font-weight: 600;">Desa Driyorejo</span>
        <small style="font-size: 0.75rem; font-weight: 400; color: #555;">
          Kec. Driyorejo Kab. Magetan
        </small>
      </div>
    </a>

    <form method="POST" action="{{ route('logout') }}" class="logout-btn m-0">
      @csrf
      <button type="submit">
        <i class="bi bi-box-arrow-right me-1"></i> Logout
      </button>
    </form>
  </div>
</nav>

<!-- Header Full Background -->
<header class="page-header d-flex align-items-center justify-content-center text-white text-center">
  <div class="form-card">
    <h2 class="text-[#0D4715] text-2xl font-bold mb-4 text-center">Tambah Menu Baru</h2>

    <form action="{{ route('menu.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="nama_menu" class="form-label fw-semibold ">Nama Menu</label>
        <input type="text" name="nama_menu" id="nama_menu" class="form-control" placeholder="Masukkan nama menu baru" required>
      </div>

      {{-- <div class="mb-3">
        <label for="url" class="form-label fw-semibold">URL (opsional)</label>
        <input type="text" name="url" id="url" class="form-control" placeholder="Masukkan URL">
      </div> --}}

      <div class="mb-3">
        <label for="url" class="form-label fw-semibold">Pilih Kategori</label>
        <select name="url" id="url" class="form-select" required>
          <option value="" disabled selected>-- Pilih Kategori --</option>
          <option value="profil_desa">Profil Desa</option>
          <option value="data_statistik">Data Statistik</option>
          <option value="lembaga">Lembaga</option>
          <option value="berita_desa">Berita Desa</option>
          <option value="galeri">Galeri</option>
        </select>
      </div>

      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan Menu</button>
      </div>
    </form>
  </div>
</header>

</body>
</html>
