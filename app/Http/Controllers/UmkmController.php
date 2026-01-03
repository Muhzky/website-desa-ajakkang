<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukUmkm;


class UmkmController extends Controller
{
    /**
     * Halaman UMKM Desa
     */
    public function index(Request $request)
{
    $produks = ProdukUmkm::with('umkm') // WAJIB eager loading
        ->when($request->q, function ($query) use ($request) {
            $query->where('nama_produk', 'like', '%'.$request->q.'%');
        })
        ->when($request->kategori, function ($query) use ($request) {
            $query->where('kategori', $request->kategori);
        })
        ->latest()
        ->paginate(8);

    return view('pages.umkm.index', compact('produks'));
}
}
