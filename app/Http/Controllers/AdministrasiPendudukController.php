<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdministrasiPendudukController extends Controller
{
    public function index()
    {
        /* ===============================
        | HITUNG USIA
        =============================== */
        $today = Carbon::today();

        $usiaAnak = Penduduk::whereRaw("TIMESTAMPDIFF(YEAR, tanggal_lahir, ?) BETWEEN 0 AND 17", [$today])->count();

        $usiaDewasa = Penduduk::whereRaw("TIMESTAMPDIFF(YEAR, tanggal_lahir, ?) BETWEEN 18 AND 55", [$today])->count();

        $usiaLansia = Penduduk::whereRaw("TIMESTAMPDIFF(YEAR, tanggal_lahir, ?) >= 56", [$today])->count();

        /* ===============================
        | DATA USIA
        =============================== */
        $usia = [
            'anak'   => $usiaAnak,
            'dewasa' => $usiaDewasa,
            'lansia' => $usiaLansia,
        ];

        /* ===============================
        | DATA PEKERJAAN
        =============================== */
        $pekerjaan = Penduduk::select(
                DB::raw('pekerjaan as nama'),
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('pekerjaan')
            ->groupBy('pekerjaan')
            ->orderByDesc('total')
            ->get();

        /* ===============================
        | KIRIM KE VIEW
        =============================== */
        return view('pages.administrasi.index', compact(
            'usia',
            'pekerjaan'
        ));
    }
}
