@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-6">Tarification services cartes & chèques</h2>

        @foreach($tarifs as $periode => $group)
            <div class="mb-8 bg-white p-6 rounded shadow">
                <h3 class="text-lg font-bold mb-3 text-indigo-800">Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}</h3>

                <table class="w-full text-sm border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-2 py-2">Type</th>
                            <th class="border px-2 py-2">Code service</th>
                            <th class="border px-2 py-2 text-right">Coût minimum (CFA)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group as $ligne)
                            <tr>
                                <td class="border px-2 py-1 text-center font-semibold text-{{ $ligne->type == 'carte' ? 'blue' : 'green' }}-600">
                                    {{ strtoupper($ligne->type) }}
                                </td>
                                <td class="border px-2 py-1">{{ $ligne->code }}</td>
                                <td class="border px-2 py-1 text-right">{{ number_format($ligne->coutminimum, 0, ',', ' ') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>
@endsection
