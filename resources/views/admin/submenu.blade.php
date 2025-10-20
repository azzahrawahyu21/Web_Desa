<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submenu - {{ $menu->nama_menu }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { background-color: #f8faf9; }
    .navbar { background-color: #ffffff; border-radius: 0 0 20px 20px; }
    .navbar-brand span { color: #0D4715; }
    form.logout-btn button {
      border-radius: 20px; background-color: #0D4715; border: none; color: #fff;
      padding: 8px 24px; font-weight: 600; transition: all 0.3s ease;
    }
    form.logout-btn button:hover {
      background-color: #fff; color: #0D4715; border: 1px solid #0D4715;
      transform: scale(1.05);
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow fixed-top py-2">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand fw-bold text-dark d-flex align-items-center" href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('assets/img/navbar/logo 1.png') }}" alt="Logo Desa" width="40" class="me-2">
      <div class="d-flex flex-column">
        <span style="font-size: 0.95rem; font-weight: 600;">Desa Driyorejo</span>
        <small style="font-size: 0.75rem; color: #555;">Kec. Driyorejo Kab. Magetan</small>
      </div>
    </a>

    <form method="POST" action="{{ route('logout') }}" class="logout-btn m-0">
      @csrf
      <button type="submit"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
    </form>
  </div>
</nav>

<!-- Konten -->
<div class="container mt-5 pt-5">
  <div class="bg-white shadow-lg rounded-xl p-6 mt-5 border border-gray-200">
    <h2 class="text-[#0D4715] text-2xl font-bold mb-4 text-center">Submenu dari {{ $menu->nama_menu }}</h2>

    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah Submenu -->
    <form action="{{ route('submenu.store', $menu->id_menu) }}" method="POST" class="mb-4">
      @csrf
      <div class="mb-3">
        <label for="judul" class="form-label fw-semibold">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="isi" class="form-label fw-semibold">Isi</label>
        <textarea name="isi" id="isi" rows="4" class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <label for="foto" class="form-label fw-semibold">Foto (URL)</label>
        <input type="text" name="foto" id="foto" class="form-control">
      </div>

      <div class="text-end">
        <button type="submit" class="btn btn-success">Tambah Submenu</button>
      </div>
    </form>

    <hr>

    <!-- Daftar Submenu -->
    <h4 class="text-[#0D4715] font-semibold mb-3">Daftar Submenu</h4>

    @if($submenus->isEmpty())
      <p class="text-center text-gray-500">Belum ada submenu untuk menu ini.</p>
    @else
      <div class="list-group">
        @foreach($submenus as $submenu)
          <div class="list-group-item">
            <h5 class="fw-bold">{{ $submenu->judul }}</h5>
            <p>{{ $submenu->isi }}</p>

            @if($submenu->foto)
              @php
                // --- Perbaikan otomatis URL ---
                $fotoUrl = $submenu->foto;
                // ganti IP yang salah
                $fotoUrl = str_replace('127.0.01', '127.0.0.1', $fotoUrl);
                // hapus slash ganda
                $fotoUrl = str_replace('//files', '/files', $fotoUrl);
                // ambil ekstensi file
                $ext = pathinfo($fotoUrl, PATHINFO_EXTENSION);
              @endphp

              {{-- Gambar --}}
              @if(in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                <img src="{{ $fotoUrl }}" alt="Foto Submenu" class="img-fluid rounded border mt-2" style="max-height: 180px;">
              
              {{-- PDF --}}
              @elseif(strtolower($ext) === 'pdf')
                <iframe src="{{ $fotoUrl }}" class="w-100 rounded border mt-2" style="height: 300px;" title="PDF Preview"></iframe>
                <div class="mt-2">
                  <a href="{{ $fotoUrl }}" target="_blank" class="btn btn-sm btn-outline-success">
                    <i class="bi bi-file-earmark-pdf"></i> Buka PDF
                  </a>
                </div>

              {{-- File lainnya --}}
              @else
                <a href="{{ $fotoUrl }}" target="_blank" class="btn btn-sm btn-outline-secondary mt-2">
                  <i class="bi bi-file-earmark"></i> Lihat File
                </a>
              @endif
            @endif
          </div>
        @endforeach
      </div>
    @endif
  </div>
</div>
<!-- Input foto di dalam form -->
<div class="mb-3">
  <label for="foto" class="form-label fw-semibold">Foto (URL)</label>
  <div class="input-group">
    <input type="text" name="foto" id="foto" class="form-control">
    <button type="button" class="btn btn-secondary" id="btnBrowse">Pilih dari ElFinder</button>
  </div>
</div>

<script>
  function openElfinder() {
    window.open('/elfinder', 'Elfinder', 'width=900,height=600');
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#btnBrowse').on('click', function() {
    var fm = window.open('/elfinder/popup/foto', 'FileManager', 'width=900,height=600');
    window.SetUrl = function (items) {
      var fileUrl = items.map(function (item) { return item.url; }).join(',');
      $('#foto').val(fileUrl);
    };
  });
</script>

</body>
</html>
