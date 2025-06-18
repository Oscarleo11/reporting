@extends('layouts.dashboard')
@section('title', 'Tableau de bord')
@section('content')
<section class="section">
    <div class="section-header">
        <h1><i class="fas fa-exclamation-circle text-primary mr-2"></i> Réclamations sur chèques et cartes</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('reclamationchequecarte.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouvelle déclaration
            </a>
        </div>
    </div>
    <div class="section-body">
        @foreach($reclamations as $periode => $group)
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header text-white">
                            <h4 class="mb-0">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Type</th>
                                            <th>Motif</th>
                                            <th>Traitement</th>
                                            <th>Mesures</th>
                                            <th class="text-right">Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($group as $ligne)
                                            <tr>
                                                <td class="font-weight-bold text-center text-{{ $ligne->type == 'carte' ? 'primary' : 'success' }}">
                                                    {{ strtoupper($ligne->type) }}
                                                </td>
                                                <td>{{ $ligne->motif }}</td>
                                                <td>{{ $ligne->etattraitement }}</td>
                                                <td>{{ $ligne->mesurescorrectives }}</td>
                                                <td class="text-right">{{ $ligne->nbre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection