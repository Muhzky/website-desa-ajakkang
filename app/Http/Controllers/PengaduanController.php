<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'kategori' => 'required',
            'isi_pengaduan' => 'required',
            'foto_bukti' => 'nullable|image|max:5120',
        ]);

        $foto = null;
        if ($request->hasFile('foto_bukti')) {
            $foto = $request->file('foto_bukti')
                ->store('pengaduan', 'public');
        }

        Pengaduan::create([
            'nama' => $request->nama,
            'nomor_hp' => $request->nomor_hp,
            'kategori' => $request->kategori,
            'isi_pengaduan' => $request->isi_pengaduan,
            'foto_bukti' => $foto,
        ]);

        return back()->with('success', 'Pengaduan berhasil dikirim');
    }
}
