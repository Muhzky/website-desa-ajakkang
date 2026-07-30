<?php

// App\Models\KomoditasPerikanan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomoditasPerikanan extends Model
{
    protected $fillable = [
        'lahan_perikanan_id',
        'nama_komoditas',
        'jenis',
        'musim_tebar',
        'estimasi_panen_hari',
        'rata_rata_hasil',
        'is_active',
    ];

    public function lahanPerikanan()
    {
        return $this->belongsTo(LahanPerikanan::class);
    }

    public function komoditas()
{
    return $this->hasMany(KomoditasPerikanan::class);
}

}

