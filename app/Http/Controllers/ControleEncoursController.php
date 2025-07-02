<?php

namespace App\Http\Controllers;

use App\Models\ControleEncours;
use App\Models\SoldeCompteCantonnement;
use App\Models\ExplicationEcart;
use Illuminate\Http\Request;

class ControleEncoursController extends Controller
{
    public function create()
    {
        return view('controleencours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'valeurinitiale' => 'required|integer',
            'nouvelleemission' => 'required|integer',
            'destructionmonnaie' => 'required|integer',
            'valeurfinale' => 'required|integer',
            'soldes' => 'required|array|min:1',
            'soldes.*.banque' => 'required|string',
            'soldes.*.numerocompte' => 'required|string',
            'soldes.*.intitulecompte' => 'required|string',
            'soldes.*.solde' => 'required|integer',
            'ecarts' => 'required|array|min:1',
            'ecarts.*.type_ecart' => 'required|string',
            'ecarts.*.dateoperation' => 'required|date',
            'ecarts.*.reference' => 'required|string',
            'ecarts.*.natureoperation' => 'required|string',
            'ecarts.*.montant' => 'required|integer',
            'ecarts.*.observations' => 'required|string',
        ]);

        // Création de la déclaration principale
        $controle = ControleEncours::create([
            'debut_periode' => $request->debut_periode,
            'fin_periode' => $request->fin_periode,
            'valeurinitiale' => $request->valeurinitiale,
            'nouvelleemission' => $request->nouvelleemission,
            'destructionmonnaie' => $request->destructionmonnaie,
            'valeurfinale' => $request->valeurfinale,
            'soldecomptabilite' => $request->soldecomptabilite,
            'ecartcantonnementvaleurfinale' => $request->ecartcantonnementvaleurfinale,
            'ecartcomptabilitevaleurfinale' => $request->ecartcomptabilitevaleurfinale,
            'ecartcomptabilitecantonnement' => $request->ecartcomptabilitecantonnement,
            'nbtransaction' => $request->nbtransaction,
            'valeurtransaction' => $request->valeurtransaction,
        ]);

        // Enregistrement des soldes comptes
        $totalSolde = 0;
        foreach ($request->soldes as $s) {
            $totalSolde += $s['solde'];
            SoldeCompteCantonnement::create(array_merge($s, ['controle_encours_id' => $controle->id]));
        }
        // Mise à jour du solde total dans la déclaration
        $controle->update(['soldecomptecantonnement' => $totalSolde]);

        // Enregistrement des explications d'écarts
        foreach ($request->ecarts as $e) {
            ExplicationEcart::create(array_merge($e, ['controle_encours_id' => $controle->id]));
        }

        return redirect()->route('controleencours.index')
                         ->with('success', 'Déclaration de contrôle encours enregistrée.');
    }

    public function index()
    {
        $list = ControleEncours::with(['soldes', 'ecarts'])
                ->orderByDesc('debut_periode')
                ->get()
                ->groupBy('debut_periode');

        return view('controleencours.index', compact('list'));
    }
}
