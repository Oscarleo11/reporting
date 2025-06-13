<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FraudeChequeCarte extends Model
{
    protected $fillable = [
        'debut_periode',
        'fin_periode',
        'type',
        'codecheque',
        'datefraude',
        'libellefraude',
        'mesurescorrectives',
        'modeoperatoire',
        'nbfraude',
        'valeurcfa',
        'totalfraude',
        'totalvaleurcfa',
    ];
}

