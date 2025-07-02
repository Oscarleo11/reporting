@extends('layouts.dashboard')

@section('title', 'Déclarations de Fraudes')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-shield-alt text-primary mr-2"></i> Déclarations de Fraudes</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('declarationfraude.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Nouvelle déclaration
                </a>
            </div>        
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @forelse($fraudes as $periode => $group)
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                                —
                                {{ \Carbon\Carbon::parse($group->first()->fin_periode)->format('d/m/Y') }}
                            </h5>
                            <small>
                                Nombre total : <strong>{{ $group->sum('nbtransaction') }}</strong>
                                | Valeur : <strong>{{ number_format($group->sum('valeurtransaction'), 0, ',', ' ') }} CFA</strong>
                            </small>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Nb transactions</th>
                                        <th>Valeur (CFA)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group as $fraude)
                                        <tr>
                                            <td>{{ $fraude->code }}</td>
                                            <td>{{ $fraude->description }}</td>
                                            <td>{{ $fraude->nbtransaction }}</td>
                                            <td>{{ number_format($fraude->valeurtransaction, 0, ',', ' ') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        Aucune fraude enregistrée.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
