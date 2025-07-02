<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operateur extends Model
{
    protected $table = 'operateurs';

    protected $fillable = [
        'code',
        'libelle',
    ];
}
