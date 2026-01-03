<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penduduk extends Model
{
    /* ==========================
     |  MASS ASSIGNMENT
     ========================== */

    protected $fillable = [
        'keluarga_id',
        'nik',
        'nama',
        'status_keluarga',
        'jenis_kelamin',
        'tanggal_lahir',
        'agama',
        'status',
        'pendidikan',
        'pekerjaan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /* ==========================
     |  RELATIONSHIP
     ========================== */

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class);
    }

    /* ==========================
     |  DOMAIN RULE (KUNCI UTAMA)
     ========================== */

    protected static function booted()
    {
        static::saving(function (Penduduk $penduduk) {

            // Jika penduduk dijadikan Kepala Keluarga
            if ((int) $penduduk->status_keluarga === 1) {

                Penduduk::where('keluarga_id', $penduduk->keluarga_id)
                    ->where('id', '!=', $penduduk->id)
                    ->where('status_keluarga', 1)
                    ->update([
                        'status_keluarga' => 5, // Lainnya
                    ]);
            }
        });
    }

    /* ==========================
     |  HELPER / DOMAIN METHOD
     ========================== */

    public function isKepalaKeluarga(): bool
    {
        return (int) $this->status_keluarga === 1;
    }
}
