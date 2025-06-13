<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReclamationStra extends Model
{
    protected $fillable = [
        'debut_periode', 'fin_periode', 'service', 'nb_recu', 'nb_traite',
        'motif_reclamation', 'procedure_traitement', 'total_recu', 'total_traite'
    ];
}

