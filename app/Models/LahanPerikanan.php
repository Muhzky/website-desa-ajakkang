<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LahanPerikanan extends Model
{
    protected $table = 'lahan_perikanans'; // 🔴 penting jika nama tabel plural

    protected $fillable = [
        'pemilik_id',
        'kelompok_perikanan_id',
        'nama_lahan',
        'jenis_lahan',
        'luas_lahan',
        'sumber_air',
        'lokasi',
        'status_aktif',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
        'luas_lahan'   => 'float',
    ];

    /* ===================== RELATIONS ===================== */

    // Pemilik lahan (Penduduk)
    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'pemilik_id');
    }

    // Kelompok perikanan
    public function kelompokPerikanan(): BelongsTo
    {
        return $this->belongsTo(KelompokPerikanan::class, 'kelompok_perikanan_id');
    }

    // Komoditas perikanan (HAS MANY)
    public function komoditas(): HasMany
    {
        return $this->hasMany(
            KomoditasPerikanan::class,
            'lahan_perikanan_id', // 🔴 foreign key HARUS eksplisit
            'id'
        );
    }
}
