<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    /**
     * Nama tabel (opsional, tapi eksplisit lebih aman)
     */
    protected $table = 'profil_desas';

    /**
     * Mass assignment
     */
    protected $fillable = [
        'sub_judul',
        'sejarah',
        'visi',
        'misi',
    ];

    /**
     * Disable multiple records logic (opsional helper)
     * Biar secara konsep ini dianggap SINGLE DATA
     */
    public static function getSingle()
    {
        return static::firstOrCreate([]);
    }
}
