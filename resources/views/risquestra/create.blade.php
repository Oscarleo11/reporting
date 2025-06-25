@extends('layouts.dashboard')
@section('title', 'Risques')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-exclamation-triangle text-primary mr-2"></i> Risques STRA</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('risquestra.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('risquestra.store') }}">
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

                            <h5 class="mb-3 font-weight-bold text-primary">Détails des risques</h5>
                            <div id="details-container">
                                <div class="card mb-3 detail-block border border-primary">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="text-primary">Type de risque</label>
                                                <select name="details[0][code]" class="form-control" required>
                                                    <option value="">-- Sélectionner un type de risque --</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type->code }}">{{ $type->code }} - {{ $type->libelle }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-primary">Mécanisme de maîtrise</label>
                                                <textarea name="details[0][mecanisme_maitrise]" class="form-control" rows="2" placeholder="Mécanisme de maîtrise" required></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="text-primary">Libellé du risque</label>
                                                <textarea name="details[0][risque]" class="form-control" rows="2" placeholder="Libellé du risque" required></textarea>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="removeBlock(this)" class="btn btn-link text-primary">Supprimer ce risque</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="addBlock()" class="btn btn-outline-primary mb-4">
                                <i class="fas fa-plus"></i> Ajouter un risque
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
            alert("Au moins un risque est requis.");
        }
    }
</script>
@endsection