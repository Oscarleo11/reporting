<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeIncident extends Model
{
        protected $fillable = [
        'code',
        'libelle',
    ];
}
