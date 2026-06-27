<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kas AsramaKu</title>
    <style>
        body { margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; color: #333; line-height: 1.6; }

        /* Navbar Styling */
        header { background-color: #2c3e50; color: white; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        header h1 { margin: 0; font-size: 24px; letter-spacing: 1px; }
        .nav-links a { color: white; text-decoration: none; margin-left: 20px; font-weight: bold; font-size: 14px; padding: 8px 15px; border-radius: 4px; transition: 0.3s; }
        .nav-links a:hover { background-color: #34495e; }
        .btn-login { background-color: #3498db; }
        .btn-login:hover { background-color: #2980b9 !important; }

        /* Hero Section Styling */
        .hero { background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%); color: white; padding: 80px 20px; text-align: center; }
        .hero h2 { font-size: 36px; margin-bottom: 10px; margin-top: 0; }
        .hero p { font-size: 18px; max-width: 600px; margin: 0 auto 30px auto; color: #bdc3c7; }
        .hero-btn { background-color: #2ecc71; color: white; padding: 12px 25px; text-decoration: none; font-size: 16px; font-weight: bold; border-radius: 5px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: 0.3s; display: inline-block; }
        .hero-btn:hover { background-color: #27ae60; transform: translateY(-2px); }

        /* Content Section */
        .container { max-width: 1000px; margin: 50px auto; padding: 0 20px; display: flex; gap: 40px; }
        .profile-text { flex: 1; }
        .profile-text h3 { color: #2c3e50; font-size: 28px; border-bottom: 2px solid #3498db; padding-bottom: 10px; display: inline-block; margin-top: 0;}
        .features { flex: 1; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .features ul { list-style-type: none; padding: 0; margin: 0; }
        .features li { padding: 10px 0; border-bottom: 1px solid #eee; display: flex; align-items: center; }
        .features li::before { content: "✓"; color: #2ecc71; font-weight: bold; margin-right: 10px; font-size: 18px; }

        /* Footer */
        footer { background-color: #2c3e50; color: #bdc3c7; text-align: center; padding: 20px; margin-top: 50px; font-size: 14px; }
    </style>
</head>
<body>

    <header>
        <h1>AsramaKu</h1>
        <div class="nav-links">
            @guest
                <a href="{{ route('login') }}" class="btn-login">Login Pengurus</a>
                <a href="{{ route('register') }}">Daftar Baru</a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="btn-login">Masuk ke Dashboard</a>
            @endauth
        </div>
    </header>

    <div class="hero">
        <h2>Sistem Pencatatan Pembayaran Kas</h2>
        <p>Platform digital untuk mewujudkan transparansi dan kemudahan dalam mengelola keuangan serta data anggota asrama secara real-time.</p>

        @guest
            <a href="{{ route('login') }}" class="hero-btn">Mulai Kelola Asrama</a>
        @endguest
        @auth
            <a href="{{ route('dashboard') }}" class="hero-btn">Lanjutkan Pengelolaan</a>
        @endauth
    </div>

    <div class="container">
        <div class="profile-text">
            <h3>Tentang AsramaKu</h3>
            <p>AsramaKu adalah hunian nyaman yang mengutamakan kedisiplinan, kekeluargaan, dan transparansi. Kami berkomitmen menyediakan fasilitas terbaik bagi seluruh anggota asrama untuk mendukung aktivitas akademik maupun non-akademik.</p>
            <p>Sistem Informasi ini dibangun khusus untuk mempermudah bendahara dan pengurus asrama dalam memonitor iuran bulanan, mendata penghuni kamar, serta mencetak laporan pembayaran secara akurat dan tanpa repot mencatat di buku manual.</p>
        </div>

        <div class="features">
            <h3 style="color: #2c3e50; margin-top: 0; margin-bottom: 20px;">Fitur Sistem</h3>
            <ul>
                <li>Manajemen Data Anggota Asrama</li>
                <li>Pencatatan Riwayat Pembayaran Kas</li>
                <li>Validasi File Bukti Transfer</li>
                <li>Keamanan Autentikasi Pengurus</li>
                <li>Cetak Kwitansi Otomatis (PDF)</li>
                <li>Antarmuka Bersih dan Responsif</li>
            </ul>
        </div>
    </div>

    <footer>
        &copy; {{ date('Y') }} Sistem Informasi AsramaKu. Dibangun menggunakan Laravel.
    </footer>

</body>
</html>
