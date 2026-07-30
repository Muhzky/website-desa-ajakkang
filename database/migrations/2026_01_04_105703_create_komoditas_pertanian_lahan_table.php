<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komoditas_pertanian_lahan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lahan_pertanian_id')
                ->constrained('lahan_pertanians')
                ->cascadeOnDelete();

            $table->foreignId('komoditas_pertanian_id')
                ->constrained('komoditas_pertanians')
                ->cascadeOnDelete();

            $table->timestamps();

            // ⬇️ NAMA INDEX DIPERSINGKAT (INI KUNCI)
            $table->unique(
                ['lahan_pertanian_id', 'komoditas_pertanian_id'],
                'lahan_komoditas_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komoditas_pertanian_lahan');
    }
};
