<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'kategori',
        'nama',
        'foto',
        'alamat_wisata',
        'maps_url',
        'deskripsi',
        'tanggal_kegiatan',
    ];
}
