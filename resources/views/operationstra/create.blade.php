@extends('layouts.dashboard')
@section('title', 'Déclaration des opérations STRA')
@section('content')
    <div class="section">
        <div class="section-header">
            <h1><i class="fas fa-exchange-alt text-primary mr-2"></i> Déclaration des opérations STRA</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('operationstra.index') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-list"></i> Liste
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <form method="POST" action="{{ route('operationstra.store') }}">
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

                                <h5 class="mb-3 font-weight-bold text-primary">Détails des opérations</h5>
                                <div id="details-container">
                                    <div class="card mb-3 detail-block border border-primary">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <select name="details[0][service]" class="form-control"
                                                        required>
                                                        <option value="">--Code Service --</option>
                                                        @foreach ($services as $service)
                                                            <option value="{{ $service->code }}">{{ $service->code }}
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <select name="details[0][pays]" class="form-control"
                                                        required>
                                                        <option value="">-- Pays --</option>
                                                        @foreach ($paysoperateurs as $pays)
                                                            <option value="{{ $pays->code }}">{{ $pays->code }}
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <select name="details[0][motif]" class="form-control"
                                                        required>
                                                        <option value="">-- Motif --</option>
                                                        @foreach ($motifs as $motif)
                                                            <option value="{{ $motif->libelle }}">{{ $motif->libelle }}
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="number" name="details[0][nb_transaction_emission]"
                                                        placeholder="Nb émission" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="number" name="details[0][valeur_transaction_emission]"
                                                        placeholder="Valeur émission" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="number" name="details[0][nb_transaction_reception]"
                                                        placeholder="Nb réception" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="number" name="details[0][valeur_transaction_reception]"
                                                        placeholder="Valeur réception" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="button" onclick="removeBlock(this)"
                                                    class="btn btn-link text-danger">
                                                    Supprimer cette opération
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" onclick="addBlock()" class="btn btn-outline-primary mb-4">
                                    <i class="fas fa-plus"></i> Ajouter une opération
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

            clone.querySelectorAll('input').forEach(el => {
                el.name = el.name.replace(/\d+/, index);
                el.value = '';
            });

            container.appendChild(clone);
            index++;
        }

        function removeBlock(button) {
            const blocks = document.querySelectorAll('.detail-block');
            if (blocks.length > 1) {
                button.closest('.detail-block').remove();
            } else {
                alert("Au moins une ligne est requise.");
            }
        }
    </script>
@endsection
