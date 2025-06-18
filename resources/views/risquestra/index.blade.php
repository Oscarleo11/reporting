@extends('layouts.dashboard')
@section('title', 'Acquisition de cartes')
@section('content')
<section class="section">
    <div class="section-header">
        <h1><i class="fas fa-exclamation-triangle text-danger mr-2"></i> Acquisition de cartes - Risques</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('risquestra.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouvelle déclaration
            </a>
        </div>
    </div>
    <div class="section-body">
        @foreach ($risques as $bloc)
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header text-white">
                            <h4 class="mb-0">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Période : {{ \Carbon\Carbon::parse($bloc->debut_periode)->format('d/m/Y') }}
                                - {{ \Carbon\Carbon::parse($bloc->fin_periode)->format('d/m/Y') }}
                            </h4>
                            <span class="small">Nombre total de risques : <strong>{{ $bloc->nb_risque }}</strong></span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Code</th>
                                            <th>Risque</th>
                                            <th>Mécanisme de maîtrise</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bloc->details as $detail)
                                            <tr>
                                                <td>{{ $detail->code }}</td>
                                                <td>{{ $detail->risque }}</td>
                                                <td>{{ $detail->mecanisme_maitrise }}</td>
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

        @if ($risques->isEmpty())
            <div class="text-center text-muted font-italic">Aucune déclaration enregistrée pour le moment.</div>
        @endif
    </div>
</section>
@endsection
