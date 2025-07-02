@extends('layouts.dashboard')

@section('title', 'Déclaration SFM')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-mobile-alt text-primary mr-2"></i> Déclaration SFM</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('declarationsfm.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('declarationsfm.store') }}">
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

                            <div id="sfm-container">
                                <div class="sfm-row bg-light p-3 border rounded mb-3">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Code</label>
                                            <select name="statistiques[0][code]" class="form-control" onchange="updateLabel(this)">
                                                <option value="">-- Choisir un code --</option>
                                                @foreach ($codes as $code)
                                                    <option value="{{ $code->code }}" data-libelle="{{ $code->libelle }}">
                                                        {{ $code->code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Libellé</label>
                                            <input type="text" class="form-control" name="statistiques[0][libelle]" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Valeur</label>
                                            <input type="number" name="statistiques[0][valeur]" class="form-control">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Détails</label>
                                            <input type="text" name="statistiques[0][details]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" onclick="removeRow(this)" class="btn btn-link text-danger p-0">❌ Supprimer</button>
                                    </div>
                                </div>
                            </div>

                            <button type="button" onclick="addRow()" class="btn btn-outline-primary mb-3">
                                ➕ Ajouter un indicateur
                            </button>

                            <div class="text-right">
                                <button class="btn btn-primary">
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

function addRow() {
    const container = document.getElementById('sfm-container');
    const clone = container.querySelector('.sfm-row').cloneNode(true);
    clone.querySelectorAll('input, select').forEach(el => {
        el.name = el.name.replace(/\d+/, index);
        if (el.tagName !== 'select') el.value = '';
        else el.selectedIndex = 0;
    });
    container.appendChild(clone);
    index++;
}

function removeRow(button) {
    const rows = document.querySelectorAll('.sfm-row');
    if (rows.length > 1) {
        button.closest('.sfm-row').remove();
    }
}

function updateLabel(select) {
    const libelle = select.selectedOptions[0].getAttribute('data-libelle');
    const input = select.closest('.sfm-row').querySelector('input[name*="[libelle]"]');
    input.value = libelle;
}
</script>
@endsection
