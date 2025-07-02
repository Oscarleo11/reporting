<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PlateformeTechnique extends Model
{
    public function create()
    {
        $plateformes = PlateformeTechnique::all();
        return view('incidentstra.create', compact('plateformes'));
    }
}
