<?php

namespace App\Http\Controllers;

use App\Models\PlacementFinancier;
use Illuminate\Http\Request;

class PlacementFinancierController extends Controller
{
    public function index()
    {
        $placements = PlacementFinancier::all()->groupBy('debut_periode');
        return view('placementfinancier.index', compact('placements'));
    }

    public function create()
    {
        return view('placementfinancier.create');
    }

    public function store(Request $request)
    {
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

