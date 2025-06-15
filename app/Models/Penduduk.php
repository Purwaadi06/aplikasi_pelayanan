<?php

namespace App\Models;

use App\Traits\TraitsHashids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    use TraitsHashids;

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
        'status_perkawinan',
        'alamat',
        'rw_id',
        'rt_id'
    ];
    protected $casts = [
        'tanggal_lahir' => 'date'
    ];
    public function rt()
    {
        return $this->belongsTo(RT::class, 'rt_id', 'id');
    }
}
