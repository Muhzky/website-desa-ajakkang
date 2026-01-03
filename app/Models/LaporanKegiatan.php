<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    protected $fillable = [
        'judul',
        'lokasi',
        'anggaran',
        'tanggal',
        'foto',
        'file_laporan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file_laporan);
    }

    public function getFotoUrlAttribute()
    {
        return $this->foto
            ? asset('storage/' . $this->foto)
            : asset('assets/img/default-kegiatan.png');
    }
}
