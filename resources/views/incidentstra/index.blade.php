@extends('layouts.dashboard')
@section('title', 'Déclaration des incidents STRA')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1><i class="fas fa-exclamation-triangle text-danger mr-2"></i> Déclaration des incidents STRA</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('incidentstra.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Nouvelle déclaration
                </a>
            </div>
        </div>
        <div class="section-body">
            @forelse($incidents as $periode => $group)
                @php $premier = $group->first(); @endphp
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-header text-primary">
                                <h4 class="mb-0">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                                    @if($premier && $premier->fin_periode)
                                        - {{ \Carbon\Carbon::parse($premier->fin_periode)->format('d/m/Y') }}
                                    @endif
                                </h4>
                                <span class="small">
                                    <strong>Total des récurrences :</strong> {{ $premier->totalincidents ?? $group->sum('nboccurrence') }}<br>
                                    <strong>Impact financier total :</strong> {{ number_format($premier->totalimpactfinancier ?? $group->sum('impactfinancier'), 0, ',', ' ') }} CFA
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-sm mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Plateforme technique</th>
                                                <th>Risque</th>
                                                <th>Date incident</th>
                                                <th>Libellé</th>
                                                <th class="text-right">Nb occurrences</th>
                                                <th>Description</th>
                                                <th>Mesures correctives</th>
                                                <th class="text-right">Impact financier</th>
                                                <th>Statut</th>
                                                <th>Date clôture</th>
                                                <th>Nature déclaration</th>
                                                <th>Référence</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($group as $incident)
                                                <tr>
                                                    <td>{{ $incident->plateformetechnique }}</td>
                                                    <td>{{ $incident->risque }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($incident->dateincident)->format('d/m/Y') }}</td>
                                                    <td>{{ $incident->libelleincident }}</td>
                                                    <td class="text-right">{{ $incident->nboccurrence }}</td>
                                                    <td>{{ $incident->descriptiondetaillee }}</td>
                                                    <td>{{ $incident->mesurescorrectives }}</td>
                                                    <td class="text-right">{{ number_format($incident->impactfinancier, 0, ',', ' ') }}</td>
                                                    <td>
                                                        {{ $incident->statutincident === 'T' ? 'Clôturé' : 'Non clôturé' }}
                                                    </td>
                                                    <td>
                                                        @if ($incident->datecloture)
                                                            {{ \Carbon\Carbon::parse($incident->datecloture)->format('d/m/Y') }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $incident->naturedeclaration }}</td>
                                                    <td>{{ $incident->reference }}</td>
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
                <div class="text-center text-muted font-italic">Aucun incident enregistré pour le moment.</div>
            @endforelse
        </div>
    </section>
@endsection