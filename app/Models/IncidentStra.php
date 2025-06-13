<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentStra extends Model
{
    // protected $table = 'incident_stras';

    protected $fillable = [
        'debut_periode', 'fin_periode',
        'plateformetechnique', 'risque', 'dateincident', 'libelleincident',
        'nboccurrence', 'descriptiondetaillee', 'mesurescorrectives',
        'impactfinancier', 'statutincident', 'datecloture',
        'naturedeclaration', 'reference', 'totalincidents', 'totalimpactfinancier',
    ];
}

