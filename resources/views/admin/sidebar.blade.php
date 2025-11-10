<nav class="navbar navbar-expand-lg fixed-top bg-[#0D4715] py-3 shadow-md">
  <div class="container-fluid px-4 d-flex justify-content-between align-items-center text-white">
    <button id="toggleSidebar" class="btn text-white d-lg-none me-2 fs-4 border-0">
      <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand text-white fw-bold d-flex align-items-center gap-2" href="#">
      <img src="{{ asset('assets/img/navbar/logo 1.png') }}" alt="Logo Desa" width="40" class="rounded">
      <div class="d-flex flex-column lh-sm">
        <span class="fw-semibold" style="font-size: 0.95rem;">Desa Driyorejo</span>
        <small class="text-white-50" style="font-size: 0.75rem;">Kec. Driyorejo Kab. Magetan</small>
      </div>
    </a>
    <form method="POST" action="{{ route('logout') }}" class="m-0">
      @csrf
      <button type="submit" class="btn btn-light rounded-pill px-4 py-2 fw-semibold text-[#0D4715]">
        <i class="bi bi-box-arrow-right me-1"></i> Logout
      </button>
    </form>
  </div>
</nav>

<!-- Sidebar Admin -->
<aside id="sidebar" class="sidebar transition-transform duration-300 -translate-x-full lg:translate-x-0">
  <div>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>

    <hr class="opacity-30 mx-3">

    <!-- Tombol dropdown Kelola Menu -->
    <button class="dropdown-toggle-btn w-100 text-start px-4 py-2 border-0 bg-transparent text-white fw-semibold">
      <i class="bi bi-journal-text me-2"></i> Kelola Menu
      <i class="bi bi-chevron-down float-end"></i>
    </button>

    <!-- Isi dropdown menu dinamis -->
    <div id="menuDropdown" class="dropdown-content">
      <a href="{{ route('menu.index') }}" class="ps-5 {{ request()->routeIs('menu.index') ? 'active' : '' }}">
        <i class="bi bi-list-check me-2"></i> Daftar Menu
      </a>

      @if($menus->isNotEmpty())
        @foreach($menus as $url => $menuGroup)
          @php $firstMenu = $menuGroup->first(); @endphp
          <a href="{{ route('submenu.index', $firstMenu->id_menu) }}" class="ps-5">
            <i class="bi bi-folder2-open me-2"></i> {{ ucfirst($firstMenu->nama_menu) }}
          </a>
        @endforeach
      @else
        <p class="text-sm text-gray-300,300 px-5 mt-2 italic">Belum ada menu.</p>
      @endif
    </div>

    <!--Tombol Data Statistik -->
    <button class="dropdown-toggle-btn w-100 text-start px-4 py-2 border-0 bg-transparent text-white fw-semibold">
      <i class="bi bi-journal-text me-2"></i> Data Statistik
      <i class="bi bi-chevron-down float-end"></i>
    </button>

    <div id="StatistikDropdown" class="dropdown-content">
      <a href="{{ route('kategori-statistik.index') }}" class="ps-5 {{ request()->routeIs('kategori-statistik.index') ? 'active' : '' }}">
      <i class="bi bi-list-check me-2"></i> Daftar Statistik
    </a>

    @if(isset($kategoris) && $kategoris->isNotEmpty())
      @foreach($kategoris as $kategori)
        <a href="{{ route('subkategori-statistik.index', $kategori->id_kategori) }}" class="ps-5 {{ request()->routeIs('subkategori-statistik.index') && request()->segment(3) == $kategori->id_kategori ? 'active' : '' }}">
          <i class="bi bi-folder2-open me-2"></i> {{ ucfirst($kategori->nama_kategori) }}
        </a>
      @endforeach
    @else
      <p class="text-sm text-gray-300 px-5 mt-2 italic">Belum data statistik.</p>
    @endif
    </div>

    <!--Tombol PPID -->
    <button class="dropdown-toggle-btn w-100 text-start px-4 py-2 border-0 bg-transparent text-white fw-semibold">
      <i class="bi bi-journal-text me-2"></i> PPID
      <i class="bi bi-chevron-down float-end"></i>
    </button>

    <div id="PpidDropdown" class="dropdown-content">
      <a href="{{ route('jenis-ppid.index') }}" class="ps-5 {{ request()->routeIs('jenis-ppid.index') ? 'active' : '' }}">
      <i class="bi bi-list-check me-2"></i> Daftar Jenis PPID
    </a>
  
    @if(isset($jenisPpids) && $jenisPpids->isNotEmpty())
    @foreach($jenisPpids as $jenis)
      <a href="{{ route('judul-ppid.index', $jenis->id_jenis_ppid) }}" class="ps-5 {{ request()->routeIs('judul-ppid.index') && request()->segment(3) == $jenis->id_jenis_ppid ? 'active' : '' }}">
        <i class="bi bi-folder2-open me-2"></i> {{ ucfirst($jenis->nama_jenis_ppid) }}
      </a>
    @endforeach
    @else
      <p class="text-sm text-gray-300 px-5 mt-2 italic">Belum ada PPID</p>
    @endif
    </div>

     <!-- RT/RW -->
    <button class="dropdown-toggle-btn w-100 text-start px-4 py-2 border-0 bg-transparent text-white fw-semibold">
      <i class="bi bi-journal-text me-2"></i> Data RT/RW
      <i class="bi bi-chevron-down float-end"></i>
    </button>

    <div id="rtRwDropdown" class="dropdown-content">
      <a href="{{ route('rw.index') }}" class="ps-5 {{ request()->routeIs('rw.index') ? 'active' : '' }}">
        <i class="bi bi-list-check me-2"></i> Daftar RW
      </a>

      @if(isset($rws) && $rws->isNotEmpty())
        @foreach($rws as $rw)
          <a href="{{ route('rt.index', $rw->id_rw) }}" class="ps-5 {{ request()->routeIs('rt.index') && request()->segment(3) == $rw->id_rw ? 'active' : '' }}">
            <i class="bi bi-folder2-open me-2"></i> RW {{ ucfirst($rw->no_rw) }}
          </a>
        @endforeach
      @else
        <p class="text-sm text-gray-300 px-5 mt-2 italic">Belum ada data RW.</p>
      @endif
    </div>

    {{-- <hr class="opacity-30 mx-3"> --}}
  </div>

  <div class="bottom">
    <a href="{{ route('menu.create') }}" class="add-menu-btn">
      <i class="bi bi-plus-circle me-2"></i> Tambah Menu
    </a>
  </div>
