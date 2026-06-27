@extends('layouts.master')

@section('konten')
    <div class="card" style="max-width: 600px;">
        <h2>Edit Data Anggota</h2>

        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT') <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ $anggota->nama_lengkap }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Nomor Kamar</label>
                <input type="text" name="nomor_kamar" value="{{ $anggota->nomor_kamar }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <button type="submit" class="btn btn-warning">Update Data</button>
            <a href="{{ route('anggota.index') }}" class="btn" style="color: #555; background: #eee;">Batal</a>
        </form>
    </div>
@endsection
