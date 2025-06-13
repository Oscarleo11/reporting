<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReclamationChequeCarte;
use App\Models\FamilleCarte;
use App\Models\TypeCarte;

class ReclamationChequeCarteController extends Controller
{
    public function create()
    {
        return view('reclamationchequecarte.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'cartes.*.motif' => 'required|string',
            'cartes.*.etattraitement' => 'required|string',
            'cartes.*.mesurescorrectives' => 'nullable|string',
            'cartes.*.nbre' => 'required|integer',
            'cheques.*.motif' => 'required|string',
            'cheques.*.etattraitement' => 'required|string',
            'cheques.*.mesurescorrectives' => 'nullable|string',
            'cheques.*.nbre' => 'required|integer',
        ]);

        $totalCarte = collect($request->cartes)->sum('nbre');
        $totalCheque = collect($request->cheques)->sum('nbre');

        foreach ($request->cartes as $ligne) {
            ReclamationChequeCarte::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'type' => 'carte',
                'motif' => $ligne['motif'],
                'etattraitement' => $ligne['etattraitement'],
                'mesurescorrectives' => $ligne['mesurescorrectives'] ?? null,
                'nbre' => $ligne['nbre'],
                'totalcarte' => $totalCarte,
                'totalcheque' => $totalCheque,
            ]);
        }

        foreach ($request->cheques as $ligne) {
            ReclamationChequeCarte::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'type' => 'cheque',
                'motif' => $ligne['motif'],
                'etattraitement' => $ligne['etattraitement'],
                'mesurescorrectives' => $ligne['mesurescorrectives'] ?? null,
                'nbre' => $ligne['nbre'],
                'totalcarte' => $totalCarte,
                'totalcheque' => $totalCheque,
            ]);
        }

        return redirect()->route('reclamationchequecarte.index')->with('success', 'Réclamations enregistrées avec succès.');
    }

    public function index()
    {
        $reclamations = ReclamationChequeCarte::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('reclamationchequecarte.index', compact('reclamations'));
    }
}