</aside>

<style>
  .sidebar {
    width: 260px;
    height: 100vh;
    background-color: #0D4715;
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    padding-top: 80px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 5px 0 15px rgba(0,0,0,0.1);
    z-index: 40;
  }

  .sidebar a {
    display: block;
    padding: 10px 20px;
    color: white;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s;
  }

  .sidebar a:hover, .sidebar a.active {
    background-color: #166534;
    padding-left: 28px;
  }

  .dropdown-toggle-btn {
    cursor: pointer;
    transition: all 0.3s;
  }

  .dropdown-toggle-btn:hover {
    background-color: #166534;
  }

  .dropdown-content {
    display: none;
    flex-direction: column;
    background-color: rgba(255, 255, 255, 0.05);
  }

  .dropdown-content a {
    padding: 8px 24px;
    font-size: 0.9rem;
  }

  .dropdown-content.show {
    display: flex;
  }

  .sidebar .bottom {
    padding: 20px;
    border-top: 1px solid rgba(255,255,255,0.2);
  }

  .sidebar .add-menu-btn {
    background-color: #f97316;
    color: #fff;
    display: block;
    text-align: center;
    padding: 10px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s;
  }

  .sidebar .add-menu-btn:hover {
    background-color: #fb923c;
    transform: scale(1.05);
  }

  /* Responsif */
  @media (max-width: 1024px) {
    .sidebar {
      transform: translateX(-100%);
    }
    .sidebar.show {
      transform: translateX(0);
    }
  }
</style>

<script>
  const toggleBtn = document.getElementById('toggleSidebar');
  const sidebar = document.getElementById('sidebar');

  // Toggle sidebar (untuk layar kecil)
  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('show');
  });

  // Ambil semua tombol dropdown
  const dropdownButtons = document.querySelectorAll('.dropdown-toggle-btn');

  dropdownButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const dropdownContent = btn.nextElementSibling;
      dropdownContent.classList.toggle('show');
      const icon = btn.querySelector('.bi-chevron-down');
      icon.classList.toggle('rotate');
    });
  });
</script>