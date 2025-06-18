@extends('layouts.dashboard')
@section('title', 'Déclaration Écosystème')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1><i class="fas fa-network-wired text-primary mr-2"></i> Écosystèmes enregistrés</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('ecosysteme.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Nouvelle déclaration
                </a>
            </div>
        </div>
        <div class="section-body">
            @forelse($ecosystemes as $periode => $group)
                @php $first = $group->first(); @endphp
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-header text-white">
                                <h4 class="mb-0">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                                    - {{ \Carbon\Carbon::parse($first->fin_periode)->format('d/m/Y') }}
                                </h4>
                                <span class="small">
                                    Sous-agents : <strong>{{ $first->nbsous_agents }}</strong> |
                                    Points de service : <strong>{{ $first->nbpoints_service }}</strong><br>
                                    <strong>Contrôle :</strong> {{ $first->modalite_controle_sousagents }}
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-sm mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Service offert</th>
                                                <th>Description</th>
                                                <th>Opérateur</th>
                                                <th>Pays opérateur</th>
                                                <th>Périmètre partenariat</th>
                                                <th>Début partenariat</th>
                                                <th>Fin partenariat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($group as $eco)
                                                <tr>
                                                    <td>{{ $eco->service_offert }}</td>
                                                    <td>{{ $eco->description_service }}</td>
                                                    <td>{{ $eco->operateur }}</td>
                                                    <td>{{ $eco->pays_operateur }}</td>
                                                    <td>{{ $eco->perimetre_partenariat }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($eco->debut_partenariat)->format('d/m/Y') }}</td>
                                                    <td>
                                                        @if ($eco->fin_partenariat)
                                                            {{ \Carbon\Carbon::parse($eco->fin_partenariat)->format('d/m/Y') }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted font-italic">Aucun écosystème enregistré.</div>
            @endforelse
        </div>
    </section>
@endsection