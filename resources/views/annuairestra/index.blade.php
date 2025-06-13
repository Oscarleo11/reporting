@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">📋 Liste des déclarations STRA</h2>

        @if ($stras->isEmpty())
            <div class="text-gray-500">Aucune déclaration enregistrée.</div>
        @else
            @foreach ($stras->groupBy('debut_periode') as $periode => $group)
                <div class="bg-white rounded shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold text-blue-700 mb-4">
                        Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                    </h3>

                    @foreach ($group as $stra)
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <p class="text-sm text-gray-600 mb-2">
                                <strong>Sous-agents :</strong> {{ $stra->nbsous_agents }},
                                <strong>Points de service :</strong> {{ $stra->nbpoints_service }},
                                <strong>Émissions intra :</strong> {{ $stra->nb_emission_intra }},
                                <strong>Réceptions hors :</strong> {{ $stra->nb_reception_hors }}
                            </p>

                            @foreach ($stra->services as $service)
                                <div class="ml-4 mb-2 text-gray-700">
                                    ▸ <strong>{{ $service->operateur }}</strong> —
                                    <span class="text-sm text-gray-500">Service : {{ $service->code_service }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
