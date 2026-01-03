<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapKeuangan extends Model
{
    use HasFactory;

    protected $table = 'rekap_keuangans';

    protected $fillable = [
        'tahun',
        'pemasukan',
        'pengeluaran',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'pemasukan' => 'integer',
        'pengeluaran' => 'integer',
    ];

    /**
     * Atribut virtual: Surplus / Defisit
     */
    protected $appends = ['surplus'];

    public function getSurplusAttribute(): int
    {
        return ($this->pemasukan ?? 0) - ($this->pengeluaran ?? 0);
    }

    /**
     * Scope filter tahun
     */
    public function scopeTahun($query, $tahun)
    {
        return $query->where('tahun', $tahun);
    }

    /**
     * Format Rupiah (helper)
     */
    public function formatRupiah($value): string
    {
        return 'Rp' . number_format($value, 0, ',', '.');
    }

    public function getPemasukanFormattedAttribute(): string
    {
        return $this->formatRupiah($this->pemasukan);
    }

    public function getPengeluaranFormattedAttribute(): string
    {
        return $this->formatRupiah($this->pengeluaran);
    }

    public function getSurplusFormattedAttribute(): string
    {
        return $this->formatRupiah($this->surplus);
    }
}
