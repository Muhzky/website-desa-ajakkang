<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pemerintahdesa()
    {
        return view('pages.struktur.pemerintahdesa');
    }

     public function bpd()
    {
        return view('pages.struktur.bpd');
    }

      public function pkk()
    {
        return view('pages.struktur.pkk');
    }

       public function lpm()
    {
        return view('pages.struktur.lpm');
    }

           public function karangTaruna()
    {
        return view('pages.struktur.karang-taruna');
    }

              public function posyandu()
    {
        return view('pages.struktur.posyandu');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
