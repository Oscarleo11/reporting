<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncidentStra;
use App\Models\PlateformeTechnique;

class IncidentStraController extends Controller
{
    public function create()
    {
        $plateformes = PlateformeTechnique::all();
        return view('incidentstra.create', compact('plateformes'));
        // return view('incidentstra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'details.*.plateformetechnique' => 'required|string',
            'details.*.risque' => 'required|string',
            'details.*.dateincident' => 'required|date',
            'details.*.libelleincident' => 'required|string',
            'details.*.nboccurrence' => 'required|integer',
            'details.*.descriptiondetaillee' => 'required|string',
            'details.*.mesurescorrectives' => 'required|string',
            'details.*.impactfinancier' => 'nullable|integer',
            'details.*.statutincident' => 'required|string',
            'details.*.datecloture' => 'nullable|date',
            'details.*.naturedeclaration' => 'nullable|string',
            'details.*.reference' => 'nullable|string',
        ]);

        $total = collect($request->details)->sum(function ($d) {
            return (int) $d['nboccurrence'] ?? 0;
        });

        $somme = collect($request->details)->sum(function ($d) {
            return $d['impactfinancier'] ?? 0;
        });

        foreach ($request->details as $ligne) {
            IncidentStra::create(array_merge($ligne, [
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'totalincidents' => $total,
                'totalimpactfinancier' => $somme,
            ]));
        }


        return redirect()->route('incidentstra.index')->with('success', 'Déclaration incidents STRA enregistrée avec totaux.');
    }


    public function index()
    {
        $incidents = IncidentStra::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('incidentstra.index', compact('incidents'));
    }
}
