<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RisqueStraDetail2 extends Model
{
    protected $table = 'risque_stra_detail';
    protected $fillable = ['risque_stra_id', 'code', 'risque', 'mecanisme_maitrise'];

    public function risqueStra()
    {
        return $this->belongsTo(RisqueStra::class);
    }
}

