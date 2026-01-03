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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('keluarga_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('nik', 16)->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');

            $table->string('agama');
            $table->string('status');
            $table->string('pendidikan');
            $table->string('pekerjaan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
