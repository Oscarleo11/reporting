<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeclarationSFM extends Model
{
    protected $table = 'declarationsfm';

    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'code',
        'valeur',
        'details'
    ];

    public function libelle()
    {
        return $this->belongsTo(CodeServiceFinancier::class, 'code', 'code');
    }
}
