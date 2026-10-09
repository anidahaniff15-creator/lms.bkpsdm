<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelatihan');
            $table->text('deskripsi');
            $table->date('tanggal_pelaksanaan')->nullable();
            $table->string('lokasi')->default('Online / LMS BKPSDM Klaten');
            $table->integer('kuota');
            $table->string('gambar')->nullable();
            $table->string('materi')->nullable();
            $table->string('link_pretest')->nullable();
            $table->string('link_posttest')->nullable();
            $table->string('link_evaluasi')->nullable();
            $table->enum('status', ['buka', 'tutup'])->default('buka');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelatihans');
    }
};