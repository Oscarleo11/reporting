<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaysOperateur extends Model
{
    protected $table = 'pays_operateurs';

    protected $fillable = [
        'code',
    ];
}