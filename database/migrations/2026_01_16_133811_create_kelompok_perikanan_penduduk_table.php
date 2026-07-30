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
        Schema::create('kelompok_perikanan_penduduk', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kelompok_perikanan_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('penduduk_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('jabatan')->default('Anggota');

            $table->timestamps();

            // ⬇️ INI YANG DIPERBAIKI
            $table->unique(
                ['kelompok_perikanan_id', 'penduduk_id'],
                'kp_penduduk_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok_perikanan_penduduk');
    }
};
