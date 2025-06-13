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
        // $familles = FamilleCarte::all();
        $familles = FamilleCheque::all();
        $types = TypeCarte::all();
        return view('typologiecheque.create', compact('familles', 'types'));
    }

    public function store(Request $request)
    {
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
        $typologies = TypologieCheque::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('typologiecheque.index', compact('typologies'));
    }
}
