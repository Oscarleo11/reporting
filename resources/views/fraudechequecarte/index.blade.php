@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-6">Historique des fraudes</h2>

        @foreach($fraudes as $periode => $group)
            <div class="mb-8 bg-white p-6 rounded shadow">
                <h3 class="text-lg font-bold mb-3 text-blue-800">Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}</h3>
                <table class="w-full table-auto border-collapse text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-2 py-2">Type</th>
                            <th class="border px-2 py-2">Code</th>
                            <th class="border px-2 py-2">Date fraude</th>
                            <th class="border px-2 py-2">Libellé</th>
                            <th class="border px-2 py-2">Nb fraudes</th>
                            <th class="border px-2 py-2">Valeur (CFA)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group as $ligne)
                            <tr>
                                <td class="border px-2 py-1">{{ $ligne->type }}</td>
                                <td class="border px-2 py-1">{{ $ligne->codecheque }}</td>
                                <td class="border px-2 py-1">{{ \Carbon\Carbon::parse($ligne->datefraude)->format('d/m/Y') }}</td>
                                <td class="border px-2 py-1">{{ $ligne->libellefraude }}</td>
                                <td class="border px-2 py-1 text-right">{{ $ligne->nbfraude }}</td>
                                <td class="border px-2 py-1 text-right">{{ number_format($ligne->valeurcfa, 0, ',', ' ') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>
@endsection
