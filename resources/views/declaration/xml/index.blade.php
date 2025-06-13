@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="flex items-center mb-6">
                <div class="p-3 bg-purple-100 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Déclaration centralisée XML</h2>
            </div>

            <form method="POST" action="{{ route('declaration.xml.preview') }}" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Type de déclaration -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Type de déclaration</label>
                        <select name="type"
                            class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                            required>
                            <option value="">-- Choisir un type --</option>
                            <option value="acquisition" @selected(old('type', $type ?? '') === 'acquisition')>Acquisition de
                                cartes</option>
                            <option value="emission" @selected(old('type', $type ?? '') === 'emission')>Émission de cartes
                            </option>
                            <option value="fraudechequecarte" @selected(old('type', $type ?? '') === 'fraudechequecarte')>
                                Fraude chèque/carte</option>
                            <option value="incidentchequecarte" @selected(old('type', $type ?? '') === 'incidentchequecarte')>
                                Incidents chèque/carte</option>
                            <option value="incidentpaiementcarte" @selected(old('type', $type ?? '') === 'incidentpaiementcarte')>Incidents paiement carte</option>
                            <option value="incidentpaiementcheque" @selected(old('type', $type ?? '') === 'incidentpaiementcheque')>Incidents paiement chèque</option>
                            <option value="reclamationchequecarte" @selected(old('type', $type ?? '') === 'reclamationchequecarte')>Réclamations chèque/carte</option>
                            <option value="tarificationchequecarte" @selected(old('type', $type ?? '') === 'tarificationchequecarte')>Tarification carte / chèque</option>
                            <option value="typologiecheque" @selected(old('type', $type ?? '') === 'typologiecheque')>
                                Typologie chèques</option>
                            <option value="utilisationcarte" @selected(old('type', $type ?? '') === 'utilisationcarte')>
                                Utilisation carte</option>
                            <option value="utilisationcheque" @selected(old('type', $type ?? '') === 'utilisationcheque')>
                                Utilisation chèque</option>
                            <option value="risquestra" @selected(old('type', $type ?? '') === 'risquestra')>
                                Risques STRA
                            </option>
                            <option value="incidentstra" @selected(old('type', $type ?? '') === 'incidentstra')>
                                Incidents STRA
                            </option>
                            <option value="fraudestra">Déclaration de fraudes STRA</option>
                            <option value="operationstra">Opérations STRA</option>
                            <option value="reclamstra">Réclamations STRA</option>
                            <option value="ecosysteme">Écosystème</option>
                        </select>
                    </div>

                    <!-- Début période -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Début période</label>
                        <div class="relative">
                            <input type="date" name="debut_periode" value="{{ old('debut_periode', $debut_periode ?? '') }}"
                                class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                required>
                        </div>
                    </div>

                    <!-- Fin période -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Fin période</label>
                        <div class="relative">
                            <input type="date" name="fin_periode" value="{{ old('fin_periode', $fin_periode ?? '') }}"
                                class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                required>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Voir les données
                    </button>
                </div>
            </form>
        </div>

        @isset($donnees)
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center mb-6">
                    <div class="p-3 bg-blue-100 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Résultats de la recherche</h3>
                </div>

                @if ($donnees->isEmpty())
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    Aucune donnée trouvée pour la période sélectionnée.
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="mb-6 overflow-hidden border border-gray-200 rounded-lg">
                        <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                            <h4 class="text-sm font-medium text-gray-700">Aperçu des données ({{ $donnees->count() }}
                                enregistrements)</h4>
                        </div>
                        <div class="bg-gray-50 p-4 overflow-x-auto">
                            <pre
                                class="text-xs text-gray-800 bg-white p-4 rounded border border-gray-200"><code>{{ json_encode($donnees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</code></pre>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('declaration.xml.generate') }}">
                        @csrf
                        <input type="hidden" name="type" value="{{ $type }}">
                        <input type="hidden" name="debut_periode" value="{{ $debut_periode }}">
                        <input type="hidden" name="fin_periode" value="{{ $fin_periode }}">

                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Générer et Télécharger le XML
                        </button>
                    </form>
                @endif
            </div>
        @endisset
    </div>
@endsection