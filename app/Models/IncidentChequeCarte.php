<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentChequeCarte extends Model
{
    protected $fillable = [
        'debut_periode', 'fin_periode', 'type', 'dateincident', 'libelleincident',
        'risque', 'nboccurrence', 'descriptiondetaillee', 'mesurescorrectives',
        'impactfinancier', 'statutincident', 'datecloture', 'infoscomplementaires',
        'totalincidents', 'totalimpactfinancier'
    ];
}
