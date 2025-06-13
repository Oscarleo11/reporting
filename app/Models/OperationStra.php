<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperationStra extends Model
{
    protected $table = 'operationstras';

    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'service',
        'pays',
        'motif',
        'nb_transaction_emission',
        'valeur_transaction_emission',
        'nb_transaction_reception',
        'valeur_transaction_reception',
        'total_nb_emission',
        'total_valeur_emission',
        'total_nb_reception',
        'total_valeur_reception',
    ];
}
