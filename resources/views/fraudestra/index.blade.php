@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold mb-6">📋 Fraudes STRA enregistrées</h2>

        @forelse($fraudes as $periode => $group)
            @php $first = $group->first(); @endphp

            <div class="mb-8 border border-gray-200 rounded shadow p-4 bg-white">
                <h3 class="text-lg font-semibold text-red-700 mb-2">
                    Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }} —
                    {{ \Carbon\Carbon::parse($first->fin_periode)->format('d/m/Y') }}
                </h3>

                <p class="text-sm text-gray-600 mb-4">
                    Total fraudes : {{ $group->sum('nb_fraude') }} |
                    Valeur totale : {{ number_format($group->sum('valeur_fraude'), 0, ',', ' ') }} CFA
                </p>

                @foreach($group as $fraude)
                    <div class="p-4 border rounded bg-gray-50 mb-4">
                        <p><strong>Code fraude :</strong> {{ $fraude->fraude }}</p>
                        <p><strong>Service :</strong> {{ $fraude->service }}</p>
                        <p><strong>Nb Fraudes :</strong> {{ $fraude->nb_fraude }}</p>
                        <p><strong>Valeur :</strong> {{ number_format($fraude->valeur_fraude, 0, ',', ' ') }} CFA</p>
                        <p><strong>Dates :</strong> du {{ \Carbon\Carbon::parse($fraude->debut_fraude)->format('d/m/Y') }} au {{ \Carbon\Carbon::parse($fraude->fin_fraude)->format('d/m/Y') }}</p>
                        <p><strong>Mode opératoire :</strong> {{ $fraude->mode_operatoire }}</p>
                        <p><strong>Mesures :</strong> {{ $fraude->mesures_correctives }}</p>
                    </div>
                @endforeach
            </div>
        @empty
            <p class="text-gray-500 italic">Aucune fraude enregistrée.</p>
        @endforelse
    </div>
</div>
@endsection
