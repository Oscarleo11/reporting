@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold mb-6">🌐 Écosystèmes enregistrés</h2>

        @forelse($ecosystemes as $periode => $group)
            @php $first = $group->first(); @endphp

            <div class="mb-8 border border-gray-200 rounded shadow p-4 bg-white">
                <h3 class="text-lg font-semibold text-green-700 mb-2">
                    Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }} —
                    {{ \Carbon\Carbon::parse($first->fin_periode)->format('d/m/Y') }}
                </h3>

                <p class="text-sm text-gray-600 mb-3">
                    Sous-agents : {{ $first->nbsous_agents }} |
                    Points de service : {{ $first->nbpoints_service }}<br>
                    <strong>Contrôle :</strong> {{ $first->modalite_controle_sousagents }}
                </p>

                @foreach($group as $eco)
                    <div class="p-4 border rounded bg-gray-50 mb-4">
                        <p><strong>Service offert :</strong> {{ $eco->service_offert }}</p>
                        <p><strong>Description :</strong> {{ $eco->description_service }}</p>
                        <p><strong>Opérateur :</strong> {{ $eco->operateur }} ({{ $eco->pays_operateur }})</p>
                        <p><strong>Périmètre :</strong> {{ $eco->perimetre_partenariat }}</p>
                        <p><strong>Début partenariat :</strong> {{ \Carbon\Carbon::parse($eco->debut_partenariat)->format('d/m/Y') }}</p>
                        @if ($eco->fin_partenariat)
                            <p><strong>Fin partenariat :</strong> {{ \Carbon\Carbon::parse($eco->fin_partenariat)->format('d/m/Y') }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @empty
            <p class="text-gray-500 italic">Aucun écosystème enregistré.</p>
        @endforelse
    </div>
</div>
@endsection
