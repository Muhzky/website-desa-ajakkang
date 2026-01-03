<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukUmkm extends Model
{
    protected $fillable = [
        'umkm_id',
        'foto_produk',
        'nama_produk',
        'kategori',
        'harga',
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
