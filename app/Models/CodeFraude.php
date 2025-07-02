<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeFraude extends Model
{
    protected $fillable = [
        'code',
        'libelle',
    ];
}
