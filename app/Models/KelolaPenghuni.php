<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaPenghuni extends Model
{
    use HasFactory;

    protected $table = 'kelola_penghuni';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'no_whatsapp',
        'tanggal_lahir',
        'alamat',
    ];
}
