<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnuaireTransaction extends Model
{
    protected $fillable = [
        'annuaire_service_id',
        'type_transaction',
        'mode_envoi',
        'mode_reception',
        'nb_intra',
        'valeur_intra',
        'nb_hors',
        'valeur_hors',
    ];

    public function service()
    {
        return $this->belongsTo(AnnuaireService::class, 'annuaire_service_id');
    }
}

