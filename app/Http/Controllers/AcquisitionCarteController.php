<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcquisitionCarte;
use App\Models\TypeCarte;

class AcquisitionCarteController extends Controller
{
    public function create()
    {
        $types = TypeCarte::all();
        return view('acquisition.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'details.*.codetype' => 'required|string',
            'details.*.tarif' => 'required|integer',
            'details.*.plafondrechargement' => 'required|integer',
            'details.*.plafondretraitjournalier' => 'required|integer',
        ]);

        foreach ($request->details as $ligne) {
            AcquisitionCarte::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'code_type' => $ligne['codetype'],
                'tarif' => $ligne['tarif'],
                'plafond_rechargement' => $ligne['plafondrechargement'],
                'plafond_retrait_journalier' => $ligne['plafondretraitjournalier'],
            ]);
        }

        return redirect()->route('acquisition.index')->with('success', 'Acquisition enregistrée.');
    }

    public function index()
    {
        $acquisitions = AcquisitionCarte::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('acquisition.index', compact('acquisitions'));
    }
}
