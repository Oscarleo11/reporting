<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModeEnvoi extends Model
{
    protected $fillable = ['code', 'libelle'];

    public $timestamps = false;
}


