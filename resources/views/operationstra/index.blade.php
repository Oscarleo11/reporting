@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold mb-6">📊 Opérations STRA enregistrées</h2>

        @forelse ($operations as $periode => $group)
            @php $first = $group->first(); @endphp
            <div class="mb-10 bg-white shadow rounded p-4 border">
                <h3 class="text-lg font-semibold text-indigo-700 mb-2">
                    Période du {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }} au {{ \Carbon\Carbon::parse($first->fin_periode)->format('d/m/Y') }}
                </h3>
                <p class="text-sm text-gray-600 mb-4">
                    Total émissions : {{ $first->total_nb_emission }} ({{ number_format($first->total_valeur_emission, 0, ',', ' ') }} CFA) —
                    Réceptions : {{ $first->total_nb_reception }} ({{ number_format($first->total_valeur_reception, 0, ',', ' ') }} CFA)
                </p>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-300 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left font-medium">Service</th>
                                <th class="px-4 py-2 text-left font-medium">Pays</th>
                                <th class="px-4 py-2 text-left font-medium">Motif</th>
                                <th class="px-4 py-2 text-center font-medium">Nb Émission</th>
                                <th class="px-4 py-2 text-center font-medium">Valeur Émission</th>
                                <th class="px-4 py-2 text-center font-medium">Nb Réception</th>
                                <th class="px-4 py-2 text-center font-medium">Valeur Réception</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($group as $op)
                                <tr>
                                    <td class="px-4 py-2">{{ $op->service }}</td>
                                    <td class="px-4 py-2">{{ $op->pays }}</td>
                                    <td class="px-4 py-2">{{ $op->motif }}</td>
                                    <td class="px-4 py-2 text-center">{{ $op->nb_transaction_emission }}</td>
                                    <td class="px-4 py-2 text-center">{{ number_format($op->valeur_transaction_emission, 0, ',', ' ') }}</td>
                                    <td class="px-4 py-2 text-center">{{ $op->nb_transaction_reception }}</td>
                                    <td class="px-4 py-2 text-center">{{ number_format($op->valeur_transaction_reception, 0, ',', ' ') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <p class="text-gray-500 italic">Aucune déclaration d’opération STRA trouvée.</p>
        @endforelse
    </div>
</div>
@endsection
