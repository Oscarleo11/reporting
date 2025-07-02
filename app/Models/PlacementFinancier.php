<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlacementFinancier extends Model
{
    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'depotavue',
        'depotaterme',
        'titreacquis',
        'total',
    ];
}
