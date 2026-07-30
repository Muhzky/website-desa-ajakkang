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
        Schema::create('lahan_pertanians', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pemilik_id')
                ->constrained('penduduks')
                ->cascadeOnDelete();

            $table->foreignId('kelompok_tani_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('nama_lahan');
            $table->string('jenis_lahan');
            $table->decimal('luas_lahan', 8, 2);
            $table->string('status_kepemilikan');
            $table->string('lokasi')->nullable();

            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lahan_pertanians');
    }
};
