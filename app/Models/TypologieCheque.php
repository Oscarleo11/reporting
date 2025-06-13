<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypologieCheque extends Model
{
    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'code',
        'description',
        'nbcheque',
        'totalcheque',
    ];
}

