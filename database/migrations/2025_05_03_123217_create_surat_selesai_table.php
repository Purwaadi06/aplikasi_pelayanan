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
        Schema::create('surat_selesai', function (Blueprint $table) {
            $table->unsignedBigInteger('surat_permintaan_id');
            $table->date('tanggal_selesai');
            $table->string('file_surat')->nullable(); // jika ada PDF atau cetakan surat
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_selesai');
    }
};
