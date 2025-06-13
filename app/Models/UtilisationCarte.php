<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtilisationCarte extends Model
{
    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'code',
        'description',
        'nbcarte',
        'valeurcfa',
        'totalnbcarte',
        'totalvaleurcfa',
    ];
}

