<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExplicationEcart extends Model
{
    protected $fillable = ['controle_encours_id', 'type_ecart', 'dateoperation', 'reference', 'natureoperation', 'montant', 'observations'];

    public function controle()
    {
        return $this->belongsTo(ControleEncours::class);
    }
}

