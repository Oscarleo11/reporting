@extends('layouts.dashboard')
@section('title', 'Incidents de paiement sur Carte')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-credit-card text-primary mr-2"></i> Incidents de paiement sur Carte</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('incidentpaiementcarte.index') }}" class="btn btn-outline-primary btn-sm">
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
                        <form method="POST" action="{{ route('incidentpaiementcarte.store') }}">
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
                                            <div class="form-group col-md-6">
                                                <label>Code Carte (type incident)</label>
                                                <select name="details[0][code]" class="form-control" required>
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach ($familles as $IpCarte)
                                                        <option value="{{ $IpCarte->code }}">{{ $IpCarte->code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Description</label>
                                                <input type="text" name="details[0][description]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nombre de cartes</label>
                                                <input type="number" name="details[0][nbcarte]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Valeur CFA</label>
                                                <input type="number" name="details[0][valeurcfa]" class="form-control">
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

        newRow.querySelectorAll('input, select').forEach(el => {
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