@extends('layouts.dashboard')

@section('title', 'Déclarations d’incidents')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-bolt text-danger mr-2"></i> Déclarations d’incidents</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('declarationincident.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouvelle déclaration
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                @forelse($incidents as $periode => $group)
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                                —
                                {{ \Carbon\Carbon::parse($group->first()->fin_periode)->format('d/m/Y') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach($group as $declaration)
                                {{-- Éléments constitutifs --}}
                                <h6 class="text-dark mt-2 mb-1">Éléments constitutifs</h6>
                                <table class="table table-bordered table-sm mb-3">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Code</th>
                                            <th>Intitulé</th>
                                            <th>Valeur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($declaration->elements_constitutifs ?? [] as $elem)
                                            <tr>
                                                <td>{{ $elem['code'] ?? '' }}</td>
                                                <td>{{ $elem['intitule'] ?? '' }}</td>
                                                <td>{{ $elem['valeur'] ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table><br><br>

                                {{-- Incidents --}}
                                <h6 class="text-dark mb-1">Fiche descriptive des incidents</h6>
                                <table class="table table-bordered table-sm mb-3">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descriptif</th>
                                            <th>Mesure prise</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($declaration->incidents ?? [] as $inc)
                                            <tr>
                                                <td>{{ $inc['nombre'] ?? '' }}</td>
                                                <td>{{ $inc['descriptif'] ?? '' }}</td>
                                                <td>{{ $inc['mesureprise'] ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table><br><br>

                                {{-- Captures --}}
                                <h6 class="text-dark mb-1">Fiche des motifs de capture</h6>
                                <table class="table table-bordered table-sm mb-3">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Motif</th>
                                            <th>Mesure prise</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($declaration->captures ?? [] as $cap)
                                            <tr>
                                                <td>{{ $cap['nombre'] ?? '' }}</td>
                                                <td>{{ $cap['motif'] ?? '' }}</td>
                                                <td>{{ $cap['mesureprise'] ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        Aucune déclaration enregistrée.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection