@extends('layouts.dashboard')
@section('title', 'Réclamations STRA')
@section('content')
<section class="section">
    <div class="section-header">
        <h1><i class="fas fa-exclamation-circle text-primary mr-2"></i> Réclamations STRA enregistrées</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('reclamationstra.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouvelle déclaration
            </a>
        </div>
    </div>
    <div class="section-body">
        @forelse($reclamations as $periode => $group)
            @php $premier = $group->first(); @endphp
            <div class="row justify-content-center mb-4">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header text-prymary">
                            <h4 class="mb-0">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                                @if($premier && $premier->fin_periode)
                                    - {{ \Carbon\Carbon::parse($premier->fin_periode)->format('d/m/Y') }}
                                @endif
                            </h4>
                            <span class="small">
                                Total reçues : <strong>{{ $premier->total_recu }}</strong> |
                                Traitées : <strong>{{ $premier->total_traite }}</strong>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Service</th>
                                            <th class="text-center">Nb reçues</th>
                                            <th class="text-center">Nb traitées</th>
                                            <th>Motif</th>
                                            <th>Procédure</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($group as $rec)
                                            <tr>
                                                <td>{{ $rec->service }}</td>
                                                <td class="text-center">{{ $rec->nb_recu }}</td>
                                                <td class="text-center">{{ $rec->nb_traite }}</td>
                                                <td>{{ $rec->motif_reclamation }}</td>
                                                <td>{{ $rec->procedure_traitement }}</td>
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
            <div class="text-center text-muted font-italic">Aucune réclamation enregistrée pour le moment.</div>
        @endforelse
    </div>
</section>
@endsection