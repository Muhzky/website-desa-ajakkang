<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KomoditasPertanian extends Model
{
    /**
     * ==========================
     * TABLE NAME
     * ==========================
     */
    protected $table = 'komoditas_pertanians';

    /**
     * ==========================
     * MASS ASSIGNMENT
     * ==========================
     */
    protected $fillable = [
        'nama_komoditas',
        'jenis_tanaman',
        'musim_tanam',
        'estimasi_panen_hari',
        'rata_hasil_panen',
        'satuan_hasil',
        'keterangan',
        'is_active',
    ];


    /**
     * ==========================
     * CASTS
     * ==========================
     */
    protected $casts = [
        'estimasi_panen_hari' => 'integer',
        'rata_hasil_panen' => 'decimal:2',
        'is_active' => 'boolean',
    ];


    /**
     * ==========================
     * RELATIONSHIP
     * ==========================
     */

    /**
     * Komoditas dimiliki oleh satu lahan pertanian
     */
    public function lahanPertanian(): BelongsTo
    {
        return $this->belongsTo(LahanPertanian::class);
    }

    /**
     * ==========================
     * ACCESSOR (OPSIONAL)
     * ==========================
     */

    /**
     * Contoh: "Padi (2x / tahun)"
     */
    public function getLabelAttribute(): string
    {
        return "{$this->nama_komoditas} ({$this->frekuensi_panen})";
    }

    public function lahanPertanians(): BelongsToMany
    {
        return $this->belongsToMany(
            LahanPertanian::class,
            'komoditas_pertanian_lahan',
            'komoditas_pertanian_id',
            'lahan_pertanian_id'
        )->withTimestamps();
    }

    public function kelompokTani()
{
    return $this->belongsTo(KelompokTani::class, 'kelompok_tani_id');
}

}
