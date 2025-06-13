<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnuaireStra extends Model
{
    protected $table = 'annuaires_stras';

    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'nbsous_agents',
        'nbpoints_service',
        'nb_emission_intra',
        'valeur_emission_intra',
        'nb_emission_hors',
        'valeur_emission_hors',
        'nb_reception_intra',
        'valeur_reception_intra',
        'nb_reception_hors',
        'valeur_reception_hors',
    ];

    public function services()
    {
        return $this->hasMany(AnnuaireService::class);
    }
}
