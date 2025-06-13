@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-6">Utilisation des cartes</h2>

        @foreach($utilisations as $periode => $group)
            <div class="mb-8 bg-white p-6 rounded shadow">
                <h3 class="text-lg font-bold mb-3 text-indigo-800">
                    Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                </h3>

                <table class="w-full text-sm border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-2 py-2">Code</th>
                            <th class="border px-2 py-2">Description</th>
                            <th class="border px-2 py-2 text-right">Nb cartes</th>
                            <th class="border px-2 py-2 text-right">Valeur CFA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group as $ligne)
                            <tr>
                                <td class="border px-2 py-1">{{ $ligne->code }}</td>
                                <td class="border px-2 py-1">{{ $ligne->description }}</td>
                                <td class="border px-2 py-1 text-right">{{ $ligne->nbcarte }}</td>
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
