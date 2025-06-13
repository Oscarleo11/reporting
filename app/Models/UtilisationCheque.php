<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtilisationCheque extends Model
{
    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'code',
        'description',
        'nbcheque',
        'valeurcfa',
        'totalnbcheque',
        'totalvaleurcfa',
    ];
}

