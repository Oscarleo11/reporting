@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold mb-6">📋 Déclarations de Risques STRA</h2>

        @foreach ($risques as $bloc)
            <div class="bg-white shadow rounded-lg p-6 mb-6 border">
                <div class="mb-4">
                    <p><strong>Période du :</strong> {{ \Carbon\Carbon::parse($bloc->debut_periode)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($bloc->fin_periode)->format('d/m/Y') }}</p>
                    <p><strong>Nombre total de risques :</strong> {{ $bloc->nb_risque }}</p>
                </div>

                <div class="space-y-4">
                    @foreach ($bloc->details as $detail)
                        <div class="bg-gray-50 border rounded p-4">
                            <p><strong>Code :</strong> {{ $detail->code }}</p>
                            <p><strong>Risque :</strong> {{ $detail->risque }}</p>
                            <p><strong>Mécanisme de maîtrise :</strong> {{ $detail->mecanisme_maitrise }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        @if ($risques->isEmpty())
            <div class="text-gray-500 italic">Aucune déclaration enregistrée pour le moment.</div>
        @endif
    </div>
</div>
@endsection
