<?php

namespace App\Http\Controllers;

use App\Models\DeclarationIncident;
use Illuminate\Http\Request;
use App\Models\CodeIncident;

class DeclarationIncidentController extends Controller
{
    public function create()
    {
    $codes = CodeIncident::all();
    return view('declarationincident.create', compact('codes'));
}

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
        ]);

        DeclarationIncident::create([
            'debut_periode' => $request->debut_periode,
            'fin_periode' => $request->fin_periode,
            'elements_constitutifs' => $request->elements_constitutifs,
            'incidents' => $request->incidents,
            'captures' => $request->captures,
        ]);

        return redirect()->route('declarationincident.index')->with('success', 'Déclaration enregistrée.');
    }

    public function index()
    {
        $incidents = DeclarationIncident::all()->groupBy('debut_periode');
        return view('declarationincident.index', compact('incidents'));
    }
}

