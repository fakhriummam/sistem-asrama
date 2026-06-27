<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Kas Asrama</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; display: flex; background: #ecf0f1; }
        .sidebar { width: 250px; background: #2c3e50; color: white; min-height: 100vh; padding: 20px; }
        .sidebar a { color: white; text-decoration: none; display: block; margin-bottom: 15px; padding: 10px; border-radius: 4px; }
        .sidebar a:hover { background: #34495e; }
        .main { flex: 1; display: flex; flex-direction: column; }
        .navbar { background: white; padding: 15px 20px; display: flex; justify-content: flex-end; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .content { padding: 20px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .btn { padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; color: white; display: inline-block; }
        .btn-primary { background: #3498db; }
        .btn-success { background: #2ecc71; }
        .btn-danger { background: #e74c3c; }
        .btn-warning { background: #f1c40f; color: black; }
    </style>
</head>
<body>

    @include('layouts.sidebar')

    <div class="main">
        @include('layouts.navbar')

        <div class="content">
            @yield('konten')
        </div>
    </div>

</body>
</html>
