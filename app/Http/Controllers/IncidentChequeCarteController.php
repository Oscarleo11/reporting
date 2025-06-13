<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncidentChequeCarte;
use App\Models\FamilleCarte;
use App\Models\TypeCarte;

class IncidentChequeCarteController extends Controller
{
    public function create()
    {
        $familles = FamilleCarte::all();
        $types = TypeCarte::all();
        return view('incidentchequecarte.create', compact('familles', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'details.*.type' => 'required|string',
            'details.*.dateincident' => 'required|date',
            'details.*.libelleincident' => 'required|string',
            'details.*.risque' => 'required|string',
            'details.*.nboccurrence' => 'required|integer',
            'details.*.descriptiondetaillee' => 'required|string',
            'details.*.mesurescorrectives' => 'required|string',
            'details.*.impactfinancier' => 'required|integer',
            'details.*.statutincident' => 'required|string',
            'details.*.datecloture' => 'required|date',
            'details.*.infoscomplementaires' => 'required|string',
        ]);

        $totalIncidents = 0;
        $totalImpact = 0;

        foreach ($request->details as $ligne) {
            $totalIncidents += (int) $ligne['nboccurrence'];
            $totalImpact += (int) $ligne['impactfinancier'];
        }

        foreach ($request->details as $ligne) {
            IncidentChequeCarte::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'type' => $ligne['type'],
                'dateincident' => $ligne['dateincident'],
                'libelleincident' => $ligne['libelleincident'],
                'risque' => $ligne['risque'],
                'nboccurrence' => $ligne['nboccurrence'],
                'descriptiondetaillee' => $ligne['descriptiondetaillee'],
                'mesurescorrectives' => $ligne['mesurescorrectives'],
                'impactfinancier' => $ligne['impactfinancier'],
                'statutincident' => $ligne['statutincident'],
                'datecloture' => $ligne['datecloture'],
                'infoscomplementaires' => $ligne['infoscomplementaires'],
                'totalincidents' => $totalIncidents,
                'totalimpactfinancier' => $totalImpact,
            ]);
        }

        return redirect()->route('incidentchequecarte.index')->with('success', 'Incidents enregistrés avec succès.');
    }

    public function index()
    {
        $incidents = IncidentChequeCarte::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        return view('incidentchequecarte.index', compact('incidents'));
    }
}
