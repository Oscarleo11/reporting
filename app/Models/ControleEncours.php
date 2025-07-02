<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControleEncours extends Model
{
    protected $fillable = [
        'debut_periode', 'fin_periode', 'valeurinitiale', 'nouvelleemission',
        'destructionmonnaie', 'valeurfinale', 'soldecomptecantonnement',
        'soldecomptabilite', 'ecartcantonnementvaleurfinale',
        'ecartcomptabilitevaleurfinale', 'ecartcomptabilitecantonnement',
        'nbtransaction', 'valeurtransaction'
    ];

    public function soldes()
    {
        return $this->hasMany(SoldeCompteCantonnement::class);
    }

    public function ecarts()
    {
        return $this->hasMany(ExplicationEcart::class);
    }
}

