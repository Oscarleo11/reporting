@extends('layouts.dashboard')

@section('title', 'Déclaration de Fraudes')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-shield-alt text-primary mr-2"></i> Déclaration de Fraudes</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('declarationfraude.index') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-list"></i> Liste
                </a>
            </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white" >
                        <h4 class="mb-0"><i class="fas fa-shield-alt mr-2"></i> Formulaire de déclaration</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-primary" id="message">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('declarationfraude.store') }}">
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

                            <div id="details-container">
                                <div class="detail-row border rounded p-3 mb-3 bg-light">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Type de fraude</label>
                                            <select name="details[0][code]" class="form-control" required onchange="updateDescription(this)">
                                                <option value="">-- Type de fraude --</option>
                                                @foreach ($codes as $type)
                                                    <option value="{{ $type->code }}" data-description="{{ $type->libelle }}">
                                                        {{ $type->code }}{{--  - {{ $type->libelle }} --}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Description</label>
                                            <input type="text" name="details[0][description]" class="form-control" placeholder="Description..." readonly required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Nb transactions</label>
                                            <input type="number" name="details[0][nbtransaction]" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Valeur (CFA)</label>
                                            <input type="number" name="details[0][valeurtransaction]" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Dispositif de gestion</label>
                                            <input type="text" name="details[0][dispositifgestion]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" onclick="removeDetail(this)" class="btn btn-link text-primary p-0">❌ Supprimer</button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" onclick="addDetail()" class="btn btn-outline-primary">
                                    <i class="fas fa-plus"></i> Ajouter une fraude
                                </button>
                            </div>

                            <div class="d-flex justify-content-end">
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
let detailIndex = 1;

function addDetail() {
    const container = document.getElementById('details-container');
    const prototype = container.querySelector('.detail-row');
    const clone = prototype.cloneNode(true);

    // Nettoie les champs et met à jour les index
    clone.querySelectorAll('input, select').forEach(el => {
        el.name = el.name.replace(/\d+/, detailIndex);
        if (el.tagName === 'SELECT') el.selectedIndex = 0;
        else el.value = '';
    });

    container.appendChild(clone);
    detailIndex++;
}

function removeDetail(btn) {
    const blocks = document.querySelectorAll('.detail-row');
    if (blocks.length > 1) {
        btn.closest('.detail-row').remove();
    } else {
        alert("Au moins une fraude est requise.");
    }
}

function updateDescription(select) {
    const desc = select.selectedOptions[0].getAttribute('data-description');
    const input = select.closest('.detail-row').querySelector('input[name*="[description]"]');
    input.value = desc || '';
}
</script>
@endsection
