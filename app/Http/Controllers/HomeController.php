<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\PemerintahDesa;
use App\Models\ProdukUmkm;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\Kontak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ===============================
        // DATA ADMINISTRASI PENDUDUK
        // ===============================
        $data = (object) [
            'total_penduduk' => Penduduk::count(),

            'laki_laki' => Penduduk::where('jenis_kelamin', 'L')->count(),

            'perempuan' => Penduduk::where('jenis_kelamin', 'P')->count(),

            'kepala_keluarga' => Penduduk::where('status_keluarga', 1)->count(),

            // Mobilitas (datang + pindah)
            'mobilitas_penduduk' => Penduduk::whereIn('status_mutasi', [
                'datang',
                'pindah'
            ])->count(),

            // Mutasi alami (lahir + meninggal)
            'mutasi_penduduk' => Penduduk::whereIn('status_mutasi', [
                'lahir',
                'meninggal'
            ])->count(),
        ];

        // ===============================
        // PROFIL DESA
        // ===============================
        $profilDesa = ProfilDesa::first();

        // ===============================
        // STRUKTUR PEMERINTAH DESA
        // ===============================
        $pemerintahDesa = PemerintahDesa::orderBy('urutan')->get();

        // ===============================
        // PRODUK UMKM
        // ===============================
        $produkUmkm = ProdukUmkm::with('umkm')
            ->latest()
            ->paginate(4);

        // ===============================
        // INFORMASI / BERITA
        // ===============================
        $informasis = Informasi::latest()->paginate(3);

        return view('home', compact(
            'data',
            'profilDesa',
            'pemerintahDesa',
            'produkUmkm',
            'informasis'
        ));
    }

    /**
     * SIMPAN PESAN KONTAK & SARAN
     */
    public function storeKontak(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'required|string|max:150',
            'message' => 'required|string',
        ]);

        Kontak::create($validated);

        return back()->with('success', 'Pesan Anda berhasil dikirim 🙏');
    }

    /**
     * Detail Berita
     */
    public function detail(string $id)
    {
        $berita = Informasi::where('id', $id)
            ->where('is_publish', true)
            ->firstOrFail();

        $beritaTerbaru = Informasi::where('id', '!=', $berita->id)
            ->where('is_publish', true)
            ->latest()
            ->take(6)
            ->get();

        return view('pages.berita.detail', compact(
            'berita',
            'beritaTerbaru'
        ));
    }
}
