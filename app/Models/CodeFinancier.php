<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeFinancier extends Model
{
    protected $fillable = [
        'code',
        'libelle',
    ];
}
