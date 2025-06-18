@extends('layouts.dashboard')
@section('title', 'Émission de cartes')
@section('content')
<section class="section">
    <div class="section-header">
        <h1><i class="fas fa-credit-card text-primary mr-2"></i> Émission de cartes</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('emission-cartes.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouvelle déclaration
            </a>
        </div>
    </div>
    <div class="section-body">
        @foreach ($emissions as $periode => $group)
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
                                            <th>Famille</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Nombre de cartes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($group as $ligne)
                                            <tr>
                                                <td>{{ $ligne->codefamille }}</td>
                                                <td>{{ $ligne->codetype }}</td>
                                                <td>{{ $ligne->description }}</td>
                                                <td>{{ $ligne->nbcarte }}</td>
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