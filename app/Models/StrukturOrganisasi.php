<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    protected $table = 'struktur_organisasi';

    protected $fillable = [
        'nama',
        'slug',
        'gambar',
    ];


    public function posyandu()
    {
        $strukturPosyandu = StrukturOrganisasi::where('slug', 'posyandu')->get();

        return view('pages.struktur.posyandu', compact('strukturPosyandu'));
    }
}
