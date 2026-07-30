<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Keluarga;
use App\Models\LahanPertanian;
use App\Models\KelompokTani;
use App\Models\LahanPerikanan;
use App\Models\KelompokPerikanan;

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
        'status_mutasi', // ✅ TAMBAH
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
     |  DOMAIN RULE
     ========================== */

    protected static function booted()
    {
        static::saving(function (Penduduk $penduduk) {

            // Jika dijadikan Kepala Keluarga
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

    public function lahanPertanians()
    {
        return $this->hasMany(LahanPertanian::class, 'pemilik_id');
    }

    public function kelompokTaniDipimpin()
    {
        return $this->hasMany(KelompokTani::class, 'ketua_id');
    }

    public function kelompokTani()
    {
        return $this->belongsToMany(
            KelompokTani::class,
            'anggota_kelompok_tani'
        )->withPivot('jabatan')->withTimestamps();
    }

    /* ==========================
     |  HELPER / DOMAIN METHOD
     ========================== */

    public function isKepalaKeluarga(): bool
    {
        return (int) $this->status_keluarga === 1;
    }

    public function isAktif(): bool
    {
        return $this->status_mutasi === 'tetap';
    }

    public function isMobilitas(): bool
    {
        return in_array($this->status_mutasi, ['datang', 'pindah']);
    }

    public function isMutasi(): bool
    {
        return in_array($this->status_mutasi, ['lahir', 'meninggal']);
    }


    public function lahanPerikanans()
{
    return $this->hasMany(LahanPerikanan::class, 'pemilik_id');
}

public function kelompokPerikanan()
{
    return $this->belongsToMany(
        KelompokPerikanan::class,
        'kelompok_perikanan_penduduk'
    )->withPivot('jabatan')->withTimestamps();
}
}
