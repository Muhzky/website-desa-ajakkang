<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // validasi & simpan logika
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        // contoh: kirim email, simpan ke tabel, dll.
        // Contact::create($validated);

        return back()->with('success', 'Terima kasih, pesan Anda telah terkirim.');
    }
}
