@extends('layouts.app')

@section('content')
    @foreach ($acquisitions as $periode => $group)
        <div class="mb-8 bg-white p-6 rounded shadow">
            <h3 class="text-lg font-bold mb-3 text-blue-800">Période :
                {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}</h3>
            <table class="w-full table-auto border-collapse text-sm">
                <thead class="bg-gray-100">
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 text-left">Type</th>
                        <th class="border px-4 py-2 text-left">Tarif</th>
                        <th class="border px-4 py-2 text-left">Plafon de rcharge</th>
                        <th class="border px-4 py-2 text-left">Retrait journalier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($group as $ligne)
                        <tr>
                            <td class="border px-4 py-2">{{ $ligne->code_type }}</td>
                            <td class="border px-4 py-2">{{ $ligne->tarif }}</td>
                            <td class="border px-4 py-2">{{ $ligne->plafond_rechargement }}</td>
                            <td class="border px-4 py-2">{{ $ligne->plafond_retrait_journalier }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</section>
@endsection


{{--         --}}
