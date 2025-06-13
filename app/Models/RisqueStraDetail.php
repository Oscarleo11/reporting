<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RisqueStraDetail extends Model
{
    protected $table = 'details_risques_stras';

    protected $fillable = [
        'risque_stra_id',
        'code',
        'risque',
        'mecanisme_maitrise',
    ];

    public function risqueStra()
    {
        return $this->belongsTo(RisqueStra::class);
    }
}

