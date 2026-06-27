<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Pengurus - Sistem Kas Asrama</title>
    <style>
        body { font-family: Arial, sans-serif; background: #2c3e50; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 30px; border-radius: 8px; width: 100%; max-width: 400px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
        input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { width: 100%; padding: 10px; background: #2ecc71; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; }
        .btn:hover { background: #27ae60; }
        .error { color: #e74c3c; font-size: 13px; margin-bottom: 15px; text-align: center; }
    </style>
</head>
<body>
    <div class="card">
        <h2 style="text-align: center; margin-top: 0;">Daftar Pengurus Baru</h2>

        @if($errors->any())
            <div class="error">
                <strong>Gagal!</strong> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap Anda" required autofocus>
            </div>
            <div class="form-group">
                <label>Email Pengurus</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Contoh: admin@asrama.com" required>
            </div>
            <div class="form-group">
                <label>Password (Min. 6 Karakter)</label>
                <input type="password" name="password" placeholder="Buat password baru" required>
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
            </div>
            <button type="submit" class="btn">Daftar Akun</button>
        </form>

        <p style="text-align: center; font-size: 14px; margin-top: 20px;">
            Sudah punya akun? <br>
            <a href="{{ route('login') }}" style="color: #3498db; text-decoration: none; font-weight: bold;">Login di sini</a>
        </p>
    </div>
</body>
</html>
