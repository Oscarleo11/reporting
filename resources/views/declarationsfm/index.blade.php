@extends('layouts.dashboard')

@section('title', 'Déclarations Services Financiers Mobiles')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-mobile-alt text-primary mr-2"></i> Déclarations Services Financiers Mobiles</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('declarationsfm.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Nouvelle déclaration
                </a>
            </div>           
    </div>
    <div class="section-body">
        <div class="group justify-content-center">
            <div class="col-lg-10">
                @forelse($sfms as $periode => $group)
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header text-primary">
                            <h5 class="mb-0">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }}
                                —
                                {{ \Carbon\Carbon::parse($group->first()->fin_periode)->format('d/m/Y') }}
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Code</th>
                                        <th>Libellé</th>
                                        <th>Valeur</th>
                                        <th>Détails</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group as $group)
                                        <tr>
                                            <td>{{ $group->code }}</td>
                                            <td>
                                                {{ optional($group->libelle)->libelle ?? '' }}
                                            </td>
                                            <td>{{ number_format($group->valeur, 0, ',', ' ') }}</td>
                                            <td>{{ $group->details }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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