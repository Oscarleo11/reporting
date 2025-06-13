<?php

namespace App\Http\Controllers;
use App\Models\ReclamationStra;
use App\Models\Service;

use Illuminate\Http\Request;

class ReclamationStraController extends Controller
{
    public function create()
    {
        $services = Service::all();
        return view('reclamationstra.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'details.*.service' => 'required|string',
            'details.*.nb_recu' => 'required|integer',
            'details.*.nb_traite' => 'required|integer',
            'details.*.motif_reclamation' => 'required|string',
            'details.*.procedure_traitement' => 'required|string',
        ]);

        $total_recu = 0;
        $total_traite = 0;

        foreach ($request->details as $d) {
            $total_recu += $d['nb_recu'];
            $total_traite += $d['nb_traite'];
        }

        foreach ($request->details as $d) {
            ReclamationStra::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'service' => $d['service'],
                'nb_recu' => $d['nb_recu'],
                'nb_traite' => $d['nb_traite'],
                'motif_reclamation' => $d['motif_reclamation'],
                'procedure_traitement' => $d['procedure_traitement'],
                'total_recu' => $total_recu,
                'total_traite' => $total_traite,
            ]);
        }

        return redirect()->route('reclamationstra.index')->with('success', 'Réclamations enregistrées.');
    }

    public function index()
    {
        $reclamations = ReclamationStra::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('reclamationstra.index', compact('reclamations'));
    }

}
