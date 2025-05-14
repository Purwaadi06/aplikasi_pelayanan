<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPermintaan extends Model
{
    protected $table = 'surat_permintaan';
    protected $fillable = ['nik', 'jenis_surat', 'keperluan', 'status'];

    public function selesai()
    {
        return $this->hasOne(SuratSelesai::class, 'surat_permintaan_id');
    }
}
