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
        Schema::create('tb_surat_keterangan_tidak_mampu', function (Blueprint $table) {
            $table->id('FK_Id_Sktm');
            $table->string('FJenis_Surat');
            $table->string('FNo_Surat');
            $table->string('FNIK');
            $table->string('FNOKK');
            $table->date('FTGL_Surat');
            $table->string('FSTATUS_SURAT');
            $table->timestamps();
        
            $table->foreign('FNIK')->references('FNIK')->on('tb_penduduk');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_surat_keterangan_tidak_mampu');
    }
};
