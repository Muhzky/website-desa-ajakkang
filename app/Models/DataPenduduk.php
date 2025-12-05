<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;

    protected $table = 'data_penduduks'; // nama tabel

    protected $fillable = [
        'tahun',
        'total_penduduk',
        'laki_laki',
        'perempuan',
        'kepala_keluarga',
        'mobilitas_permanen',
        'mutasi_penduduk',
    ];
}
