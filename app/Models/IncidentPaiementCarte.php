<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentPaiementCarte extends Model
{
    protected $fillable = [
        'debut_periode', 'fin_periode', 'code', 'description',
        'nbcarte', 'valeurcfa', 'totalnombre', 'totalvaleurcfa',
    ];
}

