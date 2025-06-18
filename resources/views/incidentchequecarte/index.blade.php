@extends('layouts.dashboard')
@section('title', "Déclaration d'incidents chèques/cartes")
@section('content')
<section class="section">
    <div class="section-header">
        <h1><i class="fas fa-exclamation-circle text-primary mr-2"></i> Déclaration d'incidents chèques/cartes</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('incidentchequecarte.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouvelle déclaration
            </a>
        </div>
    </div>
    <div class="section-body">
        @foreach($incidents as $periode => $group)
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
                                            <th>Date</th>
                                            <th>Libellé</th>
                                            <th>Nb</th>
                                            <th>Impact</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($group as $ligne)
                                            <tr>
                                                <td>{{ $ligne->type }}</td>
                                                <td>{{ \Carbon\Carbon::parse($ligne->dateincident)->format('d/m/Y') }}</td>
                                                <td>{{ $ligne->libelleincident }}</td>
                                                <td class="text-right">{{ $ligne->nboccurrence }}</td>
                                                <td class="text-right">{{ number_format($ligne->impactfinancier, 0, ',', ' ') }}</td>
                                                <td>{{ $ligne->statutincident }}</td>
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