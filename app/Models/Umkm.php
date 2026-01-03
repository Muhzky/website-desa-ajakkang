<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'nama_toko',
        'pemilik',
        'alamat',
        'nomor_whatsapp',
    ];

    public function produks()
    {
        return $this->hasMany(ProdukUmkm::class);
    }
}
