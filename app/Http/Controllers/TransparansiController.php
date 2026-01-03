<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekapKeuangan;
use App\Models\TransparansiAnggaran;
use App\Models\LaporanKegiatan;
use App\Models\DokumenPerencanaan;
use Illuminate\Support\Facades\Response;
use App\Models\Bumdes;

class TransparansiController extends Controller
{
    /**
     * Halaman Transparansi Anggaran
     */
    public function anggaran(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return view('pages.transparansi.anggaran', [
            'tahun' => $tahun,

            // Dropdown tahun
            'daftarTahun' => RekapKeuangan::orderBy('tahun', 'desc')
                ->pluck('tahun'),

            // Rekap keuangan
            'rekap' => RekapKeuangan::where('tahun', $tahun)->first(),

            // File anggaran
            'anggarans' => TransparansiAnggaran::where('tahun', $tahun)
                ->orderBy('tanggal', 'desc')
                ->paginate(6),
        ]);
    }

    /**
     * Halaman Laporan Kegiatan
     */
    public function laporan()
    {
        $laporans = LaporanKegiatan::latest()->paginate(6); // ⬅️ 6 per halaman

        return view('pages.transparansi.laporan-kegiatan', compact('laporans'));
    }

    /**
     * Download file laporan kegiatan
     */
    public function downloadLaporan($filename)
    {
        $path = storage_path('app/public/laporan-kegiatan/file/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->download($path);
    }


    /**
     * Halaman Dokumen Perencanaan
     */
    public function perencanaan()
    {
        $documents = DokumenPerencanaan::orderBy('tanggal', 'desc') ->paginate(6);

        return view('pages.transparansi.perencanaan', compact('documents'));
    }

        /**
     * Download file Perencanaan
     */
    public function downloadPerencanaan($filename)
    {
        $path = storage_path('app/public/dokumen-perencanaan/file/' . $filename);
        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->download($path);
    }

    /**
     * Preview file Perencanaan
     */

    public function previewPerencanaan($filename)
    {
        $path = storage_path('app/public/dokumen-perencanaan/' . $filename);

        abort_unless(file_exists($path), 404);

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }

    public function bumdesa()
    {
        $documents = Bumdes::latest('tanggal')->paginate(6);

        return view('pages.transparansi.bumdesa', compact('documents'));
    }

    /**
     * Download file Bumdes
     */
    public function downloadBumdes($filename)
    {
        $path = storage_path('app/public/bumdes/file/' . $filename);

        abort_unless(file_exists($path), 404, 'File tidak ditemukan');

        return response()->download($path);
    }

    /**
     * Preview file Bumdes (PDF)
     */
}
