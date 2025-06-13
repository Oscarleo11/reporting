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
        $familles = FamilleChequeCarte::all();
        $types = TypeCarte::all();
        return view('emission-cartes.create', compact('familles', 'types'));
    }

    public function store(Request $request)
    {
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
        $emissions = EmissionCarte::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('emission-cartes.index', compact('emissions'));
    }
}
