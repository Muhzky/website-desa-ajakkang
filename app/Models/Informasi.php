<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasis'; // opsional, tapi aman

    protected $fillable = [
        'judul',
        'foto',
        'deskripsi',
        'tanggal',
    ];
}
