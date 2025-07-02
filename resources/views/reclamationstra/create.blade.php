@extends('layouts.dashboard')
@section('title', 'Réclamations STRA')
@section('content')
    <div class="section">
        <div class="section-header">
            <h1><i class="fas fa-exclamation-circle text-primary mr-2"></i> Déclaration des réclamations STRA</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('reclamationstra.index') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-list"></i> Liste
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <form method="POST" action="{{ route('reclamationstra.store') }}">
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

                                <h5 class="mb-3 font-weight-bold text-primary">Détails des réclamations</h5>
                                <div id="details-container">
                                    <div class="card mb-3 detail-block border border-primary">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <select name="details[0][service]" class="form-control" required>
                                                        <option value="">--Code Service --</option>
                                                        @foreach ($services as $service)
                                                            <option value="{{ $service->code }}">{{ $service->code }}
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <input type="number" name="details[0][nb_recu]" placeholder="Nb reçues"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <input type="number" name="details[0][nb_traite]"
                                                        placeholder="Nb traitées" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <textarea name="details[0][motif_reclamation]" rows="1" class="form-control" placeholder="Motif réclamation"
                                                        required></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <textarea name="details[0][procedure_traitement]" rows="2" class="form-control"
                                                        placeholder="Procédure de traitement" required></textarea>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="button" onclick="removeBlock(this)"
                                                    class="btn btn-link text-danger">
                                                    Supprimer cette réclamation
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" onclick="addBlock()" class="btn btn-outline-primary mb-4">
                                    <i class="fas fa-plus"></i> Ajouter une réclamation
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

            clone.querySelectorAll('input, textarea').forEach(el => {
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
