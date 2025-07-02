@extends('layouts.dashboard')

@section('title', 'Déclarations de Réclamations')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-comments text-primary mr-2"></i> Déclarations de Réclamations</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('declarationreclamation.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouvelle déclaration
            </a>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @forelse($reclamations as $periode => $group)
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Période : {{ \Carbon\Carbon::parse($periode)->format('d/m/Y') }} —
                                {{ \Carbon\Carbon::parse($group->first()->fin_periode)->format('d/m/Y') }}
                            </h5>
                            <small>
                                Enregistrées : <strong>{{ $group->sum('nbenregistre') }}</strong> |
                                Traitées : <strong>{{ $group->sum('nbtraite') }}</strong>
                            </small>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Réclamations</th>
                                        <th>Motif</th>
                                        <th>Traitées</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group as $item)
                                        <tr>
                                            <td>{{ $item->detail_nbenregistre }}</td>
                                            <td>{{ $item->motif }}</td>
                                            <td>{{ $item->detail_nbtraite }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        Aucune déclaration de réclamation enregistrée.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
