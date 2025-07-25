<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RisqueStra;
use App\Models\RisqueStraDetail;
use App\Models\TypeRisqueStra;


class RisqueStraController extends Controller
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

        $types = TypeRisqueStra::all();
        return view('risquestra.create', compact('types'));
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
            'details.*.code' => 'required|string',
            'details.*.risque' => 'required|string',
            'details.*.mecanisme_maitrise' => 'required|string',
        ]);

        $nbRisque = count($request->details);

        $risqueStra = RisqueStra::create([
            'debut_periode' => $request->debut_periode,
            'fin_periode' => $request->fin_periode,
            'nb_risque' => $nbRisque,
        ]);

        foreach ($request->details as $ligne) {
            $risqueStra->details()->create($ligne);
        }

        return redirect()->route('risquestra.index')->with('success', 'Déclaration des risques enregistrée.');
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

        $risques = RisqueStra::with('details')->orderBy('debut_periode', 'desc')->get();
        return view('risquestra.index', compact('risques'));
    }
}
