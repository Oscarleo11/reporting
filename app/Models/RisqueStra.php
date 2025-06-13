<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RisqueStra extends Model
{
    protected $table = 'risques_stras';

    protected $fillable = ['debut_periode', 'fin_periode', 'nb_risque'];

    public function details()
    {
        return $this->hasMany(RisqueStraDetail::class);
    }
}

