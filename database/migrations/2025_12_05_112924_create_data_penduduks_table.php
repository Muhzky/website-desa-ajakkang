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
         Schema::create('data_penduduks', function (Blueprint $table) {
            $table->id();
            $table->integer('total_penduduk')->default(0);
            $table->integer('laki_laki')->default(0);
            $table->integer('perempuan')->default(0);
            $table->integer('kepala_keluarga')->default(0);
            $table->integer('mobilitas_permanen')->default(0); // pindah menetap
            $table->integer('mutasi_penduduk')->default(0);    // datang / pergi sementara
            $table->year('tahun'); // data per tahun
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penduduks');
    }
};
