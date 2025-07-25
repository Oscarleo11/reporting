<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncidentPaiementCarte;
use App\Models\FamilleCarte;
use App\Models\FamilleChequeCarte;
use App\Models\TypeCarte;

class IncidentPaiementCarteController extends Controller
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
        return view('incidentpaiementcarte.create', compact('familles', 'types'));
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
            'details.*.code' => 'required|string',
            'details.*.description' => 'required|string',
            'details.*.nbcarte' => 'required|integer',
            'details.*.valeurcfa' => 'nullable|integer',
        ]);

        $totalNombre = 0;
        $totalValeur = 0;

        foreach ($request->details as $ligne) {
            $totalNombre += (int) $ligne['nbcarte'];
            $totalValeur += (int) ($ligne['valeurcfa'] ?? 0);
        }

        foreach ($request->details as $ligne) {
            IncidentPaiementCarte::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'code' => $ligne['code'],
                'description' => $ligne['description'],
                'nbcarte' => $ligne['nbcarte'],
                'valeurcfa' => $ligne['valeurcfa'] ?? null,
                'totalnombre' => $totalNombre,
                'totalvaleurcfa' => $totalValeur,
            ]);
        }

        return redirect()->route('incidentpaiementcarte.index')->with('success', 'Incident(s) enregistré(s) avec succès.');
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

        $incidents = IncidentPaiementCarte::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('incidentpaiementcarte.index', compact('incidents'));
    }
}
