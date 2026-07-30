<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KelompokPerikanan extends Model
{
    /**
     * Nama tabel (opsional, tapi aman)
     */
    protected $table = 'kelompok_perikanans';

    /**
     * Mass assignment
     */
    protected $fillable = [
        'nama_kelompok',
        'ketua_id',
        'keterangan',
    ];

    /* ==========================
     |  RELATIONSHIP
     ========================== */

    /**
     * Ketua kelompok (Penduduk)
     */
    // App\Models\KelompokPerikanan.php

    public function ketua()
    {
        return $this->belongsTo(Penduduk::class, 'ketua_id');
    }

    public function anggota()
    {
        return $this->belongsToMany(
            \App\Models\Penduduk::class,
            'kelompok_perikanan_penduduk'
        )
            ->withPivot('jabatan')
            ->withTimestamps();
    }



    public function lahanPerikanans()
    {
        return $this->hasMany(LahanPerikanan::class);
    }
}
