<?php

namespace App\Http\Controllers;

use App\Models\DeclarationRatio;
use App\Models\CodeRatio;
use Illuminate\Http\Request;

class DeclarationRatioController extends Controller
{
    public function create()
    {
        // Seuls admin et user_cocotiers peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_cocotiers'
        ) {
            abort(403, 'Accès refusé');
        }  

        $codes = CodeRatio::all();
        $libelles = $codes->pluck('libelle', 'code')->toArray();
        return view('declarationratios.create', compact('codes'));
    }

    public function store(Request $request)
    {
        // Seuls admin et user_cocotiers peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_cocotiers'
        ) {
            abort(403, 'Accès refusé');
        }  

        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'ratios.*.code' => 'required|string',
            'ratios.*.intitule' => 'required|string',
            'ratios.*.taux' => 'required|numeric',
        ]);

        foreach ($request->ratios as $ratio) {
            DeclarationRatio::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'code' => $ratio['code'],
                'intitule' => $ratio['intitule'],
                'taux' => $ratio['taux'],
            ]);
        }

        return redirect()->route('declarationratios.index')->with('success', 'Ratios enregistrés');
    }

    public function index()
    {
        // Seuls admin et user_cocotiers peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_cocotiers'
        ) {
            abort(403, 'Accès refusé');
        }  

        $ratios = DeclarationRatio::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('declarationratios.index', compact('ratios'));
    }
}
