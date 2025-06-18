{{-- filepath: c:\laragon\www\reporting\resources\views\annuairestra\index.blade.php --}}
@extends('layouts.dashboard')
@section('title', 'Annuaire STRA')
@section('content')
<section class="section">
    <div class="section-header">
        <h1><i class="fas fa-address-book text-primary mr-2"></i> Annuaire STRA enregistrés</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('annuairestra.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouvelle déclaration
            </a>
        </div>
    </div>
    <div class="section-body">
        @forelse($stras->groupBy('debut_periode') as $periode => $group)
            @php $first = $group->first(); @endphp
            <div class="row justify-content-center mb-4">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header text-white">
                            <h4 class="mb-0">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                                @if($first && $first->fin_periode)
                                    - {{ \Carbon\Carbon::parse($first->fin_periode)->format('d/m/Y') }}
                                @endif
                            </h4>
                            <span class="small">
                                Sous-agents : <strong>{{ $first->nbsous_agents }}</strong> |
                                Points de service : <strong>{{ $first->nbpoints_service }}</strong>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Opérateur</th>
                                            <th>Code service</th>
                                            <th>Description</th>
                                            <th>Date lancement</th>
                                            <th>Périmètre</th>
                                            <th>Mécanisme compensation</th>
                                            <th>Nb sous-agents</th>
                                            <th>Points de service</th>
                                            <th>Transactions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($group as $stra)
                                            @foreach ($stra->services as $service)
                                                <tr>
                                                    <td>{{ $service->operateur }}</td>
                                                    <td>{{ $service->code_service }}</td>
                                                    <td>{{ $service->description_service }}</td>
                                                    <td>
                                                        @if($service->date_lancement)
                                                            {{ \Carbon\Carbon::parse($service->date_lancement)->format('d/m/Y') }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $service->perimetre }}</td>
                                                    <td>{{ $service->mecanisme_compensation_reglement }}</td>
                                                    <td>{{ $service->nbsous_agents }}</td>
                                                    <td>{{ $service->nbpoints_service }}</td>
                                                    <td>
                                                        @if(isset($service->transactions) && count($service->transactions))
                                                            <ul class="mb-0 pl-3">
                                                                @foreach($service->transactions as $tx)
                                                                    <li>
                                                                        <strong>{{ ucfirst($tx->type_transaction) }}</strong>
                                                                        (Intra: {{ $tx->nb_intra }}/{{ number_format($tx->valeur_intra, 0, ',', ' ') }} CFA,
                                                                        Hors: {{ $tx->nb_hors }}/{{ number_format($tx->valeur_hors, 0, ',', ' ') }} CFA)
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted font-italic">Aucune déclaration enregistrée.</div>
        @endforelse
    </div>
</section>
@endsection