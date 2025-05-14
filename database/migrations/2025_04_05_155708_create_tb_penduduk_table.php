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
        Schema::create('tb_penduduk', function (Blueprint $table) {
            $table->string('FNIK')->primary();
            $table->string('FNO_KTP');
            $table->string('FNAMA');
            $table->string('FTMP_LAHIR');
            $table->date('FTGL_LAHIR');
            $table->string('FKEL');
            $table->string('FAGAMA');
            $table->text('FALAMAT');
            $table->string('FPENDIDIKAN');
            $table->string('FPEKERJAAN');
            $table->string('FSTATUS');
            $table->string('FSTATUS_KEL');
            $table->string('FKEWARGANEGARAAN');
            $table->string('FNAMA_AYAH');
            $table->string('FNAMA_IBU');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_penduduk');
    }
};
