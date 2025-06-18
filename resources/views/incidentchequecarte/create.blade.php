@extends('layouts.dashboard')
@section('title', "Déclaration d'incidents chèques/cartes")
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-exclamation-circle text-primary mr-2"></i> Déclaration d'incidents chèques/cartes</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('incidentchequecarte.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white">
                        <h4 class="mb-0"><i class="fas fa-calendar-alt mr-2"></i> Période de déclaration</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('incidentchequecarte.store') }}">
                            @csrf
                            <div class="form-row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="debut_periode">Début période</label>
                                    <input type="date" name="debut_periode" id="debut_periode" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fin_periode">Fin période</label>
                                    <input type="date" name="fin_periode" id="fin_periode" class="form-control" required>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="mb-3 font-weight-bold">Détails des incidents</h5>
                            <div id="details-container">
                                <div class="card mb-3 detail-row border border-primary">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Type</label>
                                                <select name="details[0][type]" class="form-control" required>
                                                    <option value="">-- Choisir --</option>
                                                    <option value="CHEQUE">CHEQUE</option>
                                                    <option value="CARTE">CARTE</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Date incident</label>
                                                <input type="date" name="details[0][dateincident]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Libellé incident</label>
                                                <input type="text" name="details[0][libelleincident]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Risque</label>
                                                <input type="text" name="details[0][risque]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nb d’occurrences</label>
                                                <input type="number" name="details[0][nboccurrence]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Impact financier (CFA)</label>
                                                <input type="number" name="details[0][impactfinancier]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Description</label>
                                                <input type="text" name="details[0][descriptiondetaillee]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Mesures correctives</label>
                                                <input type="text" name="details[0][mesurescorrectives]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Statut incident</label>
                                                <input type="text" name="details[0][statutincident]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Date clôture</label>
                                                <input type="date" name="details[0][datecloture]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Infos complémentaires</label>
                                                <textarea name="details[0][infoscomplementaires]" class="form-control" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="removeRow(this)" class="btn btn-link text-danger">Supprimer cette ligne</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" onclick="addRow()" class="btn btn-outline-primary">
                                    <i class="fas fa-plus"></i> Ajouter une ligne
                                </button>
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

<script>
    let rowIndex = 1;

    function addRow() {
        const container = document.getElementById('details-container');
        const template = document.querySelector('.detail-row');
        const newRow = template.cloneNode(true);

        newRow.querySelectorAll('input, select, textarea').forEach(el => {
            if (el.name) {
                el.name = el.name.replace(/\[\d+\]/, `[${rowIndex}]`);
                el.value = '';
            }
        });

        container.appendChild(newRow);
        rowIndex++;
    }

    function removeRow(button) {
        const rows = document.querySelectorAll('.detail-row');
        if (rows.length > 1) {
            button.closest('.detail-row').remove();
        } else {
            alert("Au moins une ligne est requise.");
        }
    }
</script>
@endsection