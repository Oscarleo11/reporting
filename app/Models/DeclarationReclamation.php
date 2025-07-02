<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeclarationReclamation extends Model
{
    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'nbenregistre',
        'nbtraite',
        'detail_nbenregistre',
        'detail_nbtraite',
        'motif',
    ];
}

