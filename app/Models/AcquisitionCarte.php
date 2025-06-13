<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcquisitionCarte extends Model
{
    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'code_type',
        'tarif',
        'plafond_rechargement',
        'plafond_retrait_journalier',
    ];
}
