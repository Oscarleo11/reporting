<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecosysteme extends Model
{
    use HasFactory;

    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'nbsous_agents',
        'nbpoints_service',
        'modalite_controle_sousagents',
        'service_offert',
        'description_service',
        'operateur',
        'pays_operateur',
        'perimetre_partenariat',
        'debut_partenariat',
        'fin_partenariat',
    ];
}

