@extends('layouts.dashboard')
@section('title', 'Déclaration des incidents STRA')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-exclamation-triangle text-primary mr-2"></i> Déclaration des incidents STRA</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('incidentstra.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('incidentstra.store') }}">
                            @csrf
                            <div class="form-row mb-4">
                                <div class="form-group col-md-6">
                                    <label class="text-primary">Début période</label>
                                    <input type="date" name="debut_periode" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-primary">Fin période</label>
                                    <input type="date" name="fin_periode" class="form-control" required>
                                </div>
                            </div>

                            <h5 class="mb-3 font-weight-bold text-primary">Détails des incidents</h5>
                            <div id="details-container">
                                <div class="card mb-3 detail-block border border-primary">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <select name="details[0][plateformetechnique]" class="form-control" required>
                                                    <option value="">-- Plateforme technique --</option>
                                                    @foreach($plateformes as $plateforme)
                                                        <option value="{{ $plateforme->nom }}">{{ $plateforme->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="details[0][risque]" placeholder="Risque" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="date" name="details[0][dateincident]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" name="details[0][libelleincident]" placeholder="Libellé de l'incident" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="number" name="details[0][nboccurrence]" placeholder="Nombre d'occurrences" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <textarea name="details[0][descriptiondetaillee]" placeholder="Description détaillée" class="form-control" rows="2" required></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea name="details[0][mesurescorrectives]" placeholder="Mesures correctives" class="form-control" rows="2" required></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="number" name="details[0][impactfinancier]" placeholder="Impact financier (CFA)" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <select name="details[0][statutincident]" class="form-control" required>
                                                    <option value="">-- Statut de l'incident --</option>
                                                    <option value="N">Non clôturé</option>
                                                    <option value="T">Clôturé</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="date" name="details[0][datecloture]" class="form-control" placeholder="Date de clôture">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="details[0][naturedeclaration]" placeholder="Nature de déclaration" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="details[0][reference]" placeholder="Référence" class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="removeBlock(this)" class="btn btn-link text-primary">Supprimer cet incident</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="addBlock()" class="btn btn-outline-primary mb-4">
                                <i class="fas fa-plus"></i> Ajouter un incident
                            </button>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary px-5">
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

<script>
    let index = 1;

    function addBlock() {
        const container = document.getElementById('details-container');
        const prototype = container.querySelector('.detail-block');
        const clone = prototype.cloneNode(true);

        clone.querySelectorAll('input, textarea, select').forEach(el => {
            if (el.name) {
                el.name = el.name.replace(/\[\d+\]/, `[${index}]`);
                el.value = '';
            }
        });

        container.appendChild(clone);
        index++;
    }

    function removeBlock(btn) {
        const blocks = document.querySelectorAll('.detail-block');
        if (blocks.length > 1) {
            btn.closest('.detail-block').remove();
        } else {
            alert("Au moins un incident est requis.");
        }
    }
</script>
@endsection