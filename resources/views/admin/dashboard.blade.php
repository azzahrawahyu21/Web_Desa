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

    <style>
        .navbar .dropdown-menu {
            margin-top: 8px;
            border-radius: 12px;
            z-index: 2000;
            position: absolute;
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
        /* Tombol Logout */
        form.logout-btn button {
            border-radius: 20px;
            background-color: #0D4715;
            border: none;
            color: #fff;
            padding: 8px 24px;
        }
        form.logout-btn button:hover {
            background-color: white;
            color: #0D4715;
            border: 1px solid #0D4715;
        }
    </style>
</head>
<body>
    <!-- ✅ Navbar tetap di atas -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top py-2" style="border-radius: 0 0 20px 20px;">
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

            <!-- Menu tengah & tombol logout kanan -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                </ul>

                <!-- ✅ Ganti tombol login jadi tombol logout -->
                <form method="POST" action="{{ route('logout') }}" class="logout-btn d-inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Konten utama -->
    <div class="container" style="margin-top: 100px;">
        <h4>DASHBOARD ADMIN</h4>
        <p>Selamat datang, {{ auth()->user()->nama_pengguna }}</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
