<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeterangan extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan';

    protected $fillable = [
        'no_surat',
        'jenis_surat',
        'nik',
        'keperluan',
        'tanggal',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik', 'FNIK');
    }
}
