<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JenisOlahraga;

class JadwalOlahraga extends Model
{
    protected $table = 'jadwal_olahraga';
    protected $guarded = [];

    public function olahraga()
    {
        return $this->belongsTo(JenisOlahraga::class, 'olahraga_id');
    }
}
