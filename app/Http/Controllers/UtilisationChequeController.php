<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UtilisationCheque;
use App\Models\FamilleCheque;
use App\Models\TypeCarte;

class UtilisationChequeController extends Controller
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

        // $familles = FamilleCarte::all();
        $familles = FamilleCheque::all();
        $types = TypeCarte::all();
        return view('utilisationcheque.create', compact('familles', 'types'));
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
            'details.*.nbcheque' => 'required|integer',
            'details.*.valeurcfa' => 'required|integer',
        ]);

        $totalNb = collect($request->details)->sum('nbcheque');
        $totalValeur = collect($request->details)->sum('valeurcfa');

        foreach ($request->details as $ligne) {
            UtilisationCheque::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'code' => $ligne['code'],
                'description' => $ligne['description'],
                'nbcheque' => $ligne['nbcheque'],
                'valeurcfa' => $ligne['valeurcfa'],
                'totalnbcheque' => $totalNb,
                'totalvaleurcfa' => $totalValeur,
            ]);
        }

        return redirect()->route('utilisationcheque.index')->with('success', 'Utilisation enregistrée.');
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

        $utilisations = UtilisationCheque::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('utilisationcheque.index', compact('utilisations'));
    }
}
