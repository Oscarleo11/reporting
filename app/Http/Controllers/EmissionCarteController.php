<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmissionCarte;
use App\Models\FamilleCarte;
use App\Models\FamilleChequeCarte;
use App\Models\TypeCarte;

class EmissionCarteController extends Controller
{
    public function create()
    {
        // Seuls admin et user_mps peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_mps'
        ) {
            abort(403, 'Accès refusé');
        }

        $familles = FamilleChequeCarte::all();
        $types = TypeCarte::all();
        return view('emission-cartes.create', compact('familles', 'types'));
    }

    public function store(Request $request)
    {
        // Seuls admin et user_mps peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_mps'
        ) {
            abort(403, 'Accès refusé');
        }

        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'details.*.codefamille' => 'required|string',
            'details.*.codetype' => 'required|string',
            'details.*.description' => 'required|string',
            'details.*.nbcarte' => 'required|integer',
        ]);

        $totalCartes = 0;

        foreach ($request->details as $ligne) {
            $totalCartes += (int) $ligne['nbcarte'];
        }

        foreach ($request->details as $ligne) {
            EmissionCarte::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'codefamille' => $ligne['codefamille'],
                'codetype' => $ligne['codetype'],
                'description' => $ligne['description'],
                'nbcarte' => $ligne['nbcarte'],
                'totalcarte' => $totalCartes,
            ]);
        }

        return redirect()->route('emission-cartes.index')->with('success', 'Émission enregistrée avec total calculé.');
    }

    public function index()
    {
        // Seuls admin et user_mps peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_mps'
        ) {
            abort(403, 'Accès refusé');
        }

        $emissions = EmissionCarte::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('emission-cartes.index', compact('emissions'));
    }
}
