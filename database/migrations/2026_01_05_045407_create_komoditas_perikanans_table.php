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
        Schema::create('komoditas_perikanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lahan_perikanan_id')->constrained()->cascadeOnDelete();

            $table->string('nama_komoditas'); // 🔥 WAJIB
            $table->enum('jenis', ['Air Tawar', 'Air Payau', 'Air Laut']);
            $table->string('musim_tebar')->nullable();
            $table->integer('estimasi_panen_hari')->nullable();
            $table->decimal('rata_rata_hasil', 8, 2)->nullable(); // kg
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komoditas_perikanans');
    }
};
