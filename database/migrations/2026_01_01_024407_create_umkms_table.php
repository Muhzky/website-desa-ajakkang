<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->string('pemilik')->nullable();
            $table->text('alamat');
            $table->string('nomor_whatsapp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('umkms');
    }
};