<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('anggota_kelompok_perikanan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kelompok_perikanan_id')
                ->constrained('kelompok_perikanans')
                ->cascadeOnDelete();

            $table->foreignId('penduduk_id')
                ->constrained('penduduks')
                ->cascadeOnDelete();

            $table->string('jabatan')->default('Anggota');

            $table->timestamps();

            // 👇 index pendek (FIX ERROR)
            $table->unique(
                ['kelompok_perikanan_id', 'penduduk_id'],
                'uk_kelompok_perikanan_penduduk'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_kelompok_perikanan');
    }
};
