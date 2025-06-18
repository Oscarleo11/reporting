@extends('layouts.dashboard')
@section('title', 'Déclaration de Fraudes STRA')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1><i class="fas fa-user-secret text-primary mr-2"></i> Fraudes STRA enregistrées</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('fraudestra.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Nouvelle déclaration
                </a>
            </div>
        </div>
        <div class="section-body">
            @forelse($fraudes as $periode => $group)
                @php $first = $group->first(); @endphp
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-header text-primary">
                                <h4 class="mb-0">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                                    - {{ \Carbon\Carbon::parse($first->fin_periode)->format('d/m/Y') }}
                                </h4>
                                <span class="small">
                                    Total fraudes : <strong>{{ $group->sum('nb_fraude') }}</strong> |
                                    Valeur totale : <strong>{{ number_format($group->sum('valeur_fraude'), 0, ',', ' ') }} CFA</strong>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-sm mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Code fraude</th>
                                                <th>Service</th>
                                                <th class="text-right">Nb fraudes</th>
                                                <th class="text-right">Valeur (CFA)</th>
                                                <th>Début fraude</th>
                                                <th>Fin fraude</th>
                                                <th>Mode opératoire</th>
                                                <th>Mesures correctives</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($group as $fraude)
                                                <tr>
                                                    <td>{{ $fraude->fraude }}</td>
                                                    <td>{{ $fraude->service }}</td>
                                                    <td class="text-right">{{ $fraude->nb_fraude }}</td>
                                                    <td class="text-right">{{ number_format($fraude->valeur_fraude, 0, ',', ' ') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($fraude->debut_fraude)->format('d/m/Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($fraude->fin_fraude)->format('d/m/Y') }}</td>
                                                    <td>{{ $fraude->mode_operatoire }}</td>
                                                    <td>{{ $fraude->mesures_correctives }}</td>
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
                <div class="text-center text-muted font-italic">Aucune fraude enregistrée.</div>
            @endforelse
        </div>
    </section>
@endsection