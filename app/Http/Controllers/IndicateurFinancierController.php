<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndicateurFinancier;
use App\Models\CodeFinancier;

class IndicateurFinancierController extends Controller
{
    public function create()
    {
        $codes = CodeFinancier::all();
        return view('indicateurfinancier.create', compact('codes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'indicateurs.*.code' => 'required|string',
            'indicateurs.*.valeur' => 'required|integer',
        ]);

        foreach ($request->indicateurs as $indicateur) {
            $libelle = CodeFinancier::where('code', $indicateur['code'])->value('libelle');
            IndicateurFinancier::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'code' => $indicateur['code'],
                'intitule' => $libelle,
                'valeur' => $indicateur['valeur']
            ]);
        }

        return redirect()->route('indicateurfinancier.index')->with('success', 'Déclaration enregistrée');
    }

    public function index()
    {
        $indicateurs = IndicateurFinancier::orderByDesc('debut_periode')->get()->groupBy('debut_periode');
        return view('indicateurfinancier.index', compact('indicateurs'));
    }
}
