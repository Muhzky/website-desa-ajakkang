<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bumdes extends Model
{
    protected $fillable = [
        'nama_dokumen',
        'tipe',
        'tanggal',
        'file',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /* =============================
       FILE URL
    ============================= */

    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file);
    }
}
