@extends('layouts.dashboard')
@section('title', 'Tarification (carte & chèque)')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-money-check-alt text-primary mr-2"></i> Tarification (carte & chèque)</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('tarificationchequecarte.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('tarificationchequecarte.store') }}">
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

                            <h5 class="mb-3 font-weight-bold text-primary">Tarification Carte</h5>
                            <div id="cartes-container">
                                <div class="card mb-3 carte-row border border-primary">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Code service</label>
                                                <select name="cartes[0][code]" class="form-control" required>
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach ($famillesCa as $tarifcarte)
                                                        <option value="{{ $tarifcarte->code }}">{{ $tarifcarte->code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Coût minimum</label>
                                                <input type="number" name="cartes[0][coutminimum]" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="removeRow(this, 'carte')" class="btn btn-link text-danger">Supprimer cette ligne</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="addRow('carte')" class="btn btn-outline-primary mb-4">
                                <i class="fas fa-plus"></i> Ajouter un service carte
                            </button>

                            <h5 class="mb-3 font-weight-bold text-success">Tarification Chèque</h5>
                            <div id="cheques-container">
                                <div class="card mb-3 cheque-row border border-success">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Code service</label>
                                                <select name="cheques[0][code]" class="form-control" required>
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach ($famillesCH as $tarifcheque)
                                                        <option value="{{ $tarifcheque->code }}">{{ $tarifcheque->code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Coût minimum</label>
                                                <input type="number" name="cheques[0][coutminimum]" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="removeRow(this, 'cheque')" class="btn btn-link text-danger">Supprimer cette ligne</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="addRow('cheque')" class="btn btn-outline-success mb-4">
                                <i class="fas fa-plus"></i> Ajouter un service chèque
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
    let carteIndex = 1;
    let chequeIndex = 1;

    function addRow(type) {
        const container = document.getElementById(type + 's-container');
        const template = document.querySelector('.' + type + '-row');
        const newRow = template.cloneNode(true);

        newRow.querySelectorAll('input, select').forEach(el => {
            if (el.name) {
                el.name = el.name.replace(/\[\d+\]/, `[${type === 'carte' ? carteIndex : chequeIndex}]`);
                el.value = '';
            }
        });

        container.appendChild(newRow);
        type === 'carte' ? carteIndex++ : chequeIndex++;
    }

    function removeRow(button, type) {
        const rows = document.querySelectorAll('.' + type + '-row');
        if (rows.length > 1) {
            button.closest('.' + type + '-row').remove();
        } else {
            alert("Au moins une ligne est requise.");
        }
    }
</script>
@endsection