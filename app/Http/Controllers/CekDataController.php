<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class CekDataController extends Controller
{
    public function index(Request $request)
    {
        $keyword = trim($request->keyword);

        // Jika belum ada input, hanya tampilkan form
        if (!$keyword) {
            return view('pages.layanan.cek-data');
        }

        $penduduk = Penduduk::query()
            ->where('nik', $keyword) // prioritas NIK
            ->orWhere('nama', 'LIKE', "%{$keyword}%")
            ->first();

        return view('pages.layanan.cek-data', compact('penduduk'));
    }
}
