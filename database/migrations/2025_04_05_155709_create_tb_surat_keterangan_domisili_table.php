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
        Schema::create('tb_surat_keterangan_domisili', function (Blueprint $table) {
            $table->id('FK_Id_Sket');
            $table->string('FJenis_Surat');
            $table->string('FNO_Surat');
            $table->string('FNIK');
            $table->date('FTGL_Surat');
            $table->string('FSTATUS_SURAT');
            $table->string('FNKK');
            $table->timestamps();
        
            $table->foreign('FNIK')->references('FNIK')->on('tb_penduduk');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_surat_keterangan_domisili');
    }
};
