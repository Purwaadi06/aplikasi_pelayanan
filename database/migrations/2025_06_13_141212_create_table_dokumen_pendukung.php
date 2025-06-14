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
        Schema::create('tb_dokumen_pndkg', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_request_id')->constrained('tb_tipe_surat')->onDelete('cascade');
            $table->string('jenis_dokumen');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_dokumen_pndkg');
    }
};
