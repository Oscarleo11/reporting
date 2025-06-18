<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcquisitionCarte;


class DeclarationXmlController extends Controller
{
    public function index()
    {
        return view('declaration.xml.index');
    }

    public function preview(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
        ]);

        $data = [];

        if ($request->type === 'acquisition') {
            $data = AcquisitionCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'emission') {
            $data = \App\Models\EmissionCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'fraudechequecarte') {
            $data = \App\Models\FraudeChequeCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'incidentchequecarte') {
            $data = \App\Models\IncidentChequeCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'incidentpaiementcarte') {
            $data = \App\Models\IncidentPaiementCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'incidentpaiementcheque') {
            $data = \App\Models\IncidentPaiementCheque::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'reclamationchequecarte') {
            $data = \App\Models\ReclamationChequeCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'tarificationchequecarte') {
            $data = \App\Models\TarificationChequeCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'typologiecheque') {
            $data = \App\Models\TypologieCheque::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'utilisationcarte') {
            $data = \App\Models\UtilisationCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'utilisationcheque') {
            $data = \App\Models\UtilisationCheque::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'risquestra') {
            $data = \App\Models\RisqueStra::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'incidentstra') {
            $data = \App\Models\IncidentStra::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'fraudestra') {
            $data = \App\Models\FraudeStra::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'operationstra') {
            $data = \App\Models\OperationStra::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'reclamationstra') {
            $data = \App\Models\ReclamationStra::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'ecosysteme') {
            $data = \App\Models\Ecosysteme::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        } elseif ($request->type === 'annuaire') {
            // Récupère l'annuaire STRA pour la période
            $data = \App\Models\AnnuaireStra::with(['services.transactions'])
                ->where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();
        }

        return view('declaration.xml.index', [
            'donnees' => $data,
            'type' => $request->type,
            'debut_periode' => $request->debut_periode,
            'fin_periode' => $request->fin_periode,
        ]);
    }



















    public function generate(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'debut_periode' => 'required|date',
            'fin_periode' => 'required|date',
        ]);
        if ($request->type === 'acquisition') {
            $records = AcquisitionCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><acquisitioncarte></acquisitioncarte>');

            $acquisition = $xml->addChild('acquisition');
            $acquisition->addChild('debutperiode', $request->debut_periode);
            $acquisition->addChild('finperiode', $request->fin_periode);

            $details = $xml->addChild('details');

            foreach ($records as $row) {
                $type = $details->addChild('typecarte');
                $type->addAttribute('code', $row->code_type);
                $type->addChild('tarif', $row->tarif);
                $type->addChild('plafondrechargement', $row->plafond_rechargement);
                $type->addChild('plafondretraitjournalier', $row->plafond_retrait_journalier);
            }

            return response($xml->asXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="acquisition_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'emission') {
            $rows = \App\Models\EmissionCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            // Création du document DOM pour une meilleure gestion des CDATA
            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true;

            // Création de l'élément racine
            $root = $dom->createElement('emissioncarte');
            $dom->appendChild($root);

            // Section d'en-tête avec les métadonnées
            $emission = $dom->createElement('emission');
            $emission->appendChild($dom->createElement('debutperiode', $request->debut_periode));
            $emission->appendChild($dom->createElement('finperiode', $request->fin_periode));
            $emission->appendChild($dom->createElement('totalcarte', $rows->sum('nbcarte')));
            $root->appendChild($emission);

            // Section des détails groupés par famille
            $details = $dom->createElement('details');
            $grouped = $rows->groupBy('codefamille');

            foreach ($grouped as $codeFamille => $group) {
                $famille = $dom->createElement('famillecarte');
                $famille->setAttribute('code', $codeFamille);
                $famille->setAttribute('total', $group->sum('nbcarte'));

                foreach ($group as $item) {
                    $type = $dom->createElement('typecarte');
                    $type->setAttribute('code', $item->codetype);

                    // Ajout avec CDATA pour la description
                    $description = $dom->createElement('description');
                    $description->appendChild($dom->createCDATASection($item->description));
                    $type->appendChild($description);

                    $type->appendChild($dom->createElement('nbcarte', $item->nbcarte));
                    $famille->appendChild($type);
                }

                $details->appendChild($famille);
            }

            $root->appendChild($details);

            // Génération du fichier XML
            $xmlString = $dom->saveXML();

            return response($xmlString, 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', sprintf(
                    'attachment; filename="emission_%s_%s.xml"',
                    $request->debut_periode,
                    $request->fin_periode
                ));

        } elseif ($request->type === 'fraudechequecarte') {
            $rows = \App\Models\FraudeChequeCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><fraudechequecarte></fraudechequecarte>');

            $fraude = $xml->addChild('fraude');
            $fraude->addChild('debutperiode', $request->debut_periode);
            $fraude->addChild('finperiode', $request->fin_periode);
            $fraude->addChild('totalfraude', $rows->sum('nbfraude'));
            $fraude->addChild('totalvaleurcfa', $rows->sum('valeurcfa'));

            $details = $xml->addChild('details');

            // Convertir en DOM pour gérer les CDATA
            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->loadXML($xml->asXML());

            foreach ($rows as $item) {
                // Créer l'élément data avec ses attributs
                $data = $dom->createElement('data');
                $data->setAttribute('type', $item->type);
                $data->setAttribute('code', $item->codecheque);

                // Ajouter les enfants avec CDATA si nécessaire
                $dateFraude = $dom->createElement('datefraude', $item->datefraude);
                $data->appendChild($dateFraude);

                $libelleFraude = $dom->createElement('libellefraude');
                $libelleFraude->appendChild($dom->createCDATASection($item->libellefraude));
                $data->appendChild($libelleFraude);

                $mesuresCorrectives = $dom->createElement('mesurescorrectives');
                $mesuresCorrectives->appendChild($dom->createCDATASection($item->mesurescorrectives));
                $data->appendChild($mesuresCorrectives);

                $modeOperatoire = $dom->createElement('modeoperatoire');
                $modeOperatoire->appendChild($dom->createCDATASection($item->modeoperatoire));
                $data->appendChild($modeOperatoire);

                $nbFraude = $dom->createElement('nbfraude', $item->nbfraude);
                $data->appendChild($nbFraude);

                $valeurCfa = $dom->createElement('valeurcfa', $item->valeurcfa);
                $data->appendChild($valeurCfa);

                // Ajouter au nœud details
                $detailsNode = $dom->getElementsByTagName('details')->item(0);
                $detailsNode->appendChild($data);
            }

            // Sauvegarder le XML final
            $dom->formatOutput = true;
            $xmlString = $dom->saveXML();

            return response($xmlString, 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="fraudechequecarte_' . $request->debut_periode . '_' . $request->fin_periode . '.xml"');

        } elseif ($request->type === 'incidentchequecarte') {
            $rows = \App\Models\IncidentChequeCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><incidentchequecarte></incidentchequecarte>');

            $incident = $xml->addChild('incident');
            $incident->addChild('debutperiode', $request->debut_periode);
            $incident->addChild('finperiode', $request->fin_periode);
            $incident->addChild('totalincidents', $rows->sum('nboccurrence'));
            $incident->addChild('totalimpactfinancier', $rows->sum('impactfinancier'));

            $details = $xml->addChild('details');

            foreach ($rows as $item) {
                $data = $details->addChild('data');
                $data->addAttribute('type', $item->type);
                $data->addChild('dateincident', $item->dateincident);
                $data->addChild('libelleincident', "<![CDATA[{$item->libelleincident}]]>");
                $data->addChild('risque', "<![CDATA[{$item->risque}]]>");
                $data->addChild('nboccurrence', $item->nboccurrence);
                $data->addChild('descriptiondetaillee', "<![CDATA[{$item->descriptiondetaillee}]]>");
                $data->addChild('mesurescorrectives', "<![CDATA[{$item->mesurescorrectives}]]>");
                $data->addChild('impactfinancier', $item->impactfinancier);
                $data->addChild('statutincident', $item->statutincident);
                $data->addChild('datecloture', $item->datecloture);
                $data->addChild('infoscomplementaires', "<![CDATA[{$item->infoscomplementaires}]]>");
            }

            return response($xml->asXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="incidentchequecarte_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'incidentpaiementcarte') {
            $rows = \App\Models\IncidentPaiementCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><incidentpaiementcarte></incidentpaiementcarte>');

            $incident = $xml->addChild('incident');
            $incident->addChild('debutperiode', $request->debut_periode);
            $incident->addChild('finperiode', $request->fin_periode);
            $incident->addChild('totalnombre', $rows->sum('nbcarte'));
            $incident->addChild('totalvaleurcfa', $rows->sum('valeurcfa'));

            $details = $xml->addChild('details');

            foreach ($rows as $item) {
                $typenom = $details->addChild('typenomenclature');
                $typenom->addAttribute('code', $item->code);
                $typenom->addChild('description', "<![CDATA[{$item->description}]]>");
                $typenom->addChild('nbcarte', $item->nbcarte);
                if (!is_null($item->valeurcfa)) {
                    $typenom->addChild('valeurcfa', $item->valeurcfa);
                }
            }

            return response($xml->asXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="incidentpaiementcarte_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'incidentpaiementcheque') {
            $rows = \App\Models\IncidentPaiementCheque::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><incidentpaiementcheque></incidentpaiementcheque>');

            $incident = $xml->addChild('incident');
            $incident->addChild('debutperiode', $request->debut_periode);
            $incident->addChild('finperiode', $request->fin_periode);
            $incident->addChild('totalnombre', $rows->sum('nbcheque'));
            $incident->addChild('totalvaleurcfa', $rows->sum('valeurcfa'));

            $details = $xml->addChild('details');

            foreach ($rows as $item) {
                $typenom = $details->addChild('typenomenclature');
                $typenom->addAttribute('code', $item->code);
                $typenom->addChild('description', "<![CDATA[{$item->description}]]>");
                $typenom->addChild('nbcheque', $item->nbcheque);
                if (!is_null($item->valeurcfa)) {
                    $typenom->addChild('valeurcfa', $item->valeurcfa);
                }
            }

            return response($xml->asXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="incidentpaiementcheque_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'reclamationchequecarte') {
            $rows = \App\Models\ReclamationChequeCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><reclamationchequecarte></reclamationchequecarte>');

            $reclamation = $xml->addChild('reclamation');
            $reclamation->addChild('debutperiode', $request->debut_periode);
            $reclamation->addChild('finperiode', $request->fin_periode);
            $reclamation->addChild('totalcarte', $rows->where('type', 'carte')->sum('nbre'));
            $reclamation->addChild('totalcheque', $rows->where('type', 'cheque')->sum('nbre'));


            $details = $xml->addChild('details');

            $cartes = $details->addChild('cartes');
            foreach ($rows->where('type', 'carte') as $item) {
                $data = $cartes->addChild('data');
                $data->addChild('motif');
                $data->addChild('etattraitement', $item->etattraitement);
                $data->addChild('mesurescorrectives');
                $data->addChild('nbre', $item->nbre);
            }

            $cheques = $details->addChild('cheques');
            foreach ($rows->where('type', 'cheque') as $item) {
                $data = $cheques->addChild('data');
                $data->addChild('motif');
                $data->addChild('etattraitement', $item->etattraitement);
                $data->addChild('mesurescorrectives');
                $data->addChild('nbre', $item->nbre);
            }

            // Add CDATA for motif and mesurescorrectives
            $dom = dom_import_simplexml($xml)->ownerDocument;
            foreach ($dom->getElementsByTagName('motif') as $node) {
                $parent = $node->parentNode;
                $typeNode = $parent->parentNode->nodeName;
                if ($typeNode === 'cartes') {
                    $index = 0;
                    foreach ($rows->where('type', 'carte') as $item) {
                        if ($index === 0) {
                            $node->appendChild($dom->createCDATASection($item->motif));
                            break;
                        }
                        $index++;
                    }
                } elseif ($typeNode === 'cheques') {
                    $index = 0;
                    foreach ($rows->where('type', 'cheque') as $item) {
                        if ($index === 0) {
                            $node->appendChild($dom->createCDATASection($item->motif));
                            break;
                        }
                        $index++;
                    }
                }
            }
            foreach ($dom->getElementsByTagName('mesurescorrectives') as $node) {
                $parent = $node->parentNode;
                $typeNode = $parent->parentNode->nodeName;
                if ($typeNode === 'cartes') {
                    $index = 0;
                    foreach ($rows->where('type', 'carte') as $item) {
                        if ($index === 0) {
                            $node->appendChild($dom->createCDATASection($item->mesurescorrectives));
                            break;
                        }
                        $index++;
                    }
                } elseif ($typeNode === 'cheques') {
                    $index = 0;
                    foreach ($rows->where('type', 'cheque') as $item) {
                        if ($index === 0) {
                            $node->appendChild($dom->createCDATASection($item->mesurescorrectives));
                            break;
                        }
                        $index++;
                    }
                }
            }


            return response($xml->asXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="reclamationchequecarte_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'tarificationchequecarte') {
            $rows = \App\Models\TarificationChequeCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><tarificationchequecarte></tarificationchequecarte>');

            $tarification = $xml->addChild('tarification');
            $tarification->addChild('debutperiode', $request->debut_periode);
            $tarification->addChild('finperiode', $request->fin_periode);

            $details = $xml->addChild('details');

            $cartes = $details->addChild('cartes');
            foreach ($rows->where('type', 'carte') as $item) {
                $service = $cartes->addChild('typeservice');
                $service->addAttribute('code', $item->code);
                $service->addChild('coutminimum', $item->coutminimum);
            }

            $cheques = $details->addChild('cheques');
            foreach ($rows->where('type', 'cheque') as $item) {
                $service = $cheques->addChild('typeservice');
                $service->addAttribute('code', $item->code);
                $service->addChild('coutminimum', $item->coutminimum);
            }

            return response($xml->asXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="tarificationchequecarte_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'typologiecheque') {
            $rows = \App\Models\TypologieCheque::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><typologiecheque></typologiecheque>');

            $typologie = $xml->addChild('typologie');
            $typologie->addChild('debutperiode', $request->debut_periode);
            $typologie->addChild('finperiode', $request->fin_periode);
            $typologie->addChild('totalcheque', $rows->sum('nbcheque'));

            $details = $xml->addChild('details');

            foreach ($rows as $item) {
                $type = $details->addChild('typecheque');
                $type->addAttribute('code', $item->code);
                $type->addChild('description', ''); // Placeholder for CDATA
                $type->addChild('nbcheque', $item->nbcheque);
            }

            // Add CDATA for description nodes
            $dom = dom_import_simplexml($xml)->ownerDocument;
            $xpath = new \DOMXPath($dom);
            $descriptionNodes = $dom->getElementsByTagName('description');
            $i = 0;
            foreach ($rows as $item) {
                if ($descriptionNodes->item($i)) {
                    $descNode = $descriptionNodes->item($i);
                    while ($descNode->hasChildNodes()) {
                        $descNode->removeChild($descNode->firstChild);
                    }
                    $descNode->appendChild($dom->createCDATASection($item->description));
                }
                $i++;
            }

            return response($xml->asXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="typologiecheque_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'utilisationcarte') {
            $rows = \App\Models\UtilisationCarte::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><utilisationcarte></utilisationcarte>');

            $util = $xml->addChild('utilisation');
            $util->addChild('debutperiode', $request->debut_periode);
            $util->addChild('finperiode', $request->fin_periode);
            $util->addChild('totalnbcarte', $rows->sum('nbcarte'));
            $util->addChild('totalvaleurcfa', $rows->sum('valeurcfa'));

            $details = $xml->addChild('details');

            foreach ($rows as $item) {
                $service = $details->addChild('typeservice');
                $service->addAttribute('code', $item->code);
                $service->addChild('description', ''); // Placeholder for CDATA
                $service->addChild('nbcarte', $item->nbcarte);
                $service->addChild('valeurcfa', $item->valeurcfa);
            }

            // Add CDATA for description nodes
            $dom = dom_import_simplexml($xml)->ownerDocument;
            $descriptionNodes = $dom->getElementsByTagName('description');
            $i = 0;
            foreach ($rows as $item) {
                if ($descriptionNodes->item($i)) {
                    $descNode = $descriptionNodes->item($i);
                    while ($descNode->hasChildNodes()) {
                        $descNode->removeChild($descNode->firstChild);
                    }
                    $descNode->appendChild($dom->createCDATASection($item->description));
                }
                $i++;
            }

            return response($xml->asXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="utilisationcarte_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'utilisationcheque') {
            $rows = \App\Models\UtilisationCheque::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><utilisationcheque></utilisationcheque>');

            $util = $xml->addChild('utilisation');
            $util->addChild('debutperiode', $request->debut_periode);
            $util->addChild('finperiode', $request->fin_periode);
            $util->addChild('totalnbcheque', $rows->sum('nbcheque'));
            $util->addChild('totalvaleurcfa', $rows->sum('valeurcfa'));

            $details = $xml->addChild('details');

            foreach ($rows as $item) {
                $node = $details->addChild('typeservice');
                $node->addAttribute('code', $item->code);
                $node->addChild('description', ''); // Placeholder for CDATA
                $node->addChild('nbcheque', $item->nbcheque);
                $node->addChild('valeurcfa', $item->valeurcfa);
            }

            // Add CDATA for description nodes
            $dom = dom_import_simplexml($xml)->ownerDocument;
            $descriptionNodes = $dom->getElementsByTagName('description');
            $i = 0;
            foreach ($rows as $item) {
                if ($descriptionNodes->item($i)) {
                    $descNode = $descriptionNodes->item($i);
                    while ($descNode->hasChildNodes()) {
                        $descNode->removeChild($descNode->firstChild);
                    }
                    $descNode->appendChild($dom->createCDATASection($item->description));
                }
                $i++;
            }

            return response($xml->asXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="utilisationcheque_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'risquestra') {
            $periode = \App\Models\RisqueStra::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->first();

            if (!$periode) {
                return back()->withErrors(['type' => 'Aucune déclaration trouvée pour cette période.']);
            }

            $details = \App\Models\RisqueStraDetail::where('risque_stra_id', $periode->id)->get();

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><risquestra></risquestra>');

            $decl = $xml->addChild('declaration');
            $decl->addChild('debutperiode', $periode->debut_periode);
            $decl->addChild('finperiode', $periode->fin_periode);
            $decl->addChild('nb_risque', $details->count());

            $detailNode = $xml->addChild('details');

            foreach ($details as $item) {
                $typeRisque = $detailNode->addChild('type_risque');
                $typeRisque->addAttribute('code', $item->code);
                $typeRisque->addChild('risque', ''); // Placeholder
                $typeRisque->addChild('mecanisme_maitrise', ''); // Placeholder
            }

            // Add CDATA for 'risque' and 'mecanisme_maitrise'
            $dom = dom_import_simplexml($xml)->ownerDocument;
            $xpath = new \DOMXPath($dom);
            $typeRisqueNodes = $dom->getElementsByTagName('type_risque');
            $i = 0;
            foreach ($details as $item) {
                $typeRisqueNode = $typeRisqueNodes->item($i);
                if ($typeRisqueNode) {
                    foreach ($typeRisqueNode->childNodes as $child) {
                        if ($child->nodeName === 'risque') {
                            while ($child->hasChildNodes()) {
                                $child->removeChild($child->firstChild);
                            }
                            $child->appendChild($dom->createCDATASection($item->risque));
                        }
                        if ($child->nodeName === 'mecanisme_maitrise') {
                            while ($child->hasChildNodes()) {
                                $child->removeChild($child->firstChild);
                            }
                            $child->appendChild($dom->createCDATASection($item->mecanisme_maitrise));
                        }
                    }
                }
                $i++;
            }

            return response($xml->asXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="risquestra_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'incidentstra') {
            // On récupère tous les incidents de cette période
            $incidents = \App\Models\IncidentStra::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            if ($incidents->isEmpty()) {
                return back()->withErrors(['type' => 'Aucune déclaration trouvée pour cette période.']);
            }

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><incidentstra></incidentstra>');

            $decl = $xml->addChild('declaration');
            $decl->addChild('debutperiode', $request->debut_periode);
            $decl->addChild('finperiode', $request->fin_periode);
            $decl->addChild('totalincidents', $incidents->sum('nboccurrence'));
            $decl->addChild('totalimpactfinancier', $incidents->sum('impactfinancier'));

            $detailsNode = $xml->addChild('details');

            foreach ($incidents as $incident) {
                $inc = $detailsNode->addChild('incident');
                $inc->addChild('plateformetechnique', $incident->plateformetechnique);
                $inc->addChild('risque', ''); // Placeholder
                $inc->addChild('dateincident', $incident->dateincident);
                $inc->addChild('libelleincident', ''); // Placeholder
                $inc->addChild('nboccurrence', $incident->nboccurrence);
                $inc->addChild('descriptiondetaillee', ''); // Placeholder
                $inc->addChild('mesurescorrectives', ''); // Placeholder
                $inc->addChild('impactfinancier', $incident->impactfinancier);
                $inc->addChild('statutincident', $incident->statutincident);
                $inc->addChild('datecloture', $incident->datecloture);
                $inc->addChild('naturedeclaration', ''); // Placeholder
                $inc->addChild('reference', $incident->reference);
            }

            // Add CDATA for the relevant nodes
            $dom = dom_import_simplexml($xml)->ownerDocument;
            $incidentNodes = $dom->getElementsByTagName('incident');
            $i = 0;
            foreach ($incidents as $incident) {
                $incidentNode = $incidentNodes->item($i);
                if ($incidentNode) {
                    foreach ($incidentNode->childNodes as $child) {
                        if ($child->nodeName === 'risque') {
                            while ($child->hasChildNodes()) {
                                $child->removeChild($child->firstChild);
                            }
                            $child->appendChild($dom->createCDATASection($incident->risque));
                        }
                        if ($child->nodeName === 'libelleincident') {
                            while ($child->hasChildNodes()) {
                                $child->removeChild($child->firstChild);
                            }
                            $child->appendChild($dom->createCDATASection($incident->libelleincident));
                        }
                        if ($child->nodeName === 'descriptiondetaillee') {
                            while ($child->hasChildNodes()) {
                                $child->removeChild($child->firstChild);
                            }
                            $child->appendChild($dom->createCDATASection($incident->descriptiondetaillee));
                        }
                        if ($child->nodeName === 'mesurescorrectives') {
                            while ($child->hasChildNodes()) {
                                $child->removeChild($child->firstChild);
                            }
                            $child->appendChild($dom->createCDATASection($incident->mesurescorrectives));
                        }
                        if ($child->nodeName === 'naturedeclaration') {
                            while ($child->hasChildNodes()) {
                                $child->removeChild($child->firstChild);
                            }
                            $child->appendChild($dom->createCDATASection($incident->naturedeclaration ?? ''));
                        }
                    }
                }
                $i++;
            }

            return response($dom->saveXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="incidentstra_' . $request->debut_periode . '.xml"');
        } elseif ($request->type === 'fraudestra') {
            $rows = \App\Models\FraudeStra::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            if ($rows->isEmpty()) {
                return back()->withErrors(['type' => 'Aucune donnée trouvée pour cette période.']);
            }

            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true;

            $root = $dom->createElement('fraudestra');
            $dom->appendChild($root);

            $header = $dom->createElement('declaration');
            $header->appendChild($dom->createElement('debutperiode', $request->debut_periode));
            $header->appendChild($dom->createElement('finperiode', $request->fin_periode));
            $header->appendChild($dom->createElement('nb_fraude', $rows->sum('nb_fraude')));
            $header->appendChild($dom->createElement('valeur_fraude', $rows->sum('valeur_fraude')));
            $root->appendChild($header);

            $details = $dom->createElement('details');
            foreach ($rows as $item) {
                $data = $dom->createElement('data');
                $data->appendChild($dom->createElement('fraude', $item->code));
                $data->appendChild($dom->createElement('service', $item->service));
                $data->appendChild($dom->createElement('nb_fraude', $item->nb_fraude));
                $data->appendChild($dom->createElement('valeur_fraude', $item->valeur_fraude));

                $mesures = $dom->createElement('mesures_correctives');
                $mesures->appendChild($dom->createCDATASection($item->mesures_correctives));
                $data->appendChild($mesures);

                $mode = $dom->createElement('mode_operatoire');
                $mode->appendChild($dom->createCDATASection($item->mode_operatoire));
                $data->appendChild($mode);

                $data->appendChild($dom->createElement('debut_fraude', $item->debut_fraude));
                $data->appendChild($dom->createElement('fin_fraude', $item->fin_fraude));

                $details->appendChild($data);
            }

            $root->appendChild($details);

            return response($dom->saveXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="fraudestra_' . $request->debut_periode . '_' . $request->fin_periode . '.xml"');
        } elseif ($request->type === 'operationstra') {
            $rows = \App\Models\OperationStra::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            if ($rows->isEmpty()) {
                return back()->withErrors(['type' => 'Aucune donnée trouvée pour cette période.']);
            }

            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true;

            $root = $dom->createElement('operationstra');
            $dom->appendChild($root);

            // Déclaration
            $header = $dom->createElement('declaration');
            $header->appendChild($dom->createElement('debutperiode', $request->debut_periode));
            $header->appendChild($dom->createElement('finperiode', $request->fin_periode));
            $header->appendChild($dom->createElement('nb_transaction_emission', $rows->sum('nb_transaction_emission')));
            $header->appendChild($dom->createElement('valeur_transaction_emission', $rows->sum('valeur_transaction_emission')));
            $header->appendChild($dom->createElement('nb_transaction_reception', $rows->sum('nb_transaction_reception')));
            $header->appendChild($dom->createElement('valeur_transaction_reception', $rows->sum('valeur_transaction_reception')));
            $root->appendChild($header);

            // Détails
            $details = $dom->createElement('details');
            foreach ($rows as $row) {
                $data = $dom->createElement('data');
                $data->appendChild($dom->createElement('service', $row->service));
                $data->appendChild($dom->createElement('pays', $row->pays));
                $data->appendChild($dom->createElement('motif', $row->motif));
                $data->appendChild($dom->createElement('nb_transaction_emission', $row->nb_transaction_emission));
                $data->appendChild($dom->createElement('valeur_transaction_emission', $row->valeur_transaction_emission));
                $data->appendChild($dom->createElement('nb_transaction_reception', $row->nb_transaction_reception));
                $data->appendChild($dom->createElement('valeur_transaction_reception', $row->valeur_transaction_reception));
                $details->appendChild($data);
            }
            $root->appendChild($details);

            return response($dom->saveXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="operationstra_' . $request->debut_periode . '_' . $request->fin_periode . '.xml"');
        } elseif ($request->type === 'reclamstra') {
            $rows = \App\Models\ReclamationStra::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            if ($rows->isEmpty()) {
                return back()->withErrors(['type' => 'Aucune donnée trouvée pour cette période.']);
            }

            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true;

            $root = $dom->createElement('reclamationstra');
            $dom->appendChild($root);

            // <declaration>
            $header = $dom->createElement('declaration');
            $header->appendChild($dom->createElement('debutperiode', $request->debut_periode));
            $header->appendChild($dom->createElement('finperiode', $request->fin_periode));
            $header->appendChild($dom->createElement('nb_recu', $rows->sum('nb_recu')));
            $header->appendChild($dom->createElement('nb_traite', $rows->sum('nb_traite')));
            $root->appendChild($header);

            // <details>
            $details = $dom->createElement('details');

            foreach ($rows as $row) {
                $data = $dom->createElement('data');

                $data->appendChild($dom->createElement('service', $row->service));
                $data->appendChild($dom->createElement('nb_recu', $row->nb_recu));
                $data->appendChild($dom->createElement('nb_traite', $row->nb_traite));

                $motif = $dom->createElement('motif_reclamation');
                $motif->appendChild($dom->createCDATASection($row->motif_reclamation));
                $data->appendChild($motif);

                $proc = $dom->createElement('procedure_traitement');
                $proc->appendChild($dom->createCDATASection($row->procedure_traitement));
                $data->appendChild($proc);

                $details->appendChild($data);
            }

            $root->appendChild($details);

            return response($dom->saveXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="reclamationstra_' . $request->debut_periode . '_' . $request->fin_periode . '.xml"');
        } elseif ($request->type === 'ecosysteme') {
            $rows = \App\Models\Ecosysteme::where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            if ($rows->isEmpty()) {
                return back()->withErrors(['type' => 'Aucune donnée trouvée pour cette période.']);
            }

            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true;

            $root = $dom->createElement('ecosysteme');
            $dom->appendChild($root);

            // Section <declaration>
            $header = $dom->createElement('declaration');
            $header->appendChild($dom->createElement('debutperiode', $request->debut_periode));
            $header->appendChild($dom->createElement('finperiode', $request->fin_periode));
            $header->appendChild($dom->createElement('nbsous_agents', $rows->sum('nbsous_agents')));
            $header->appendChild($dom->createElement('nbpoints_service', $rows->sum('nbpoints_service')));

            $modalite = $dom->createElement('modalite_controle_sousagents');
            $modalite->appendChild($dom->createCDATASection(optional($rows->first())->modalite_controle_sousagents ?? ''));
            $header->appendChild($modalite);

            $root->appendChild($header);

            // Section <details>
            $details = $dom->createElement('details');

            foreach ($rows as $row) {
                $service = $dom->createElement('service');
                $service->appendChild($dom->createElement('service_offert', $row->service_offert));

                $desc = $dom->createElement('description_service');
                $desc->appendChild($dom->createCDATASection($row->description_service));
                $service->appendChild($desc);

                $service->appendChild($dom->createElement('operateur', $row->operateur));
                $service->appendChild($dom->createElement('pays_operateur', $row->pays_operateur));
                $service->appendChild($dom->createElement('perimetre_partenariat', $row->perimetre_partenariat));
                $service->appendChild($dom->createElement('debut_partenariat', $row->debut_partenariat));
                if ($row->fin_partenariat) {
                    $service->appendChild($dom->createElement('fin_partenariat', $row->fin_partenariat));
                }

                $details->appendChild($service);
            }

            $root->appendChild($details);

            return response($dom->saveXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="ecosysteme_' . $request->debut_periode . '_' . $request->fin_periode . '.xml"');
        } elseif ($request->type === 'annuaire') {
            $annuaires = \App\Models\AnnuaireStra::with(['services.transactions'])
                ->where('debut_periode', $request->debut_periode)
                ->where('fin_periode', $request->fin_periode)
                ->get();

            if ($annuaires->isEmpty()) {
                return back()->withErrors(['type' => 'Aucune donnée trouvée pour cette période.']);
            }

            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true;

            $root = $dom->createElement('annuairestra');
            $dom->appendChild($root);

            foreach ($annuaires as $annuaire) {
                // <declaration>
                $header = $dom->createElement('declaration');
                $header->appendChild($dom->createElement('debutperiode', $annuaire->debut_periode));
                $header->appendChild($dom->createElement('finperiode', $annuaire->fin_periode));
                $header->appendChild($dom->createElement('nbsous_agents', $annuaire->nbsous_agents));
                $header->appendChild($dom->createElement('nbpoints_service', $annuaire->nbpoints_service));
                $header->appendChild($dom->createElement('nb_emission_intra', $annuaire->nb_emission_intra));
                $header->appendChild($dom->createElement('valeur_emission_intra', $annuaire->valeur_emission_intra));
                $header->appendChild($dom->createElement('nb_emission_hors', $annuaire->nb_emission_hors));
                $header->appendChild($dom->createElement('valeur_emission_hors', $annuaire->valeur_emission_hors));
                $header->appendChild($dom->createElement('nb_reception_intra', $annuaire->nb_reception_intra));
                $header->appendChild($dom->createElement('valeur_reception_intra', $annuaire->valeur_reception_intra));
                $header->appendChild($dom->createElement('nb_reception_hors', $annuaire->nb_reception_hors));
                $header->appendChild($dom->createElement('valeur_reception_hors', $annuaire->valeur_reception_hors));
                $root->appendChild($header);

                // <details>
                $details = $dom->createElement('details');
                foreach ($annuaire->services as $service) {
                    $dataNode = $dom->createElement('data');
                    $dataNode->appendChild($dom->createElement('operateur', $service->operateur));
                    $dataNode->appendChild($dom->createElement('nbsous_agents', $service->nbsous_agents));
                    $dataNode->appendChild($dom->createElement('nbpoints_service', $service->nbpoints_service));

                    // <service code="...">
                    $serviceNode = $dom->createElement('service');
                    $serviceNode->setAttribute('code', $service->code_service);

                    $desc = $dom->createElement('description_service');
                    $desc->appendChild($dom->createCDATASection($service->description_service ?? ''));
                    $serviceNode->appendChild($desc);

                    $serviceNode->appendChild($dom->createElement('date_lancement', $service->date_lancement));
                    $serviceNode->appendChild($dom->createElement('perimetre', $service->perimetre));
                    $serviceNode->appendChild($dom->createElement('mecanisme_compensation_reglement', $service->mecanisme_compensation_reglement));

                    // Transactions séparées
                    $emissionNode = $dom->createElement('emission');
                    $receptionNode = $dom->createElement('reception');

                    foreach ($service->transactions as $transaction) {
                        if ($transaction->type_transaction === 'emission') {
                            $tx = $dom->createElement('transaction');
                            if ($transaction->mode_envoi) {
                                $tx->appendChild($dom->createElement('mode_envoi', $transaction->mode_envoi));
                            }
                            if ($transaction->mode_reception) {
                                $tx->appendChild($dom->createElement('mode_reception', $transaction->mode_reception));
                            }
                            $tx->appendChild($dom->createElement('nb_emission_intra', $transaction->nb_intra));
                            $tx->appendChild($dom->createElement('valeur_emission_intra', $transaction->valeur_intra));
                            $tx->appendChild($dom->createElement('nb_emission_hors', $transaction->nb_hors));
                            $tx->appendChild($dom->createElement('valeur_emission_hors', $transaction->valeur_hors));
                            $emissionNode->appendChild($tx);
                        } elseif ($transaction->type_transaction === 'reception') {
                            $tx = $dom->createElement('transaction');
                            if ($transaction->mode_envoi) {
                                $tx->appendChild($dom->createElement('mode_envoi', $transaction->mode_envoi));
                            }
                            if ($transaction->mode_reception) {
                                $tx->appendChild($dom->createElement('mode_reception', $transaction->mode_reception));
                            }
                            $tx->appendChild($dom->createElement('nb_reception_intra', $transaction->nb_intra));
                            $tx->appendChild($dom->createElement('valeur_reception_intra', $transaction->valeur_intra));
                            $tx->appendChild($dom->createElement('nb_reception_hors', $transaction->nb_hors));
                            $tx->appendChild($dom->createElement('valeur_reception_hors', $transaction->valeur_hors));
                            $receptionNode->appendChild($tx);
                        }
                    }

                    if ($emissionNode->hasChildNodes()) {
                        $serviceNode->appendChild($emissionNode);
                    }
                    if ($receptionNode->hasChildNodes()) {
                        $serviceNode->appendChild($receptionNode);
                    }

                    $dataNode->appendChild($serviceNode);
                    $details->appendChild($dataNode);
                }
                $root->appendChild($details);
            }

            return response($dom->saveXML(), 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="annuairestra_' . $request->debut_periode . '_' . $request->fin_periode . '.xml"');
        }


        return back()->with('error', 'Type de déclaration non supporté.');
    }
}
