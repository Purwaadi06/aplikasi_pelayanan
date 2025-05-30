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
    Schema::create('surat_permintaan', function (Blueprint $table) {
        $table->id();
        $table->string('nik');
        $table->string('jenis_surat');
        $table->text('keperluan');
        $table->enum('status', ['diproses', 'selesai'])->default('diproses');
        $table->timestamps();
        // Foreign key constraint
        $table->foreign('nik')->references('FNIK')->on('tb_penduduk')->onDelete('cascade');
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_permintaan');
    }
};
