<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $pariwisata = Galeri::where('kategori', 'pariwisata')
            ->latest()
            ->get();

        $kegiatan = Galeri::where('kategori', 'kegiatan')
            ->latest()
            ->get();

        return view('pages.galeri.index', compact('pariwisata', 'kegiatan'));
    }
}
