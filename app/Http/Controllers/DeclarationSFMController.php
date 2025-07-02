<?php

namespace App\Http\Controllers;

use App\Models\DeclarationSFM;
use App\Models\CodeServiceFinancier;
use Illuminate\Http\Request;

class DeclarationSFMController extends Controller
{
    public function create()
    {
        $codes = CodeServiceFinancier::orderBy('code')->get();
        return view('declarationsfm.create', compact('codes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date|after_or_equal:debut_periode',
            'statistiques' => 'required|array|min:1',
            'statistiques.*.code' => 'required|string|exists:code_service_financiers,code',
            'statistiques.*.valeur' => 'nullable|numeric',
            'statistiques.*.details' => 'nullable|string',
        ]);

        foreach ($request->statistiques as $ligne) {
            DeclarationSFM::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'code' => $ligne['code'],
                'valeur' => $ligne['valeur'] ?? null,
                'details' => $ligne['details'] ?? null,
            ]);
        }

        return redirect()->route('declarationsfm.index')->with('success', 'Déclaration enregistrée avec succès.');
    }

    public function index()
    {
        $sfms = DeclarationSFM::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('declarationsfm.index', compact('sfms'));
    }
}
