@extends('layouts.dashboard')

@section('title', 'Déclaration Indicateurs Financiers')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-coins text-primary mr-2"></i> Déclaration Indicateurs Financiers</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('indicateurfinancier.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>        
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white">
                        <h4 class="mb-0"><i class="fas fa-coins mr-2"></i> Formulaire de déclaration</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" id="message">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('indicateurfinancier.store') }}">
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

                            <div id="indicateurs-container">
                                <div class="indicateur-row border rounded p-3 mb-3 bg-light">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Code</label>
                                            <select name="indicateurs[0][code]" class="form-control" required onchange="setLibelle(this)">
                                                <option value="">-- Sélectionner un code --</option>
                                                @foreach ($codes as $code)
                                                    <option value="{{ $code->code }}" data-libelle="{{ $code->libelle }}">
                                                        {{ $code->code }} {{-- - {{ $code->libelle }} --}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label>Intitulé</label>
                                            <input type="text" name="indicateurs[0][intitule]" class="form-control" placeholder="Intitulé" readonly required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Valeur</label>
                                            <input type="number" name="indicateurs[0][valeur]" class="form-control" placeholder="Valeur" required>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" onclick="removeIndicateur(this)" class="btn btn-link text-danger p-0">❌ Supprimer</button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" onclick="addIndicateur()" class="btn btn-outline-primary">
                                    <i class="fas fa-plus"></i> Ajouter un indicateur
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
let indicateurIndex = 1;

function addIndicateur() {
    const container = document.getElementById('indicateurs-container');
    const row = container.querySelector('.indicateur-row');
    const clone = row.cloneNode(true);

    clone.querySelectorAll('select, input').forEach(el => {
        if (el.name) {
            el.name = el.name.replace(/\d+/, indicateurIndex);
            if (el.tagName === 'INPUT') el.value = '';
            if (el.tagName === 'SELECT') el.selectedIndex = 0;
        }
    });

    container.appendChild(clone);
    indicateurIndex++;
}

function removeIndicateur(btn) {
    const blocks = document.querySelectorAll('.indicateur-row');
    if (blocks.length > 1) {
        btn.closest('.indicateur-row').remove();
    } else {
        alert("Au moins un indicateur est requis.");
    }
}

function setLibelle(select) {
    const libelle = select.options[select.selectedIndex].dataset.libelle;
    select.closest('.indicateur-row')
          .querySelector('input[name*="[intitule]"]').value = libelle;
}
</script>
@endsection