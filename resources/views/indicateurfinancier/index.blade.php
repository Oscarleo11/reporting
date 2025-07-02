@extends('layouts.dashboard')

@section('title', 'Indicateurs Financiers enregistrés')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-coins text-primary mr-2"></i> Indicateurs Financiers enregistrés</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('indicateurfinancier.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Nouvelle déclaration
                </a>
            </div>        
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @forelse ($indicateurs as $periode => $group)
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Période du {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                                —
                                {{ \Carbon\Carbon::parse($group->first()->fin_periode)->format('d/m/Y') }}
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Code</th>
                                        <th>Intitulé</th>
                                        <th>Valeur (CFA)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group as $item)
                                        <tr>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->intitule }}</td>
                                            <td>{{ number_format($item->valeur, 0, ',', ' ') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        Aucune donnée enregistrée.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection