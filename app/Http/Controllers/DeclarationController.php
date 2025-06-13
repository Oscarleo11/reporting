<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcquisitionCarte;
use App\Models\EmissionCarte;

class DeclarationController extends Controller
{
    public function index()
    {
        return view('declaration');
    }

    public function preview(Request $request)
    {
        $type = $request->query('type');
        $debut = $request->query('debut');
        $fin = $request->query('fin');

        switch ($type) {
            case 'acquisition':
                $data = AcquisitionCarte::whereBetween('debut_periode', [$debut, $fin])->get();
                return view('partials.preview-acquisition', compact('data'));
            case 'emission':
                $data = EmissionCarte::whereBetween('debut_periode', [$debut, $fin])->get();
                return view('partials.preview-emission', compact('data'));
            // Ajoute d'autres cas (fraude, etc.)
            default:
                abort(404);
        }
    }

    public function generateXml(Request $request)
    {
        $type = $request->query('type');
        $debut = $request->query('debut');
        $fin = $request->query('fin');

        // Logique de génération XML (exemple simplifié)
        $xml = new \SimpleXMLElement('<declaration/>');
        $xml->addAttribute('type', $type);
        $xml->addChild('periode', "$debut / $fin");

        return response($xml->asXML(), 200, [
            'Content-Type' => 'application/xml',
            'Content-Disposition' => 'attachment; filename="declaration.xml"',
        ]);
    }
}
