@extends('layouts.app')
@section('content')
    @foreach ($emissions as $periode => $group)
        <div class="mb-8 bg-white p-6 rounded shadow">
            <h3 class="text-lg font-bold mb-3 text-blue-800">Période :
                {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}</h3>
            <table class="w-full table-auto border-collapse text-sm">
                <thead class="bg-gray-100">
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 text-left">Famille</th>
                        <th class="border px-4 py-2 text-left">Type</th>
                        <th class="border px-4 py-2 text-left">Description</th>
                        <th class="border px-4 py-2 text-left">Nombre de cartes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($group as $ligne)
                        <tr>
                            <td class="border px-4 py-2">{{ $ligne->codefamille }}</td>
                            <td class="border px-4 py-2">{{ $ligne->codetype }}</td>
                            <td class="border px-4 py-2">{{ $ligne->description }}</td>
                            <td class="border px-4 py-2">{{ $ligne->nbcarte }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</section>
@endsection


{{--         --}}
