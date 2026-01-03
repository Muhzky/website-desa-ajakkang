<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\View\View;

class BeritaController extends Controller
{
    public function index(): View
    {
        $beritas = Informasi::latest()->paginate(6);
        return view('pages.berita.index', compact('beritas'));
        
    }

    public function detail($id)
    {
        // Ambil berita yang sedang dibuka
        $berita = Informasi::findOrFail($id);

        // Ambil 5 berita terbaru (selain berita yang sedang dibuka)
        $beritaTerbaru = Informasi::where('id', '!=', $id)
                                  ->orderBy('tanggal', 'desc')
                                  ->take(5)
                                  ->get();

        // Kirim data ke view
        return view('pages.berita.detail', [
            'beritas' => $berita,
            'beritaTerbaru' => $beritaTerbaru,
        ]);
    }
    
}
