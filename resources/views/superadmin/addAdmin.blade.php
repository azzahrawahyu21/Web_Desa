<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f4f2;
            margin: 0;
            padding: 40px;
            color: #0D4715;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .welcome {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            color: #0D4715;
        }

        .wrapper {
            display: flex;
            gap: 30px;
            background-color: #ffffff;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .form-container {
            flex: 1;
            border-right: 1px solid #e0e0e0;
            padding-right: 25px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background-color: #0D4715;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            margin-top: 5px;
        }

        button:hover {
            background-color: #0b3a12;
        }

        .success, .error {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .table-container {
            flex: 2;
            padding-left: 25px;
        }

        .table-container h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #0D4715;
            color: #fff;
            font-weight: normal;
        }

        tr:nth-child(even) {
            background-color: #f9faf9;
        }

        tr:hover {
            background-color: #f0f3f0;
        }

        /* ======== Gaya toggle switch ======== */
        .switch {
            position: relative;
            display: inline-block;
            /* width: 46px;
            height: 24px; */
            width: 50px;
            height: 28px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            /* border-radius: 24px; */
          border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            /* height: 18px;
            width: 18px; */
            height: 22px;
            width: 22px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #0D4715;
        }

        input:checked + .slider:before {
            transform: translateX(22px);
        }

        @media (max-width: 900px) {
            .wrapper {
                flex-direction: column;
            }

            .form-container {
                border-right: none;
                border-bottom: 1px solid #e0e0e0;
                padding-right: 0;
                padding-bottom: 25px;
            }

            .table-container {
                padding-left: 0;
                padding-top: 15px;
            }
        }
    </style>
</head>
<body>
    <h2>Kelola Admin</h2>
    <p class="welcome">Selamat datang, {{ auth()->user()->nama_pengguna }}</p>

    <div class="wrapper">
        <!-- Kolom kiri -->
        <div class="form-container">
            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('superadmin.addAdmin.submit') }}">
                @csrf
                <label>Nama Admin:</label>
                <input type="text" name="nama_pengguna" value="{{ old('nama_pengguna') }}" required>

                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>

                <label>Password:</label>
                <input type="password" name="kata_sandi" required>

                <button type="submit">Tambah Admin</button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="logout">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>

        <!-- Kolom kanan -->
        <div class="table-container">
            <h3>Daftar Admin</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Admin</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $index => $admin)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $admin->nama_pengguna }}</td>
                            <td>{{ $admin->email }}</td>
                            <td id="status-{{ $admin->id_pengguna }}">{{ ucfirst($admin->status) }}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" 
                                        class="toggle-admin" 
                                        data-id="{{ $admin->id_pengguna }}" 
                                        {{ $admin->status === 'aktif' ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<script>
document.querySelectorAll('.toggle-admin').forEach(toggle => {
    toggle.addEventListener('change', async function() {
        const id = this.dataset.id;
        const csrf = '{{ csrf_token() }}';
        const checked = this.checked;
        const statusCell = document.getElementById(`status-${id}`);

        try {
            const response = await fetch(`/toggle-admin-ajax/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json',
                },
            });

            const result = await response.json();
            console.log('Response:', result); // lihat hasilnya di console

            if (result.success) {
                const newStatus = result.status === 'aktif' ? 'Aktif' : 'Tidak Aktif';
                statusCell.textContent = newStatus;
                statusCell.style.color = result.status === 'aktif' ? '#0D4715' : '#888';
            } else {
                alert('Gagal memperbarui status.');
                this.checked = !checked;
            }

        } catch (err) {
            console.error('Error:', err);
            alert('Gagal terhubung ke server.');
            this.checked = !checked;
        }
    });
});
</script>
</body>
</html>