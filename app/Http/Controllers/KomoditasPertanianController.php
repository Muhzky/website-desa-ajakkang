<?php

namespace App\Http\Controllers;

use App\Models\KomoditasPertanian;
use App\Models\KelompokTani;
use Illuminate\Http\Request;

class KomoditasPertanianController extends Controller
{
    /**
     * Halaman Pertanian (Komoditas & Kelompok)
     */
    public function index(Request $request)
    {
        $q = $request->q;

        // ================= KOMODITAS =================
        $komoditas = KomoditasPertanian::with('kelompokTani')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('nama_komoditas', 'like', "%{$q}%")
                        ->orWhere('jenis_tanaman', 'like', "%{$q}%");
                });
            })
            ->orderBy('nama_komoditas')
            ->paginate(10)
            ->withQueryString();

        // ================= KELOMPOK PERTANIAN =================
        $kelompok = KelompokTani::with('anggota')
            ->orderBy('nama_kelompok')
            ->paginate(6)
            ->withQueryString();

        return view('pages.pertanian.index', compact(
            'komoditas',
            'kelompok'
        ));
    }
}
