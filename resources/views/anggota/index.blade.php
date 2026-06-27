@extends('layouts.master')

@section('konten')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2>Daftar Anggota Asrama</h2>
            <a href="{{ route('anggota.create') }}" class="btn btn-success">+ Tambah Anggota</a>
        </div>

        @if(session('sukses'))
            <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                {{ session('sukses') }}
            </div>
        @endif

        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: #f8f9fa; border-bottom: 2px solid #ddd;">
                    <th style="padding: 12px;">No</th>
                    <th style="padding: 12px;">Nama Lengkap</th>
                    <th style="padding: 12px;">Nomor Kamar</th>
                    <th style="padding: 12px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($anggota as $index => $a)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">{{ $index + 1 }}</td>
                        <td style="padding: 12px;">{{ $a->nama_lengkap }}</td>
                        <td style="padding: 12px;">{{ $a->nomor_kamar }}</td>
                        <td style="padding: 12px; text-align: center;">
                            <a href="{{ route('anggota.edit', $a->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('anggota.destroy', $a->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 20px;">Belum ada data anggota.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
