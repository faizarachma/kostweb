<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaPemesanan extends Model
{
    use HasFactory;

    protected $table = 'kelola_pemesanan';

    protected $fillable = [
        'nama_penghuni',
        'nomor_kamar',
        'tanggal_mulai_sewa',
        'bukti_pembayaran',
        'status_pembayaran',
    ];

    public function kamar()
    {
        return $this->belongsTo(KelolaKamar::class, 'nomor_kamar', 'no_kamar');
    }

    public function notifikasi()
    {
        return $this->belongsTo(KelolaNotifikasi::class, 'tanggal_mulai_sewa', 'tanggal_mulai_sewa');
    }
}
