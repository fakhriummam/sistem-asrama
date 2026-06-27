<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menyuruh Model 'Member' mengambil semua data dari database urut dari yang terbaru
        $anggota = Member::orderBy('id', 'desc')->get();
        // HUBUNGAN KODE: Mengirim data $anggota ke file view 'resources/views/anggota/index.blade.php'
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // HUBUNGAN KODE: Membuka file view di 'resources/views/anggota/create.blade.php'
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi server-side: Memastikan user tidak mengosongkan inputan di form
        $dataValid = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_kamar'  => 'required|string|max:50',
        ]);

        // HUBUNGAN KODE: Menyuruh Model 'Member' memasukkan data yang lolos validasi ke MySQL
        Member::create($dataValid);

        // Melempar kembali user ke halaman tabel utama dengan membawa pesan sukses kilat (session flash)
        return redirect()->route('anggota.index')->with('sukses', 'Anggota baru asrama berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mencari 1 data anggota berdasarkan ID penunjuk di URL. Jika tidak ada, otomatis memicu eror 404
        $anggota = Member::findOrFail($id);

        return view('anggota.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = Member::findOrFail($id);

        // HUBUNGAN KODE: Membuka 'resources/views/anggota/edit.blade.php' sambil membawa data lama
        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $anggota = Member::findOrFail($id);

        // Validasi data baru hasil editan user
        $dataValid = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_kamar'  => 'required|string|max:50',
        ]);

        // HUBUNGAN KODE: Memperbarui baris data di database menggunakan data baru yang valid
        $anggota->update($dataValid);

        return redirect()->route('anggota.index')->with('sukses', 'Data anggota berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Member::findOrFail($id);

        // HUBUNGAN KODE: Menghapus data dari MySQL. Karena di migration disetel 'onDelete(cascade)',
        // seluruh catatan pembayaran kas atas nama anggota ini di tabel sebelah akan otomatis ikut terhapus!
        $anggota->delete();

        return redirect()->route('anggota.index')->with('sukses', 'Data anggota sukses dihapus dari asrama.');
    }
}
