<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoldeCompteCantonnement extends Model
{
    protected $fillable = ['controle_encours_id', 'banque', 'numerocompte', 'intitulecompte', 'solde'];
    public function controle()
    {
        return $this->belongsTo(ControleEncours::class);
    }
}

