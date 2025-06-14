<?php

namespace App\Models;

use App\Traits\TraitsHashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RT extends Model
{
    use HasFactory;
    use TraitsHashids;
    protected $table = "tb_rt";

    protected $fillable = ['nama_rt', 'rw_id'];
    public function rw()
    {
        return $this->belongsTo(RW::class, 'rw_id', 'id');
    }
}
