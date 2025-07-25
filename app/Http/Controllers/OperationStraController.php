<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OperationStra;
use App\Models\Service;
use App\Models\PaysOperateur;
use App\Models\Motif;

class OperationStraController extends Controller
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

        return view('operationstra.create', [
            'services' => Service::all(),
            'paysoperateurs' => Paysoperateur::all(),
            'motifs' => Motif::all(),

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
            'details.*.service' => 'required|string',
            'details.*.pays' => 'required|string',
            'details.*.motif' => 'required|string',
            'details.*.nb_transaction_emission' => 'required|integer',
            'details.*.valeur_transaction_emission' => 'required|integer',
            'details.*.nb_transaction_reception' => 'required|integer',
            'details.*.valeur_transaction_reception' => 'required|integer',
        ]);

        $total_emission_nb = 0;
        $total_emission_val = 0;
        $total_reception_nb = 0;
        $total_reception_val = 0;

        foreach ($request->details as $d) {
            $total_emission_nb += $d['nb_transaction_emission'];
            $total_emission_val += $d['valeur_transaction_emission'];
            $total_reception_nb += $d['nb_transaction_reception'];
            $total_reception_val += $d['valeur_transaction_reception'];
        }

        foreach ($request->details as $d) {
            OperationStra::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'service' => $d['service'],
                'pays' => $d['pays'],
                'motif' => $d['motif'],
                'nb_transaction_emission' => $d['nb_transaction_emission'],
                'valeur_transaction_emission' => $d['valeur_transaction_emission'],
                'nb_transaction_reception' => $d['nb_transaction_reception'],
                'valeur_transaction_reception' => $d['valeur_transaction_reception'],
                'total_nb_emission' => $total_emission_nb,
                'total_valeur_emission' => $total_emission_val,
                'total_nb_reception' => $total_reception_nb,
                'total_valeur_reception' => $total_reception_val,
            ]);
        }

        return redirect()->route('operationstra.index')->with('success', 'Déclaration opération STRA enregistrée.');
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

        $operations = OperationStra::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('operationstra.index', compact('operations'));
    }
}
