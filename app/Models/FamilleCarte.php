<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilleCarte extends Model
{
    protected $fillable = ['code', 'libelle'];
}

    /**
     * Get the type cartes associated with the famille carte.
     */
    // public function typeCartes()
    // {
    //     return $this->hasMany(TypeCarte::class, 'codefamille', 'code');
    // }
// }
