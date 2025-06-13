<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;
    protected $table = "tb_rt";

    protected $fillable = ['nama_rt', 'rw_id'];
    public function rw()
    {
        return $this->belongsTo(RW::class, 'rw_id', 'id');
    }
}
