<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    // Tentukan kunci primer
    protected $primaryKey = 'FNIK';

    // Tentukan apakah kunci primer otomatis increment
    public $incrementing = false;

    // Tentukan tipe data kunci primer
    protected $keyType = 'string';

    // Tentukan nama tabel jika tidak sesuai dengan nama model
    protected $table = 'tb_penduduk';

    // Tentukan atribut yang bisa diisi
    protected $fillable = [
        'FNIK', 'FNO_KK
        ', 'FNAMA', 'FTMP_LAHIR', 'FTGL_LAHIR', 'FKEL', 
        'FAGAMA', 'FALAMAT', 'FPENDIDIKAN', 'FPEKERJAAN', 'FSTATUS', 
        'FSTATUS_KEL', 'FKEWARGANEGARAAN', 'FNAMA_AYAH', 'FNAMA_IBU'
    ];
    public function suratPermintaan()
    {
    return $this->hasMany(SuratPermintaan::class, 'nik', 'FNIK');
    }
}
