<?php

namespace App\Http\Controllers;

use App\Models\PlacementFinancier;
use Illuminate\Http\Request;

class PlacementFinancierController extends Controller
{
    public function index()
    {
        // Seuls admin et user_cocotiers peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_cocotiers'
        ) {
            abort(403, 'Accès refusé');
        }  

        $placements = PlacementFinancier::all()->groupBy('debut_periode');
        return view('placementfinancier.index', compact('placements'));
    }

    public function create()
    {
        // Seuls admin et user_cocotiers peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_cocotiers'
        ) {
            abort(403, 'Accès refusé');
        }  

        return view('placementfinancier.create');
    }

    public function store(Request $request)
    {
        // Seuls admin et user_cocotiers peuvent accéder
        if (
            auth()->user()->role !== 'admin' &&
            auth()->user()->role !== 'user_cocotiers'
        ) {
            abort(403, 'Accès refusé');
        }  

        $data = $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'depotavue' => 'required|numeric',
            'depotaterme' => 'required|numeric',
            'titreacquis' => 'required|numeric',
        ]);

        $data['total'] = $data['depotavue'] + $data['depotaterme'] + $data['titreacquis'];

        PlacementFinancier::create($data);

        return redirect()->route('placementfinancier.index')->with('success', 'Déclaration enregistrée.');
    }
}

