<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TarificationChequeCarte extends Model
{

    protected $casts = [
        'type' => 'string',
    ];
    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'type',
        'code',
        'coutminimum',
    ];
}

