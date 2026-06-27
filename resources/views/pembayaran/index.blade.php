@extends('layouts.master')

@section('konten')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2>Rekap Pembayaran Kas Asrama</h2>
            <a href="{{ route('pembayaran.create') }}" class="btn btn-success">+ Catat Pembayaran</a>
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
                    <th style="padding: 12px;">Nama Anggota</th>
                    <th style="padding: 12px;">Nomor Kamar</th>
                    <th style="padding: 12px;">Bulan Bayar</th>
                    <th style="padding: 12px;">Nominal (Rp)</th>
                    <th style="padding: 12px; text-align: center;">Status Bukti</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pembayaran as $index => $p)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">{{ $index + 1 }}</td>
                        <td style="padding: 12px;">{{ $p->member->nama_lengkap ?? 'Anggota Terhapus' }}</td>
                        <td style="padding: 12px;">{{ $p->member->nomor_kamar ?? '-' }}</td>
                        <td style="padding: 12px;">{{ $p->bulan_bayar }}</td>
                        <td style="padding: 12px;">Rp {{ number_format($p->nominal, 0, ',', '.') }}</td>
                        <td style="padding: 12px; text-align: center;">
                            @if($p->bukti_transfer)
                                <a href="{{ asset('storage/' . $p->bukti_transfer) }}" target="_blank" style="color: #3498db; text-decoration: none; font-weight: bold;">Lihat Bukti</a>
                            @else
                                <span style="color: #95a5a6; font-style: italic;">Tidak Ada Bukti</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 20px;">Belum ada catatan pembayaran kas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
