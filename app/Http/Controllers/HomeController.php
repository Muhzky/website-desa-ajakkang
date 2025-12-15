<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\PemerintahDesa;


class HomeController extends Controller
{
    public function index()
    {
        // Data Penduduk
        $data = DataPenduduk::latest()->first();

        if (!$data) {
            $data = (object)[
                'total_penduduk' => 0,
                'laki_laki' => 0,
                'perempuan' => 0,
                'kepala_keluarga' => 0,
                'mobilitas_nonpermanen' => 0,
                'mutasi_penduduk' => 0,
            ];
        }

        // Data Pemerintah Desa
        $pemerintahDesa = PemerintahDesa::ordered()->get();

        return view('home', compact('data', 'pemerintahDesa'));
    }


    public function home()
    {
        $data = DataPenduduk::latest()->first();

        return view('home', compact('data'));
    }
}
