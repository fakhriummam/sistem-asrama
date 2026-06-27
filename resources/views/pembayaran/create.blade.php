@extends('layouts.master')

@section('konten')
    <div class="card" style="max-width: 600px;">
        <h2>Catat Pembayaran Kas Baru</h2>

        @if($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                <strong>Gagal!</strong> Harap periksa kembali inputan Anda:
                <ul style="margin: 5px 0 0 20px; padding: 0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Pilih Anggota Asrama</label>
                <select name="member_id" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="" disabled selected>-- Pilih Anggota --</option>
                    @foreach($anggota as $a)
                        <option value="{{ $a->id }}" {{ old('member_id') == $a->id ? 'selected' : '' }}>
                            {{ $a->nama_lengkap }} (Kamar: {{ $a->nomor_kamar }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Bulan Pembayaran</label>
                <select name="bulan_bayar" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="" disabled selected>-- Pilih Bulan --</option>
                    @php
                        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    @endphp
                    @foreach($months as $month)
                        <option value="{{ $month }}" {{ old('bulan_bayar') == $month ? 'selected' : '' }}>
                            {{ $month }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Nominal Iuran (Rp)</label>
                <input type="number" name="nominal" value="{{ old('nominal', 50000) }}" min="1000" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" placeholder="Contoh: 50000">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Upload Bukti Transfer (Gambar)</label>
                <input type="file" name="bukti_transfer" accept="image/*" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                <small style="color: #666; display: block; margin-top: 5px;">Format: jpeg, png, jpg, gif (Maks. 2MB)</small>
            </div>

            <button type="submit" class="btn btn-success">Simpan Pembayaran</button>
            <a href="{{ route('pembayaran.index') }}" class="btn" style="color: #555; background: #eee;">Batal</a>
        </form>
    </div>
@endsection
