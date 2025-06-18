@extends('layouts.dashboard')
@section('title', 'Typologie des chèques')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-money-check-alt text-primary mr-2"></i> Typologie des chèques</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('typologiecheque.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('typologiecheque.store') }}">
                            @csrf

                            <div class="form-row mb-4">
                                <div class="form-group col-md-6">
                                    <label>Début période</label>
                                    <input type="date" name="debut_periode" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fin période</label>
                                    <input type="date" name="fin_periode" class="form-control" required>
                                </div>
                            </div>

                            <h5 class="mb-3 font-weight-bold text-primary">Détails typologie</h5>
                            <div id="details-container">
                                <div class="card mb-3 detail-row border border-primary">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Code</label>
                                                <select name="details[0][code]" class="form-control" required>
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach ($familles as $type)
                                                        <option value="{{ $type->code }}">{{ $type->code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Description</label>
                                                <input type="text" name="details[0][description]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Nombre de chèques</label>
                                                <input type="number" name="details[0][nbcheque]" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="removeRow(this)" class="btn btn-link text-danger">Supprimer cette ligne</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="addRow()" class="btn btn-outline-primary mb-4">
                                <i class="fas fa-plus"></i> Ajouter une ligne
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