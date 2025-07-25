<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FraudeStra;
use App\Models\Service;
use App\Models\FraudeCode;


class FraudeStraController extends Controller
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

        return view('fraudestra.create', [
            'services' => Service::all(),
            'fraudecodes' => Fraudecode::all(),
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

        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'details.*.fraude' => 'required|string',
            'details.*.service' => 'required|string',
            'details.*.nb_fraude' => 'required|integer',
            'details.*.valeur_fraude' => 'required|integer',
            'details.*.mesures_correctives' => 'required|string',
            'details.*.mode_operatoire' => 'required|string',
            'details.*.debut_fraude' => 'required|date',
            'details.*.fin_fraude' => 'required|date',
        ]);

        $totalNb = 0;
        $totalVal = 0;

        foreach ($request->details as $data) {
            $totalNb += $data['nb_fraude'];
            $totalVal += $data['valeur_fraude'];
        }

        foreach ($request->details as $data) {
            FraudeStra::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'fraude' => $data['fraude'],
                'service' => $data['service'],
                'nb_fraude' => $data['nb_fraude'],
                'valeur_fraude' => $data['valeur_fraude'],
                'mesures_correctives' => $data['mesures_correctives'],
                'mode_operatoire' => $data['mode_operatoire'],
                'debut_fraude' => $data['debut_fraude'],
                'fin_fraude' => $data['fin_fraude'],
                'total_fraude' => $totalNb,
                'total_valeur_fraude' => $totalVal,
            ]);
        }

        return redirect()->route('fraudestra.index')->with('success', 'Fraudes STRA enregistrées.');
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

        $fraudes = FraudeStra::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('fraudestra.index', compact('fraudes'));
    }
}
