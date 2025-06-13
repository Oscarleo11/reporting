<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FraudeStra extends Model
{
    protected $table = 'fraudestras';
    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'fraude',
        'service',
        'nb_fraude',
        'valeur_fraude',
        'mesures_correctives',
        'mode_operatoire',
        'debut_fraude',
        'fin_fraude',
        'total_fraude',
        'total_valeur_fraude',
    ];
}
