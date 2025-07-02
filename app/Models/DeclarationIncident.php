<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeclarationIncident extends Model
{
    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'elements_constitutifs',
        'incidents',
        'captures',
    ];

    protected $casts = [
        'elements_constitutifs' => 'array',
        'incidents' => 'array',
        'captures' => 'array',
    ];
}

