<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnuaireStra;
use App\Models\AnnuaireService;
use App\Models\AnnuaireTransaction;
use App\Models\Service;
use App\Models\Operateur;
use App\Models\PerimetrePartenariat;
use App\Models\ModeEnvoi;
use App\Models\ModeReception;

class AnnuaireStraController extends Controller
{
    public function create()
    {
        // Seuls admin et user_stra peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_stra'
        ) {
            abort(403, 'Accès refusé');
        }  

        return view('annuairestra.create', [
            'services' => Service::all(),
            'operateur' => Operateur::all(),
            'perimetres' => PerimetrePartenariat::all(),
            // 'modes_envoi' => ModeEnvoi::all(),
            // 'modes_reception' => ModeReception::all(),
        ]);
    }

    public function store(Request $request)
    {
        // Seuls admin et user_stra peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_stra'
        ) {
            abort(403, 'Accès refusé');
        }  

        $totalSousAgents = 0;
        $totalPointsService = 0;
        $totalEmissionIntra = 0;
        $totalEmissionHors = 0;
        $totalReceptionIntra = 0;
        $totalReceptionHors = 0;

        foreach ($request->services as $s) {
            $totalSousAgents += $s['nbsous_agents'];
            $totalPointsService += $s['nbpoints_service'];

            foreach ($s['transactions'] as $tx) {
                if ($tx['type_transaction'] === 'emission') {
                    $totalEmissionIntra += $tx['nb_intra'];
                    $totalEmissionHors += $tx['nb_hors'];
                }

                if ($tx['type_transaction'] === 'reception') {
                    $totalReceptionIntra += $tx['nb_intra'];
                    $totalReceptionHors += $tx['nb_hors'];
                }
            }
        }

        $stra = AnnuaireStra::create([
            'debut_periode' => $request->debut_periode,
            'fin_periode' => $request->fin_periode,
            'nbsous_agents' => $totalSousAgents,
            'nbpoints_service' => $totalPointsService,
            'nb_emission_intra' => $totalEmissionIntra,
            'valeur_emission_intra' => 0, // facultatif, peut être calculé aussi
            'nb_emission_hors' => $totalEmissionHors,
            'valeur_emission_hors' => 0,
            'nb_reception_intra' => $totalReceptionIntra,
            'valeur_reception_intra' => 0,
            'nb_reception_hors' => $totalReceptionHors,
            'valeur_reception_hors' => 0,
        ]);


        foreach ($request->services as $s) {
            $service = AnnuaireService::create([
                'annuaire_stra_id' => $stra->id,
                'operateur' => $s['operateur'],
                'code_service' => $s['code_service'],
                'description_service' => $s['description_service'],
                'date_lancement' => $s['date_lancement'],
                'perimetre' => $s['perimetre'],
                'mecanisme_compensation_reglement' => $s['mecanisme_compensation_reglement'],
                'nbsous_agents' => $s['nbsous_agents'],
                'nbpoints_service' => $s['nbpoints_service'],
            ]);

            foreach ($s['transactions'] as $tx) {
                AnnuaireTransaction::create([
                    'annuaire_service_id' => $service->id,
                    'type_transaction' => $tx['type_transaction'],
                    'mode_envoi' => $tx['mode_envoi'] ?? null,
                    'mode_reception' => $tx['mode_reception'] ?? null,
                    'nb_intra' => $tx['nb_intra'],
                    'valeur_intra' => $tx['valeur_intra'],
                    'nb_hors' => $tx['nb_hors'],
                    'valeur_hors' => $tx['valeur_hors'],
                ]);
            }
        }

        return redirect()->route('annuairestra.index')->with('success', 'Déclaration STRA enregistrée avec succès.');
    }

    public function index()
    {
        // Seuls admin et user_stra peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_stra'
        ) {
            abort(403, 'Accès refusé');
        }  

        $stras = AnnuaireStra::with('services')->orderByDesc('debut_periode')->get();
        return view('annuairestra.index', compact('stras'));
    }
}
