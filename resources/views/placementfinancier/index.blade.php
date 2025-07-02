@extends('layouts.dashboard')

@section('title', 'Placement Financier')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-piggy-bank text-primary mr-2"></i> Déclarations - Placement Financier</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('placementfinancier.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouvelle déclaration
            </a>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @forelse($placements as $periode => $group)
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <strong>Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                                — {{ \Carbon\Carbon::parse($group->first()->fin_periode)->format('d/m/Y') }}</strong>
                        </div>
                        <div class="card-body">
                            @foreach ($group as $item)
                                <ul class="list-group">
                                    <li class="list-group-item">Dépôt à vue : <strong>{{ number_format($item->depotavue, 0, ',', ' ') }} CFA</strong></li>
                                    <li class="list-group-item">Dépôt à terme : <strong>{{ number_format($item->depotaterme, 0, ',', ' ') }} CFA</strong></li>
                                    <li class="list-group-item">Titres acquis : <strong>{{ number_format($item->titreacquis, 0, ',', ' ') }} CFA</strong></li>
                                    <li class="list-group-item">Total : <strong>{{ number_format($item->total, 0, ',', ' ') }} CFA</strong></li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">Aucun enregistrement trouvé.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
