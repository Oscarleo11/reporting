<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ecosysteme;

class EcosystemeController extends Controller
{
    public function create()
    {
        return view('ecosysteme.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'nbsous_agents' => 'required|integer',
            'nbpoints_service' => 'required|integer',
            'modalite_controle_sousagents' => 'required|string',

            'services.*.service_offert' => 'required|string',
            'services.*.description_service' => 'required|string',
            'services.*.operateur' => 'required|string',
            'services.*.pays_operateur' => 'required|string',
            'services.*.perimetre_partenariat' => 'required|string',
            'services.*.debut_partenariat' => 'required|date',
            'services.*.fin_partenariat' => 'nullable|date',
        ]);

        foreach ($request->services as $service) {
            Ecosysteme::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'nbsous_agents' => $request->nbsous_agents,
                'nbpoints_service' => $request->nbpoints_service,
                'modalite_controle_sousagents' => $request->modalite_controle_sousagents,
                'service_offert' => $service['service_offert'],
                'description_service' => $service['description_service'],
                'operateur' => $service['operateur'],
                'pays_operateur' => $service['pays_operateur'],
                'perimetre_partenariat' => $service['perimetre_partenariat'],
                'debut_partenariat' => $service['debut_partenariat'],
                'fin_partenariat' => $service['fin_partenariat'] ?? null,
            ]);
        }

        return redirect()->route('ecosysteme.index')->with('success', 'Écosystème enregistré.');
    }

    public function index()
    {
        $ecosystemes = Ecosysteme::orderByDesc('debut_periode')->get()->groupBy('debut_periode');
        return view('ecosysteme.index', compact('ecosystemes'));
    }
}

