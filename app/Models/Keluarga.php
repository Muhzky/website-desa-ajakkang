<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $fillable = ['no_kk', 'alamat', 'rt', 'rw'];
    protected $with = ['penduduks'];


    public function penduduks()
    {
        return $this->hasMany(Penduduk::class);
    }

}
