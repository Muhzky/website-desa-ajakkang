<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenPerencanaan extends Model
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

    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file);
    }
}
