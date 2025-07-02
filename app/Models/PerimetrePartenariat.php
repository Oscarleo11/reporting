<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerimetrePartenariat extends Model
{
    protected $table = 'perimetre_partenariats';

    protected $fillable = [
        'nom',
    ];
}
