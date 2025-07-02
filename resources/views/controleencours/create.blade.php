@extends('layouts.dashboard')

@section('title', 'Contrôle des Encours')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-balance-scale text-primary mr-2"></i> Déclaration - Contrôle des encours</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('controleencours.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('controleencours.store') }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Début période</label>
                                    <input type="date" name="debut_periode" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fin période</label>
                                    <input type="date" name="fin_periode" class="form-control" required>
                                </div>
                            </div>

                            <hr>
                            <h5 class="text-primary">Valeurs</h5>
                            <div class="form-row">
                                @foreach ([
                                    'valeurinitiale' => 'Valeur initiale',
                                    'nouvelleemission' => 'Nouvelle émission',
                                    'destructionmonnaie' => 'Destruction monnaie',
                                    'valeurfinale' => 'Valeur finale',
                                    'soldecomptabilite' => 'Solde comptabilité',
                                    'ecartcantonnementvaleurfinale' => 'Écart cantonnement vs valeur finale',
                                    'ecartcomptabilitevaleurfinale' => 'Écart comptabilité vs valeur finale',
                                    'ecartcomptabilitecantonnement' => 'Écart compta vs cantonnement',
                                    'nbtransaction' => 'Nombre de transactions',
                                    'valeurtransaction' => 'Valeur des transactions'
                                ] as $name => $label)
                                <div class="form-group col-md-6">
                                    <label>{{ $label }}</label>
                                    <input type="number" name="{{ $name }}" class="form-control" required>
                                </div>
                                @endforeach
                            </div>

                            <hr>
                            <h5 class="text-primary">Comptes de cantonnement</h5>
                            <div id="soldes-container"></div>
                            <button type="button" onclick="addSolde()" class="btn btn-sm btn-outline-secondary mb-3">➕ Ajouter un compte</button>

                            <hr>
                            <h5 class="text-primary">Explications des écarts</h5>
                            <div id="ecarts-container"></div>
                            <button type="button" onclick="addEcart()" class="btn btn-sm btn-outline-secondary mb-3">➕ Ajouter un écart</button>

                            <div class="text-right">
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
let soldeIndex = 0;
let ecartIndex = 0;

function addSolde() {
    const html = `
    <div class="border rounded p-3 mb-2 bg-light">
        <div class="form-row">
            <div class="form-group col-md-4">
                <input name="soldes[${soldeIndex}][banque]" class="form-control" placeholder="Banque" required>
            </div>
            <div class="form-group col-md-4">
                <input name="soldes[${soldeIndex}][numerocompte]" class="form-control" placeholder="Numéro compte" required>
            </div>
            <div class="form-group col-md-4">
                <input name="soldes[${soldeIndex}][intitulecompte]" class="form-control" placeholder="Intitulé" required>
            </div>
            <div class="form-group col-md-4">
                <input type="number" name="soldes[${soldeIndex}][solde]" class="form-control" placeholder="Solde" required>
            </div>
        </div>
    </div>`;
    document.getElementById('soldes-container').insertAdjacentHTML('beforeend', html);
    soldeIndex++;
}

function addEcart() {
    const html = `
    <div class="border rounded p-3 mb-2 bg-light">
        <div class="form-row">
            <div class="form-group col-md-4">
                <select name="ecarts[${ecartIndex}][type_ecart]" class="form-control" required>
                    <option value="">Type d'écart</option>
                    <option value="ecartcantonnementvaleurfinale">Cantonnement / Valeur finale</option>
                    <option value="ecartcomptabilitecantonnement">Comptabilité / Cantonnement</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <input type="date" name="ecarts[${ecartIndex}][dateoperation]" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <input name="ecarts[${ecartIndex}][reference]" class="form-control" placeholder="Référence" required>
            </div>
            <div class="form-group col-md-4">
                <input name="ecarts[${ecartIndex}][natureoperation]" class="form-control" placeholder="Nature de l'opération" required>
            </div>
            <div class="form-group col-md-4">
                <input type="number" name="ecarts[${ecartIndex}][montant]" class="form-control" placeholder="Montant" required>
            </div>
            <div class="form-group col-md-4">
                <input name="ecarts[${ecartIndex}][observations]" class="form-control" placeholder="Observations" required>
            </div>
        </div>
    </div>`;
    document.getElementById('ecarts-container').insertAdjacentHTML('beforeend', html);
    ecartIndex++;
}
</script>
@endsection
