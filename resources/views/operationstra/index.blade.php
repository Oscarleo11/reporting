@extends('layouts.dashboard')
@section('title', 'Déclaration des opérations STRA')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1><i class="fas fa-exchange-alt text-primary mr-2"></i> Opérations STRA enregistrées</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('operationstra.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Nouvelle déclaration
                </a>
            </div>
        </div>
        <div class="section-body">
            @forelse ($operations as $periode => $group)
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
                                    Total émissions : <strong>{{ $first->total_nb_emission }}</strong>
                                    ({{ number_format($first->total_valeur_emission, 0, ',', ' ') }} CFA) |
                                    Réceptions : <strong>{{ $first->total_nb_reception }}</strong>
                                    ({{ number_format($first->total_valeur_reception, 0, ',', ' ') }} CFA)
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-sm mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Service</th>
                                                <th>Pays</th>
                                                <th>Motif</th>
                                                <th class="text-center">Nb Émission</th>
                                                <th class="text-center">Valeur Émission</th>
                                                <th class="text-center">Nb Réception</th>
                                                <th class="text-center">Valeur Réception</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($group as $op)
                                                <tr>
                                                    <td>{{ $op->service }}</td>
                                                    <td>{{ $op->pays }}</td>
                                                    <td>{{ $op->motif }}</td>
                                                    <td class="text-center">{{ $op->nb_transaction_emission }}</td>
                                                    <td class="text-center">
                                                        {{ number_format($op->valeur_transaction_emission, 0, ',', ' ') }}</td>
                                                    <td class="text-center">{{ $op->nb_transaction_reception }}</td>
                                                    <td class="text-center">
                                                        {{ number_format($op->valeur_transaction_reception, 0, ',', ' ') }}</td>
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
                <div class="text-center text-muted font-italic">Aucune déclaration d’opération STRA trouvée.</div>
            @endforelse
        </div>
    </section>
@endsection