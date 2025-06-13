<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UtilisationCarte;
use App\Models\FamilleCarte;
use App\Models\FamilleChequeCarte;
use App\Models\TypeCarte;

class UtilisationCarteController extends Controller
{
    public function create()
    {
        $familles = FamilleChequeCarte::all();
        $types = TypeCarte::all();
        return view('utilisationcarte.create', compact('familles', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'details.*.code' => 'required|string',
            'details.*.description' => 'required|string',
            'details.*.nbcarte' => 'required|integer',
            'details.*.valeurcfa' => 'required|integer',
        ]);

        $totalNb = collect($request->details)->sum('nbcarte');
        $totalValeur = collect($request->details)->sum('valeurcfa');

        foreach ($request->details as $ligne) {
            UtilisationCarte::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'code' => $ligne['code'],
                'description' => $ligne['description'],
                'nbcarte' => $ligne['nbcarte'],
                'valeurcfa' => $ligne['valeurcfa'],
                'totalnbcarte' => $totalNb,
                'totalvaleurcfa' => $totalValeur,
            ]);
        }

        return redirect()->route('utilisationcarte.index')->with('success', 'Utilisation enregistrée avec succès.');
    }

    public function index()
    {
        $utilisations = UtilisationCarte::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('utilisationcarte.index', compact('utilisations'));
    }
}

