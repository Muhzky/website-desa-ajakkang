<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor_hp',
        'kategori',
        'isi_pengaduan',
        'foto_bukti',
        'status',
    ];
}
