@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-6">Historique des réclamations</h2>

        @foreach($reclamations as $periode => $group)
            <div class="mb-8 bg-white p-6 rounded shadow">
                <h3 class="text-lg font-bold mb-3 text-indigo-800">Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}</h3>

                <table class="w-full text-sm border-collapse mb-4">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-2 py-2">Type</th>
                            <th class="border px-2 py-2">Motif</th>
                            <th class="border px-2 py-2">Traitement</th>
                            <th class="border px-2 py-2">Mesures</th>
                            <th class="border px-2 py-2 text-right">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group as $ligne)
                            <tr>
                                <td class="border px-2 py-1 font-semibold text-center text-{{ $ligne->type == 'carte' ? 'blue' : 'green' }}-600">
                                    {{ strtoupper($ligne->type) }}
                                </td>
                                <td class="border px-2 py-1">{{ $ligne->motif }}</td>
                                <td class="border px-2 py-1">{{ $ligne->etattraitement }}</td>
                                <td class="border px-2 py-1">{{ $ligne->mesurescorrectives }}</td>
                                <td class="border px-2 py-1 text-right">{{ $ligne->nbre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>
@endsection
