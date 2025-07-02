@extends('layouts.dashboard')

@section('title', 'Contrôle des encours')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-chart-line text-primary mr-2"></i> Déclarations - Contrôle des encours</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('controleencours.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouvelle déclaration
            </a>
        </div>
    </div>

    <div class="section-body">
        @forelse($list as $periode => $group)
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <strong>Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                        — {{ \Carbon\Carbon::parse($group->first()->fin_periode)->format('d/m/Y') }}</strong>
                </div>
                <div class="card-body">
                    @foreach ($group as $declaration)
                        <p><strong>Valeur finale :</strong> {{ number_format($declaration->valeurfinale, 0, ',', ' ') }} CFA</p>
                        <p><strong>Solde cantonnement :</strong> {{ number_format($declaration->soldecomptecantonnement, 0, ',', ' ') }} CFA</p>
                        <p><strong>Solde comptabilité :</strong> {{ number_format($declaration->soldecomptabilite, 0, ',', ' ') }} CFA</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="alert alert-info">Aucune déclaration enregistrée.</div>
        @endforelse
    </div>
</div>
@endsection
