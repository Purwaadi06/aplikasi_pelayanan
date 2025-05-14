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
        Schema::create('surat_keterangan', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->unique();
            $table->string('jenis_surat'); // domisili, tidak mampu, dll
            $table->string('nik'); // FK ke penduduk
            $table->text('keperluan')->nullable();
            $table->date('tanggal');
            $table->timestamps();
    
            $table->foreign('nik')->references('FNIK')->on('tb_penduduk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan');
    }
};
