<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypologieCheque;
use App\Models\FamilleCheque;
use App\Models\TypeCarte;

class TypologieChequeController extends Controller
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
        return view('typologiecheque.create', compact('familles', 'types'));
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
        ]);

        $total = collect($request->details)->sum('nbcheque');

        foreach ($request->details as $ligne) {
            TypologieCheque::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'code' => $ligne['code'],
                'description' => $ligne['description'],
                'nbcheque' => $ligne['nbcheque'],
                'totalcheque' => $total,
            ]);
        }

        return redirect()->route('typologiecheque.index')->with('success', 'Typologie enregistrée.');
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

        $typologies = TypologieCheque::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('typologiecheque.index', compact('typologies'));
    }
}
