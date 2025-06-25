<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XmlExport extends Model
{
    protected $fillable = [
        'type',
        'debut_periode',
        'fin_periode',
        'filename',
        'status',
    ];
}
