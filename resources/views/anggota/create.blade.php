@extends('layouts.master')

@section('konten')
    <div class="card" style="max-width: 600px;">
        <h2>Tambah Anggota Asrama Baru</h2>

        @if($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                <strong>Gagal!</strong> Harap periksa kembali inputan Anda.
            </div>
        @endif

        <form action="{{ route('anggota.store') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" placeholder="Contoh: Budi Santoso">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Nomor Kamar</label>
                <input type="text" name="nomor_kamar" value="{{ old('nomor_kamar') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" placeholder="Contoh: A-102">
            </div>

            <button type="submit" class="btn btn-success">Simpan Data</button>
            <a href="{{ route('anggota.index') }}" class="btn" style="color: #555; background: #eee;">Batal</a>
        </form>
    </div>
@endsection
