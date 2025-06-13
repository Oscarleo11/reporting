<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnuaireService extends Model
{
    protected $fillable = [
        'annuaire_stra_id',
        'operateur',
        'code_service',
        'description_service',
        'date_lancement',
        'perimetre',
        'mecanisme_compensation_reglement',
        'nbsous_agents',
        'nbpoints_service',
    ];

    public function stra()
    {
        return $this->belongsTo(AnnuaireStra::class, 'annuaire_stra_id');
    }

    public function transactions()
    {
        return $this->hasMany(AnnuaireTransaction::class);
    }
}

