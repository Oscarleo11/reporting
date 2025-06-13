<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmissionCarte extends Model
{
    protected $fillable = [
        'debut_periode', 'fin_periode', 'totalcarte',
        'codefamille', 'codetype', 'description', 'nbcarte'
    ];
}

