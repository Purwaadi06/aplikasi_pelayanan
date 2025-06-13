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
            $table->foreignId('rw_user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('penduduk_id')->constrained('tb_penduduk')->onDelete('cascade');
            $table->foreignId('jenis_surat_id')->constrained('tb_tipe_surat')->onDelete('cascade');
            $table->text('keperluan');
            $table->boolean('is_for_self')->default(true);

            $table->string('nama_pengajuan_lain')->nullable();
            $table->string('nik_pengajuan_lain', 16)->nullable();
            $table->string('ttl_pengajuan_lain')->nullable();
            $table->text('alamat_pengajuan_lain')->nullable();
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
