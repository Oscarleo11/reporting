@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold mb-6">📬 Réclamations STRA enregistrées</h2>

        @forelse ($reclamations->groupBy('debut_periode') as $periode => $group)
            @php $first = $group->first(); @endphp

            <div class="mb-10 bg-white border shadow rounded p-4">
                <h3 class="text-lg font-semibold text-green-700 mb-2">
                    Période du {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }} au {{ \Carbon\Carbon::parse($first->fin_periode)->format('d/m/Y') }}
                </h3>
                <p class="text-sm text-gray-600 mb-3">
                    Total reçues : {{ $first->total_recu }} | Traitées : {{ $first->total_traite }}
                </p>

                <table class="min-w-full table-auto text-sm border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Service</th>
                            <th class="border px-4 py-2">Nb reçues</th>
                            <th class="border px-4 py-2">Nb traitées</th>
                            <th class="border px-4 py-2">Motif</th>
                            <th class="border px-4 py-2">Procédure</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group as $rec)
                            <tr>
                                <td class="border px-4 py-2">{{ $rec->service }}</td>
                                <td class="border px-4 py-2 text-center">{{ $rec->nb_recu }}</td>
                                <td class="border px-4 py-2 text-center">{{ $rec->nb_traite }}</td>
                                <td class="border px-4 py-2">{{ $rec->motif_reclamation }}</td>
                                <td class="border px-4 py-2">{{ $rec->procedure_traitement }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @empty
            <p class="text-gray-500 italic">Aucune déclaration trouvée.</p>
        @endforelse
    </div>
</div>
@endsection
