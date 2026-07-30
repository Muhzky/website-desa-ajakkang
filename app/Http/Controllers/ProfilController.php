<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index()
{
    $data = (object) [
        'total_penduduk' => DB::table('penduduks')->count(),
        'laki_laki'      => DB::table('penduduks')->where('jenis_kelamin', 'L')->count(),
        'perempuan'      => DB::table('penduduks')->where('jenis_kelamin', 'P')->count(),
        'kepala_keluarga'=> DB::table('penduduks')->where('status_keluarga', 1)->count(),
    ];

    $profilDesa = ProfilDesa::first();

    return view('pages.profil.index', compact('data', 'profilDesa'));
}

}
