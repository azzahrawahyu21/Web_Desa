<!-- resources/views/superadmin/addAdmin.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #0D4715;
        }

        p.welcome {
            text-align: center;
            color: #0D4715;
            font-weight: bold;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #0D4715;
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #0D4715;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background-color: #0D4715;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0b3a12;
        }

        form.logout {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Admin</h2>
        <p class="welcome">Selamat datang, {{ auth()->user()->nama_pengguna }} (Superadmin)</p>

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
</body>
</html>
