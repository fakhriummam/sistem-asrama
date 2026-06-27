@extends('layouts.master')

@section('konten')
    <div class="card">
        <h2>Selamat Datang di Sistem Informasi Kas Asrama</h2>
        <p>Gunakan menu di sebelah kiri untuk mengelola data anggota dan mencatat pembayaran kas bulanan.</p>
        <hr style="border: 1px solid #eee; margin: 20px 0;">
        <div style="display: flex; gap: 20px;">
            <div style="background: #3498db; color: white; padding: 20px; border-radius: 8px; flex: 1;">
                <h3>Kelola Anggota</h3>
                <a href="{{ route('anggota.index') }}" style="color: white;">Lihat Data ➔</a>
            </div>
            <div style="background: #2ecc71; color: white; padding: 20px; border-radius: 8px; flex: 1;">
                <h3>Catat Pembayaran</h3>
                <a href="{{ route('pembayaran.index') }}" style="color: white;">Buka Rekap ➔</a>
            </div>
        </div>
    </div>
@endsection
