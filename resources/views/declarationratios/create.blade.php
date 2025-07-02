@extends('layouts.dashboard')

@section('title', 'Déclaration des Ratios')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-percentage text-primary mr-2"></i> Déclaration des Ratios</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('declarationratios.index') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-list"></i> Liste
                </a>
            </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white" >
                        <h4 class="mb-0"><i class="fas fa-percentage mr-2"></i> Formulaire de déclaration</h4>
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

                        <form method="POST" action="{{ route('declarationratios.store') }}">
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

                            <div id="ratios-container">
                                <div class="ratio-block border rounded p-3 mb-3 bg-light">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Code</label>
                                            <select name="ratios[0][code]" class="form-control" required onchange="updateIntitule(this)">
                                                <option value="">-- Sélectionner un code --</option>
                                                @foreach ($codes as $code)
                                                    <option value="{{ $code->code }}" data-libelle="{{ $code->libelle }}">{{ $code->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label>Intitulé</label>
                                            <input type="text" name="ratios[0][intitule]" class="form-control" placeholder="Intitulé" readonly required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Taux</label>
                                            <input type="number" step="0.01" name="ratios[0][taux]" class="form-control" placeholder="Taux" required>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" onclick="removeRatio(this)" class="btn btn-link text-danger p-0">❌ Supprimer</button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" onclick="addRatio()" class="btn btn-outline-primary">
                                    <i class="fas fa-plus"></i> Ajouter un ratio
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
    let index = 1;

    function addRatio() {
        const container = document.getElementById('ratios-container');
        const prototype = container.querySelector('.ratio-block');
        const clone = prototype.cloneNode(true);

        clone.querySelectorAll('input, select').forEach(el => {
            el.name = el.name.replace(/\d+/, index);
            el.value = '';
        });

        container.appendChild(clone);
        index++;
    }

    function removeRatio(btn) {
        const blocks = document.querySelectorAll('.ratio-block');
        if (blocks.length > 1) {
            btn.closest('.ratio-block').remove();
        } else {
            alert("Au moins un ratio est requis.");
        }
    }

    function updateIntitule(select) {
        const selected = select.options[select.selectedIndex];
        const libelle = selected.getAttribute('data-libelle');
        const input = select.closest('.form-row').querySelector('input[name*="[intitule]"]');
        input.value = libelle || '';
    }
</script>
@endsection
