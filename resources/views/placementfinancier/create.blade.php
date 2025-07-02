@extends('layouts.dashboard')

@section('title', 'Placement Financier')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-piggy-bank text-primary mr-2"></i> Déclaration de Placement Financier</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('placementfinancier.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('placementfinancier.store') }}">
                            @csrf

                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                    <label>Début période</label>
                                    <input type="date" name="debut_periode" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fin période</label>
                                    <input type="date" name="fin_periode" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="form-group col-md-4">
                                    <label>Dépôt à vue</label>
                                    <input type="number" name="depotavue" class="form-control" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Dépôt à terme</label>
                                    <input type="number" name="depotaterme" class="form-control" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Titres acquis</label>
                                    <input type="number" name="titreacquis" class="form-control" required>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
