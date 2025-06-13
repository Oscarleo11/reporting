<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TarificationChequeCarte;
use App\Models\FamilleCheque;
use App\Models\FamilleChequeCarte;
use App\Models\TypeCarte;

class TarificationChequeCarteController extends Controller
{
    public function create()
    {
        $famillesCH = FamilleCheque::all();
        $famillesCa = FamilleChequeCarte::all();
        $types = TypeCarte::all();
        return view('tarificationchequecarte.create', compact('famillesCH', 'famillesCa', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'cartes.*.code' => 'required|string',
            'cartes.*.coutminimum' => 'required|integer',
            'cheques.*.code' => 'required|string',
            'cheques.*.coutminimum' => 'required|integer',
        ]);

        foreach ($request->cartes as $ligne) {
            TarificationChequeCarte::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'type' => 'carte',
                'code' => $ligne['code'],
                'coutminimum' => $ligne['coutminimum'],
            ]);
        }

        foreach ($request->cheques as $ligne) {
            TarificationChequeCarte::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'type' => 'cheque',
                'code' => $ligne['code'],
                'coutminimum' => $ligne['coutminimum'],
            ]);
        }

        return redirect()->route('tarificationchequecarte.index')->with('success', 'Tarification enregistrée avec succès.');
    }

    public function index()
    {
        $tarifs = TarificationChequeCarte::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('tarificationchequecarte.index', compact('tarifs'));
    }
}
