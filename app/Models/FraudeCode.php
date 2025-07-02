<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FraudeCode extends Model
{
    protected $table = 'fraude_codes';

    protected $fillable = [
        'code',
    ];
}
