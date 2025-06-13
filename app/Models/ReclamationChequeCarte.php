<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReclamationChequeCarte extends Model
{
    protected $fillable = [
        'debut_periode', 'fin_periode', 'type',
        'motif', 'etattraitement', 'mesurescorrectives', 'nbre',
        'totalcarte', 'totalcheque'
    ];
}

