<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemerintahDesa extends Model
{
    use HasFactory;

    protected $table = 'pemerintah_desas';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'urutan'
    ];

    // Scope untuk sorting berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}