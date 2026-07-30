<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelompok_tani_penduduk', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kelompok_tani_id')
                ->constrained('kelompok_tanis')
                ->cascadeOnDelete();

            $table->foreignId('penduduk_id')
                ->constrained('penduduks')
                ->cascadeOnDelete();

            $table->string('jabatan')->nullable(); // Anggota, Sekretaris, dll

            $table->timestamps();

            $table->unique(['kelompok_tani_id', 'penduduk_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelompok_tani_penduduk');
    }
};
