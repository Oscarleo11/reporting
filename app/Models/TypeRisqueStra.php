<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeRisqueStra extends Model
{
    // protected $table = 'type_risque_stra';

    protected $fillable = [
        'code',
        'libelle',
        'description',
        'created_at',
        'updated_at'
    ];

    public function risques()
    {
        return $this->hasMany(RisqueStra::class, 'type_risque_id');
    }
}
