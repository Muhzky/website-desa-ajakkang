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
        Schema::create('kelompok_perikanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok');

            $table->foreignId('ketua_id')
                ->constrained('penduduks')
                ->cascadeOnDelete();

            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok_perikanans');
    }
};
