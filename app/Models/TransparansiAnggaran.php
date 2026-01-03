<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TransparansiAnggaran extends Model
{
    use HasFactory;

    protected $table = 'transparansi_anggarans';

    protected $fillable = [
        'judul',
        'tahun',
        'tipe',
        'tanggal',
        'file',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'tanggal' => 'date',
    ];

    /**
     * Daftar tipe resmi APBDes
     */
    public const TIPE = [
        'APBDes Pokok',
        'APBDes Perubahan',
    ];

    /**
     * URL file (untuk lihat / unduh)
     */
    // public function getFileUrlAttribute(): string
    // {
    //     return Storage::disk('public')->url($this->file);
    // }

    /**
     * Nama file saja (UX)
     */
    public function getFileNameAttribute(): string
    {
        return basename($this->file);
    }

    /**
     * Scope filter tahun
     */
    public function scopeTahun($query, int $tahun)
    {
        return $query->where('tahun', $tahun);
    }

    /**
     * Scope filter tipe
     */
    public function scopeTipe($query, string $tipe)
    {
        return $query->where('tipe', $tipe);
    }

    /**
     * Format tanggal Indonesia
     */
    public function getTanggalFormattedAttribute(): string
    {
        return $this->tanggal
            ? $this->tanggal->translatedFormat('d F Y')
            : '-';
    }

    /**
     * URL file (untuk lihat / unduh)
     */

public function getFileUrlAttribute(): string
{
    return Storage::disk('public')->url($this->file);
}

}
