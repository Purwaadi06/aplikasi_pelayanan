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
        Schema::create('tb_permintaan_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('tb_penduduk')->onDelete('cascade');
            $table->foreignId('jenis_surat_id')->constrained('tb_tipe_surat')->onDelete('cascade');
            $table->text('keperluan');
            $table->boolean('is_for_self')->default(true);
            $table->string('penduduk_lain_id')->nullable();
            $table->double('penghasilan')->nullable();
            $table->timestamp('tanggal_pengajuan')->nullable();
            $table->enum('status', ['diajukan', 'disetujui', 'ditolak', 'dicetak'])->default('diajukan');
            $table->text('catatan_admin')->nullable();
            $table->timestamp('tanggal_disetujui')->nullable();
            $table->boolean('arsipkan')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_permintaan_surat');
    }
};
