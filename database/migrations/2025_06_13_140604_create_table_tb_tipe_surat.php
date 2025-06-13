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
        Schema::create('tb_tipe_surat', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['pengantar', 'keterangan']); // tambah kategori
            $table->string('nama_surat');
            $table->text('deskripsi')->nullable();
            $table->string('template_path')->nullable(); // file blade/pdf path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tipe_surat');
    }
};
