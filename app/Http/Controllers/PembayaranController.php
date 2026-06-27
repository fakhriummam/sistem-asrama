<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment; // Memanggil Model Pembayaran Kas (Tabel payments)
use App\Models\Member;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // HUBUNGAN KODE: Memuat data pembayaran sekaligus membawa data relasi member-nya (Eager Loading)
        $pembayaran = Payment::with('member')->orderBy('id', 'desc')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // HUBUNGAN KODE: Mengambil daftar anggota asrama untuk dijadikan pilihan dropdown di form pembayaran
        $anggota = Member::all();
        return view('pembayaran.create', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataValid = $request->validate([
            'member_id'      => 'required|exists:members,id', // Memastikan ID anggota benar-benar ada di MySQL
            'bulan_bayar'    => 'required|string',
            'nominal'        => 'required|numeric|min:1000',
            'bukti_transfer' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB, harus berupa gambar
        ]);

        // Proses upload file bukti_transfer jika ada
        if ($request->hasFile('bukti_transfer')) {
            // Menyimpan file di folder storage/app/public/bukti_transfer
            $path = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
            $dataValid['bukti_transfer'] = $path;
        }

        Payment::create($dataValid);
        return redirect()->route('pembayaran.index')->with('sukses', 'Catatan kas berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
