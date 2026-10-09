<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('pelatihan_id')->constrained('pelatihans')->onDelete('cascade');
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->boolean('is_pretest_selesai')->default(false);
            $table->boolean('is_posttest_selesai')->default(false);
            $table->boolean('is_evaluasi_selesai')->default(false);
            $table->string('sertifikat')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};