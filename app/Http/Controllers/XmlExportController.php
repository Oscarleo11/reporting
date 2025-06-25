<?php

namespace App\Http\Controllers;

use App\Models\XmlExport;
use Illuminate\Http\Request;

class XmlExportController extends Controller
{
    public function index()
    {
        $exports = XmlExport::orderByDesc('created_at')->get();
        return view('xml_exports.index', compact('exports'));
    }

    public function updateStatus(Request $request, XmlExport $export)
    {
        $request->validate([
            'status' => 'required|in:en_attente,valide,non_valide',
            'motif_refus' => 'nullable|string|max:1000',
        ]);
        $export->status = $request->status;
        $export->motif_refus = $request->status === 'non_valide' ? $request->motif_refus : null;
        $export->save();

        return back()->with('success', 'Statut mis à jour.');
    }
}
