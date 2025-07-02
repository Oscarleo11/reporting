@extends('layouts.dashboard')

@section('title', 'Déclaration des Réclamations')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-comments text-primary mr-2"></i> Déclaration des Réclamations</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('declarationreclamation.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white">
                        <h4 class="mb-0"><i class="fas fa-file-alt mr-2"></i> Formulaire de déclaration</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('declarationreclamation.store') }}">
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
                                            <label>Réclamations reçues</label>
                                            <input type="number" name="reclamations[0][nbenregistre]" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Réclamations traitées</label>
                                            <input type="number" name="reclamations[0][nbtraite]" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Motif</label>
                                            <input type="text" name="reclamations[0][motif]" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" onclick="removeDetail(this)" class="btn btn-link text-danger p-0">❌ Supprimer</button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" onclick="addDetail()" class="btn btn-outline-primary">
                                    <i class="fas fa-plus"></i> Ajouter une réclamation
                                </button>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Enregistrer
                                </button>
                            </div>
                        </form>

                        <script>
                            let detailIndex = 1;
                            function addDetail() {
                                const container = document.getElementById('details-container');
                                const prototype = container.querySelector('.detail-row');
                                const clone = prototype.cloneNode(true);

                                clone.querySelectorAll('input').forEach(el => {
                                    el.name = el.name.replace(/\d+/, detailIndex);
                                    el.value = '';
                                });

                                container.appendChild(clone);
                                detailIndex++;
                            }

                            function removeDetail(btn) {
                                const all = document.querySelectorAll('.detail-row');
                                if (all.length > 1) {
                                    btn.closest('.detail-row').remove();
                                } else {
                                    alert("Au moins une réclamation est requise.");
                                }
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
