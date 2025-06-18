@extends('layouts.dashboard')
@section('title', 'Acquisition de cartes')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1><i class="fas fa-credit-card text-danger mr-2"></i> Acquisition de cartes</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('acquisition.create') }}" class="btn btn-danger btn-sm">
                    <i class="fas fa-plus"></i> Nouvelle déclaration
                </a>
            </div>
        </div>
        <div class="section-body">
            @foreach ($acquisitions as $periode => $group)
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-10">
                        <div class="card shadow-sm border-0">
                            <div class="card-header  text-white">
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
                                                <th>Tarif</th>
                                                <th>Plafond de rechargement</th>
                                                <th>Retrait journalier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($group as $ligne)
                                                <tr>
                                                    <td>{{ $ligne->code_type }}</td>
                                                    <td>{{ number_format($ligne->tarif, 0, ',', ' ') }} FCFA</td>
                                                    <td>{{ number_format($ligne->plafond_rechargement, 0, ',', ' ') }} FCFA</td>
                                                    <td>{{ number_format($ligne->plafond_retrait_journalier, 0, ',', ' ') }} FCFA</td>
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