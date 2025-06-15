<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPermintaan extends Model
{
    protected $table = 'tb_permintaan_surat';
    protected $fillable = ['penduduk_id', 'jenis_surat_id', 'keperluan', 'is_for_self', 'nama_pengajuan_lain', 'penduduk_lain_id'];

    // public function selesai()
    // {
    //     return $this->hasOne(SuratSelesai::class, 'surat_permintaan_id');
    // }
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }
    public function tipe_surat()
    {
        return $this->belongsTo(TipeSurat::class, 'jenis_surat_id', 'id');
    }
}
