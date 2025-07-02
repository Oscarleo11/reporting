<?php

// app/Models/DeclarationFraude.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeclarationFraude extends Model
{
    protected $fillable = [
        'debut_periode', 'fin_periode',
        'code', 'description',
        'nbtransaction', 'valeurtransaction',
        'dispositifgestion'
    ];
}

