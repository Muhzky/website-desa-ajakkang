<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Penduduk;
use App\Models\LahanPertanian;
use Illuminate\Database\Eloquent\Relations\HasMany;


class KelompokTani extends Model
{
    protected $fillable = [
        'nama_kelompok',
        'ketua_id',
        'keterangan',
    ];

    // ✅ INI WAJIB ADA
    public function ketua(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'ketua_id');
    }

    // anggota (pivot)
    public function anggota()
    {
        return $this->belongsToMany(
            Penduduk::class,
            'kelompok_tani_penduduk'
        )
            ->withPivot('jabatan')   // ⬅️ INI KUNCINYA
            ->withTimestamps();
    }



    public function lahanPertanians(): HasMany
    {
        return $this->hasMany(LahanPertanian::class);
    }

    public function komoditasPertanian()
{
    return $this->hasMany(KomoditasPertanian::class, 'kelompok_tani_id');
}

}
