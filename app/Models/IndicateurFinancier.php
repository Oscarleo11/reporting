<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicateurFinancier extends Model
{
    protected $fillable = [
        'debut_periode', 'fin_periode',
        'code', 'intitule', 'valeur'
    ];
}

