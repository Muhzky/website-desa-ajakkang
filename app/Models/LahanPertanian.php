<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class LahanPertanian extends Model
{
    protected $fillable = [
        'pemilik_id',
        'kelompok_tani_id',
        'nama_lahan',
        'jenis_lahan',
        'luas_lahan',
        'status_kepemilikan',
        'lokasi',
        'status_aktif',
    ];

    public function pemilik()
    {
        return $this->belongsTo(Penduduk::class, 'pemilik_id');
    }

    public function kelompokTani()
    {
        return $this->belongsTo(KelompokTani::class);
    }
    public function komoditas(): BelongsToMany
{
    return $this->belongsToMany(
        KomoditasPertanian::class,
        'komoditas_pertanian_lahan',
        'lahan_pertanian_id',
        'komoditas_pertanian_id'
    )->withTimestamps();
}

}