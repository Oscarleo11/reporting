{{-- filepath: c:\laragon\www\reporting\resources\views\declaration\xml\index.blade.php --}}
@extends('layouts.dashboard')
@section('title', 'Déclaration centralisée XML')
@section('content')
    <div class="section">
        <div class="section-header">
            <h1><i class="fas fa-file-code text-purple mr-2"></i> Déclaration centralisée XML</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('xml_exports.index') }}" class="btn btn-secondary">
                    <i class="fas fa-list mr-2"></i> Liste des fichiers XML
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <form method="POST" action="{{ route('declaration.xml.preview') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Type de déclaration</label>
                                        <select name="type" class="form-control" required>
                                            <option value="">-- Choisir un type --</option>
                                            <option value="acquisition" @selected(old('type', $type ?? '') === 'acquisition')>Acquisition de cartes</option>
                                            <option value="emission" @selected(old('type', $type ?? '') === 'emission')>Émission de cartes</option>
                                            <option value="fraudechequecarte" @selected(old('type', $type ?? '') === 'fraudechequecarte')>Fraude chèque/carte</option>
                                            <option value="incidentchequecarte" @selected(old('type', $type ?? '') === 'incidentchequecarte')>Incidents chèque/carte</option>
                                            <option value="incidentpaiementcarte" @selected(old('type', $type ?? '') === 'incidentpaiementcarte')>Incidents paiement carte</option>
                                            <option value="incidentpaiementcheque" @selected(old('type', $type ?? '') === 'incidentpaiementcheque')>Incidents paiement chèque</option>
                                            <option value="reclamationchequecarte" @selected(old('type', $type ?? '') === 'reclamationchequecarte')>Réclamations chèque/carte</option>
                                            <option value="tarificationchequecarte" @selected(old('type', $type ?? '') === 'tarificationchequecarte')>Tarification carte / chèque</option>
                                            <option value="typologiecheque" @selected(old('type', $type ?? '') === 'typologiecheque')>Typologie chèques</option>
                                            <option value="utilisationcarte" @selected(old('type', $type ?? '') === 'utilisationcarte')>Utilisation carte</option>
                                            <option value="utilisationcheque" @selected(old('type', $type ?? '') === 'utilisationcheque')>Utilisation chèque</option>
                                            <option value="risquestra" @selected(old('type', $type ?? '') === 'risquestra')>Risques STRA</option>
                                            <option value="incidentstra" @selected(old('type', $type ?? '') === 'incidentstra')>Incidents STRA</option>
                                            <option value="ecosysteme" @selected(old('type', $type ?? '') === 'ecosysteme')>Écosystème STRA</option>
                                            <option value="fraudestra" @selected(old('type', $type ?? '') === 'fraudestra')>Fraudes STRA</option>
                                            <option value="operationstra" @selected(old('type', $type ?? '') === 'operationstra')>Opérations STRA </option>
                                            <option value="reclamationstra" @selected(old('type', $type ?? '') === 'reclamationstra')>Réclamations STRA</option>
                                            <option value="annuaire" @selected(old('type', $type ?? '') === 'annuaire')>Annuaire STRA</option>
                                            <option value="declarationincident" @selected(old('type', $type ?? '') === 'annuaire')>Declaration Incident</option>
                                            <option value="declarationratios" @selected(old('type', $type ?? '') === 'declarationratios')>Declaration Ratios</option>
                                            <option value="declarationreclamation" @selected(old('type', $type ?? '') === 'declarationreclamation')>Declaration Reclamation</option>
                                            <option value="declarationfraude" @selected(old('type', $type ?? '') === 'declarationfraude')>Declaration Fraude</option>
                                            <option value="indicateurfinancier" @selected(old('type', $type ?? '') === 'indicateurfinancier')>Indicateur Financier</option>
                                            <option value="declarationsfm" @selected(old('type', $type ?? '') === 'declarationsfm')>Declaration SFM</option>
                                            <option value="placementfinancier" @selected(old('type', $type ?? '') === 'placementfinancier')>Placement Financier</option>
                                            <option value="controlencours" @selected(old('type', $type ?? '') === 'controlencours')>Controle Encours</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Début période</label>
                                        <input type="date" name="debut_periode"
                                            value="{{ old('debut_periode', $debut_periode ?? '') }}" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Fin période</label>
                                        <input type="date" name="fin_periode"
                                            value="{{ old('fin_periode', $fin_periode ?? '') }}" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-purple px-5">
                                        <i class="fas fa-search"></i> Voir les données
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @isset($donnees)
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light">
                                <h5 class="mb-0 text-primary">
                                    <i class="fas fa-database mr-2"></i> Résultats de la recherche
                                </h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $isEmpty = is_array($donnees) ? empty($donnees) : $donnees->isEmpty();
                                    $count = is_array($donnees) ? count($donnees) : $donnees->count();
                                @endphp
                                @if ($isEmpty)
                                    <div class="alert alert-warning mb-0">
                                        <i class="fas fa-exclamation-triangle mr-2"></i>
                                        Aucune donnée trouvée pour la période sélectionnée.
                                    </div>
                                @else
                                    <div class="mb-4">
                                        <h6 class="font-weight-bold">Aperçu des données ({{ $count }} enregistrements)
                                        </h6>
                                        <pre class="bg-white border rounded p-3 text-sm mb-0"><code>{{ json_encode($donnees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</code></pre>
                                    </div>
                                    <form method="POST" action="{{ route('declaration.xml.generate') }}">
                                        @csrf
                                        <input type="hidden" name="type" value="{{ $type }}">
                                        <input type="hidden" name="debut_periode" value="{{ $debut_periode }}">
                                        <input type="hidden" name="fin_periode" value="{{ $fin_periode }}">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-file-code mr-2"></i> Générer et Télécharger le XML
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
