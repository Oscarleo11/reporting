@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold mb-6">📋 Incidents STRA enregistrés</h2>

        @forelse($incidents->groupBy('debut_periode') as $periode => $group)
            @php
                $premier = $group->first();
            @endphp

            <div class="mb-10 border border-gray-200 rounded shadow p-4 bg-white">
                <h3 class="text-lg font-semibold text-blue-600 mb-2">
                    Période du : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                    —
                    {{ optional($premier->fin_periode)->format('d/m/Y') ?? 'Non renseignée' }}
                </h3>

                <p class="text-sm text-gray-600 mb-4">
                    ✅ <strong>Total des récurrences :</strong> {{ $premier->totalincidents ?? $group->sum('nboccurrence') }}<br>
                    💰 <strong>Impact financier total :</strong> {{ number_format($premier->totalimpactfinancier ?? $group->sum('impactfinancier'), 0, ',', ' ') }} CFA
                </p>

                <div class="space-y-4">
                    @foreach ($group as $incident)
                        <div class="p-4 border rounded bg-gray-50">
                            <p><strong>Plateforme technique :</strong> {{ $incident->plateformetechnique }}</p>
                            <p><strong>Risque :</strong> {{ $incident->risque }}</p>
                            <p><strong>Date de l’incident :</strong> {{ \Carbon\Carbon::parse($incident->dateincident)->format('d/m/Y') }}</p>
                            <p><strong>Libellé :</strong> {{ $incident->libelleincident }}</p>
                            <p><strong>Nombre d’occurrences :</strong> {{ $incident->nboccurrence }}</p>
                            <p><strong>Description :</strong> {{ $incident->descriptiondetaillee }}</p>
                            <p><strong>Mesures correctives :</strong> {{ $incident->mesurescorrectives }}</p>
                            <p><strong>Impact financier :</strong> {{ number_format($incident->impactfinancier, 0, ',', ' ') }} CFA</p>
                            <p><strong>Statut :</strong> {{ $incident->statutincident === 'T' ? 'Clôturé' : 'Non clôturé' }}</p>
                            @if ($incident->datecloture)
                                <p><strong>Date de clôture :</strong> {{ \Carbon\Carbon::parse($incident->datecloture)->format('d/m/Y') }}</p>
                            @endif
                            @if ($incident->naturedeclaration)
                                <p><strong>Nature déclaration :</strong> {{ $incident->naturedeclaration }}</p>
                            @endif
                            @if ($incident->reference)
                                <p><strong>Référence :</strong> {{ $incident->reference }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-gray-600 italic">Aucun incident enregistré pour le moment.</p>
        @endforelse
    </div>
</div>
@endsection
