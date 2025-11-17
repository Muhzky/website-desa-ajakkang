<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('pages.layananpengaduan'); // atau sesuai path view-mu
    }

    public function store(Request $request)
    {
        // Validasi sederhana
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email',
            'pesan' => 'required|string',
        ]);

        // TODO: simpan ke DB atau kirim email
        // Pengaduan::create($validated);

        return back()->with('success', 'Pengaduan berhasil dikirim. Terima kasih.');
    }
}
