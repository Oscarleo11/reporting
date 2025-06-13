<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncidentPaiementCheque;
use App\Models\FamilleCarte;
use App\Models\TypeCarte;
use App\Models\FamilleCheque;

class IncidentPaiementChequeController extends Controller
{
    public function create()
    {
        // $familles = FamilleCarte::all();
        $familles = FamilleCheque::all();
        $types = TypeCarte::all();
        return view('incidentpaiementcheque.create', compact('familles', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'details.*.code' => 'required|string',
            'details.*.description' => 'required|string',
            'details.*.nbcheque' => 'required|integer',
            'details.*.valeurcfa' => 'nullable|integer',
        ]);

        $totalNombre = 0;
        $totalValeur = 0;

        foreach ($request->details as $ligne) {
            $totalNombre += (int) $ligne['nbcheque'];
            $totalValeur += (int) ($ligne['valeurcfa'] ?? 0);
        }

        foreach ($request->details as $ligne) {
            IncidentPaiementCheque::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'code' => $ligne['code'],
                'description' => $ligne['description'],
                'nbcheque' => $ligne['nbcheque'],
                'valeurcfa' => $ligne['valeurcfa'] ?? null,
                'totalnombre' => $totalNombre,
                'totalvaleurcfa' => $totalValeur,
            ]);
        }

        return redirect()->route('incidentpaiementcheque.index')->with('success', 'Incidents de paiement par chèque enregistrés avec succès.');
    }

    public function index()
    {
        $incidents = IncidentPaiementCheque::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('incidentpaiementcheque.index', compact('incidents'));
    }
}
