<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['nama_lengkap', 'nomor_kamar'];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'member_id'); // Satu anggota punya BANYAK pembayaran
    }
}
