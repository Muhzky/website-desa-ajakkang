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
        Schema::create('rekap_keuangans', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->bigInteger('pemasukan')->default(0);
            $table->bigInteger('pengeluaran')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_keuangans');
    }
};
