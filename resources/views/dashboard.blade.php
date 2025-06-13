@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- <h2 class="text-2xl font-bold text-gray-800 mb-8">Tableau de bord - Cocotier</h2> --}}

            {{-- Section Export XML --}}
            <div class="mb-12 mt-8">
                <h3 class="text-xl font-semibold text-purple-700 mb-4">📤 Déclarations XML</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ route('declaration.xml.index') }}"
                        class="block p-4 border border-purple-200 bg-white rounded shadow hover:bg-purple-50 transition">
                        <div class="text-lg font-semibold text-gray-800">Génération centralisée</div>
                        <div class="text-sm text-gray-500">Exporter les fichiers XML à partir des données existantes</div>
                    </a>
                </div>
            </div>


            {{-- Section MPS --}}
            <div class="mb-12">
                <h3 class="text-xl font-semibold text-blue-700 mb-4">Données MPS</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ([
                        ['label' => 'Acquisition de cartes', 'route' => 'acquisition.create', 'model' => \App\Models\AcquisitionCarte::class],
                        ['label' => 'Émission de cartes', 'route' => 'emission-cartes.create', 'model' => \App\Models\EmissionCarte::class],
                        ['label' => 'Fraude chèque/carte', 'route' => 'fraudechequecarte.create', 'model' => \App\Models\FraudeChequeCarte::class],
                        ['label' => 'Incidents chèque/carte', 'route' => 'incidentchequecarte.create', 'model' => \App\Models\IncidentChequeCarte::class],
                        ['label' => 'Incidents paiement carte', 'route' => 'incidentpaiementcarte.create', 'model' => \App\Models\IncidentPaiementCarte::class],
                        ['label' => 'Incidents paiement chèque', 'route' => 'incidentpaiementcheque.create', 'model' => \App\Models\IncidentPaiementCheque::class],
                        ['label' => 'Réclamations', 'route' => 'reclamationchequecarte.create', 'model' => \App\Models\ReclamationChequeCarte::class],
                        ['label' => 'Tarification (carte & chèque)', 'route' => 'tarificationchequecarte.create', 'model' => \App\Models\TarificationChequeCarte::class],
                        ['label' => 'Typologie chèques', 'route' => 'typologiecheque.create', 'model' => \App\Models\TypologieCheque::class],
                        ['label' => 'Utilisation carte', 'route' => 'utilisationcarte.create', 'model' => \App\Models\UtilisationCarte::class],
                        ['label' => 'Utilisation chèque', 'route' => 'utilisationcheque.create', 'model' => \App\Models\UtilisationCheque::class],
                    ] as $item)
                        <a href="{{ route($item['route']) }}"
                            class="block p-4 border border-gray-200 bg-white rounded shadow hover:bg-gray-50 transition">
                            <div class="text-lg font-semibold text-gray-800">{{ $item['label'] }}</div>
                            <div class="text-sm text-gray-500">{{ $item['model']::count() }} enregistrements</div>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Section STRA --}}
            {{-- Section STRA --}}
            <div>
                <h3 class="text-xl font-semibold text-green-700 mb-4">Données STRA</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ([
                        ['label' => 'Annuaire STRA', 'route' => 'annuairestra.create', 'model' => \App\Models\AnnuaireStra::class],
                        ['label' => 'Risques STRA', 'route' => 'risquestra.create', 'model' => \App\Models\RisqueStra::class],
                        ['label' => 'Incidents STRA', 'route' => 'incidentstra.create', 'model' => \App\Models\IncidentStra::class],
                        ['label' => 'Écosystème STRA', 'route' => 'ecosysteme.create', 'model' => \App\Models\Ecosysteme::class],
                        ['label' => 'Fraudes STRA', 'route' => 'fraudestra.create', 'model' => \App\Models\FraudeStra::class],
                        ['label' => 'Opérations STRA', 'route' => 'operationstra.create', 'model' => \App\Models\OperationStra::class],
                        ['label' => 'Réclamations STRA', 'route' => 'reclamationstra.create', 'model' => \App\Models\ReclamationStra::class],
                    ] as $item)
                        <a href="{{ route($item['route']) }}"
                            class="block p-4 border border-gray-200 bg-white rounded shadow hover:bg-gray-50 transition">
                            <div class="text-lg font-semibold text-gray-800">{{ $item['label'] }}</div>
                            <div class="text-sm text-gray-500">{{ $item['model']::count() }} enregistrements</div>
                        </a>
                    @endforeach
                    
                </div>
            </div>


        </div>
    </div>
@endsection
