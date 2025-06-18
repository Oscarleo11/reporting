@extends('layouts.dashboard')
@section('title', 'Incidents de paiement sur Carte')
@section('content')
<section class="section">
    <div class="section-header">
        <h1><i class="fas fa-credit-card  mr-2"></i> Incidents de paiement sur Carte</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('incidentpaiementcarte.create') }}" class="btn btn-primary btn-sm">
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
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th class="text-right">Nb cartes</th>
                                            <th class="text-right">Valeur CFA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($group as $ligne)
                                            <tr>
                                                <td>{{ $ligne->code }}</td>
                                                <td>{{ $ligne->description }}</td>
                                                <td class="text-right">{{ $ligne->nbcarte }}</td>
                                                <td class="text-right">{{ number_format($ligne->valeurcfa, 0, ',', ' ') }}</td>
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