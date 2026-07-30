<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggota_kelompok_tani', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kelompok_tani_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('penduduk_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('jabatan')->default('Anggota');
            // Anggota / Sekretaris / Bendahara

            $table->timestamps();

            $table->unique(['kelompok_tani_id', 'penduduk_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_kelompok_tani');
    }
};
