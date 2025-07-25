<?php

// app/Http/Controllers/DeclarationFraudeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeclarationFraude;
use App\Models\CodeFraude;

class DeclarationFraudeController extends Controller
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
        $codes = CodeFraude::all();
        $libelles = $codes->pluck('libelle', 'code')->toArray();
        return view('declarationfraude.create', compact('codes'));
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
            'details.*.code' => 'required|string',
            'details.*.nbtransaction' => 'required|integer',
            'details.*.valeurtransaction' => 'required|integer',
            'details.*.dispositifgestion' => 'nullable|string',
        ]);

        foreach ($request->details as $detail) {
            $description = CodeFraude::where('code', $detail['code'])->first()?->libelle ?? '';
            DeclarationFraude::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'code' => $detail['code'],
                'description' => $description,
                'nbtransaction' => $detail['nbtransaction'],
                'valeurtransaction' => $detail['valeurtransaction'],
                'dispositifgestion' => $detail['dispositifgestion'],
            ]);
        }

        return redirect()->route('declarationfraude.index')->with('success', 'Déclaration enregistrée.');
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

        $fraudes = DeclarationFraude::all()->groupBy('debut_periode');
        return view('declarationfraude.index', compact('fraudes'));
    }
}
