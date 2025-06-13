<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FraudeChequeCarte;
use App\Models\FamilleCarte;
use App\Models\FamilleCheque;
use App\Models\TypeCarte;

class FraudeChequeCarteController extends Controller
{
    public function create()
    {
        $familles = FamilleCarte::all();
        $types = TypeCarte::all();
        return view('fraudechequecarte.create', compact('familles', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
            'details.*.type' => 'required|string',
            'details.*.codecheque' => 'required|string',
            'details.*.datefraude' => 'required|date',
            'details.*.libellefraude' => 'required|string',
            'details.*.mesurescorrectives' => 'required|string',
            'details.*.modeoperatoire' => 'required|string',
            'details.*.nbfraude' => 'required|integer',
            'details.*.valeurcfa' => 'required|integer',
        ]);

        $totalFraude = 0;
        $totalValeur = 0;

        foreach ($request->details as $ligne) {
            $totalFraude += (int) $ligne['nbfraude'];
            $totalValeur += (int) $ligne['valeurcfa'];
        }

        foreach ($request->details as $ligne) {
            FraudeChequeCarte::create([
                'debut_periode' => $request->debut_periode,
                'fin_periode' => $request->fin_periode,
                'type' => $ligne['type'],
                'codecheque' => $ligne['codecheque'],
                'datefraude' => $ligne['datefraude'],
                'libellefraude' => $ligne['libellefraude'],
                'mesurescorrectives' => $ligne['mesurescorrectives'],
                'modeoperatoire' => $ligne['modeoperatoire'],
                'nbfraude' => $ligne['nbfraude'],
                'valeurcfa' => $ligne['valeurcfa'],
                'totalfraude' => $totalFraude,
                'totalvaleurcfa' => $totalValeur,
            ]);
        }

        return redirect()->route('fraudechequecarte.index')->with('success', 'Fraude enregistrée avec succès.');
    }

    public function index()
    {
        $fraudes = FraudeChequeCarte::orderBy('debut_periode', 'desc')->get()->groupBy('debut_periode');
        // $fraudesf = FraudeChequeCarte::orderBy('fin_periode', 'desc')->get()->groupBy('fin_periode');
        return view('fraudechequecarte.index', compact('fraudes'));
    }
}
