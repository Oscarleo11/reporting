<?php

namespace App\Http\Controllers;

use App\Models\DeclarationReclamation;
use Illuminate\Http\Request;

class DeclarationReclamationController extends Controller
{
    public function create()
    {
        return view('declarationreclamation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'reclamations' => 'required|array|min:1',
            'reclamations.*.nbenregistre' => 'required|integer',
            'reclamations.*.nbtraite' => 'required|integer',
            'reclamations.*.motif' => 'required|string',
        ]);

        $total_enregistre = collect($request->reclamations)->sum('nbenregistre');
        $total_traite = collect($request->reclamations)->sum('nbtraite');

        foreach ($request->reclamations as $row) {
            DeclarationReclamation::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'nbenregistre' => $total_enregistre,
                'nbtraite' => $total_traite,
                'detail_nbenregistre' => $row['nbenregistre'],
                'detail_nbtraite' => $row['nbtraite'],
                'motif' => $row['motif'],
            ]);
        }

        return redirect()->route('declarationreclamation.index')->with('success', 'Déclaration enregistrée avec succès.');
    }

    public function index()
    {
        $reclamations = DeclarationReclamation::all()->groupBy('debut_periode');
        return view('declarationreclamation.index', compact('reclamations'));
    }
}
