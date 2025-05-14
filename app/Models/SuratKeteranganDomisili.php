<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganDomisili extends Model
{
    use HasFactory;

    protected $table = 'tb_surat_keterangan_domisili';
    protected $primaryKey = 'FK_id_Surat';
    public $incrementing = false;
    protected $keyType = 'string'; // atau 'int' jika numerik

    protected $fillable = [
        'Fjenis_Surat',
        'FNO_Surat',
        'FNIK',
        'FTGL_Surat',
        'FSTATUS_Surat',
    ];
}
