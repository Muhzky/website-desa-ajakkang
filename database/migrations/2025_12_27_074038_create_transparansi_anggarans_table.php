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
        Schema::create('transparansi_anggarans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->year('tahun');
            $table->enum('tipe', ['APBDes Pokok', 'APBDes Perubahan']);
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
        Schema::dropIfExists('transparansi_anggarans');
    }
};
