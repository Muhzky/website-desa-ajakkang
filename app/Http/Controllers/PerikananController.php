<?php

namespace App\Http\Controllers;

use App\Models\KomoditasPerikanan;
use App\Models\KelompokPerikanan;
use Illuminate\Http\Request;

class PerikananController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;

        // ======================
        // KOMODITAS PERIKANAN
        // ======================
        $komoditas = KomoditasPerikanan::when($q, function ($query) use ($q) {
                $query->where('nama_komoditas', 'like', "%{$q}%")
                      ->orWhere('jenis', 'like', "%{$q}%");
            })
            ->orderBy('nama_komoditas')
            ->paginate(6);

        // ======================
        // KELOMPOK PERIKANAN
        // ======================
        $kelompok = KelompokPerikanan::with(['anggota', 'ketua'])
            ->orderBy('nama_kelompok')
            ->paginate(6);

        return view('pages.perikanan.index', compact('komoditas', 'kelompok'));
    }
}
