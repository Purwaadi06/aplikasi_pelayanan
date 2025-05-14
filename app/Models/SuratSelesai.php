<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratSelesai extends Model
{
    protected $table = 'surat_selesai';
    protected $fillable = ['surat_permintaan_id', 'tanggal_selesai', 'file_surat'];

    public function permintaan()
    {
        return $this->belongsTo(SuratPermintaan::class, 'surat_permintaan_id');
    }
}
