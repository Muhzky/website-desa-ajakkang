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
        Schema::create('dokumen_perencanaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen');
            $table->string('tipe')->default('UMUM');
            $table->date('tanggal');
            $table->string('file'); // path file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_perencanaans');
    }
};
