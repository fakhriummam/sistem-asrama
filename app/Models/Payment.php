<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['member_id', 'bulan_bayar', 'nominal', 'bukti_transfer'];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id'); // Pembayaran ini MILIK SATU anggota
    }
}
