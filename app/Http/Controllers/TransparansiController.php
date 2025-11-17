<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransparansiController extends Controller
{
    /**
     * Halaman Transparansi Anggaran
     */
    public function anggaran()
    {
        return view('pages.transparansi.anggaran');
    }

    /**
     * Halaman Laporan Kegiatan
     */
    public function laporan()
    {
        return view('pages.transparansi.laporan');
    }

    /**
     * Halaman Dokumen Perencanaan
     */
    public function perencanaan()
    {
        return view('pages.transparansi.perencanaan');
    }

    /**
     * Halaman Bumdesa dan Kopdes MP
     */
    public function bumdesa()
    {
        return view('pages.transparansi.bumdesa');
    }
}
