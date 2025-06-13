<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    // Tentukan kunci primer

    protected $table = 'tb_penduduk';

    // Tentukan atribut yang bisa diisi
    protected $fillable = [
        'nama',
        'nik',
        'no_kk',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pekerjaan',
        'statu_pekerjaan',
        'alamat',
        'rw_id',
        'rt_id'
    ];
}
