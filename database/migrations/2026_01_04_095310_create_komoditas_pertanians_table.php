<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komoditas_pertanians', function (Blueprint $table) {
            $table->id();

            $table->string('nama_komoditas');
            $table->enum('jenis_tanaman', [
                'Pangan',
                'Hortikultura',
                'Perkebunan'
            ]);

            $table->string('musim_tanam')->nullable(); 
            $table->integer('estimasi_panen_hari')->nullable(); // hari
            $table->decimal('rata_hasil_panen', 8, 2)->nullable(); // ton/ha atau kg/ha
            $table->string('satuan_hasil')->default('Kg');

            $table->text('keterangan')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komoditas_pertanians');
    }
};
