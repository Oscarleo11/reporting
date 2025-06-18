@extends('layouts.dashboard')
@section('title', 'Déclaration Écosystème')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-network-wired text-primary mr-2"></i> Déclaration Écosystème</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('ecosysteme.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-list"></i> Liste
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('ecosysteme.store') }}">
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
                                <div class="form-group col-md-6">
                                    <label>Nombre de sous-agents</label>
                                    <input type="number" name="nbsous_agents" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nombre de points de service</label>
                                    <input type="number" name="nbpoints_service" class="form-control" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Modalité de contrôle des sous-agents</label>
                                    <textarea name="modalite_controle_sousagents" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>

                            <h5 class="mb-3 font-weight-bold text-primary">Services de l'écosystème</h5>
                            <div id="services-container">
                                <div class="card mb-3 service-block border border-primary">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="services[0][service_offert]" class="form-control" placeholder="Service offert" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="services[0][operateur]" class="form-control" placeholder="Opérateur" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="services[0][pays_operateur]" class="form-control" placeholder="Pays opérateur" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="services[0][perimetre_partenariat]" class="form-control" placeholder="Périmètre partenariat" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="date" name="services[0][debut_partenariat]" class="form-control" placeholder="Début partenariat" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="date" name="services[0][fin_partenariat]" class="form-control" placeholder="Fin partenariat (optionnel)">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea name="services[0][description_service]" class="form-control" placeholder="Description du service" rows="2" required></textarea>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="removeBlock(this)" class="btn btn-link text-danger">Supprimer ce service</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="addService()" class="btn btn-outline-primary mb-4">
                                <i class="fas fa-plus"></i> Ajouter un service
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
    let serviceIndex = 1;

    function addService() {
        const container = document.getElementById('services-container');
        const prototype = container.querySelector('.service-block');
        const clone = prototype.cloneNode(true);

        clone.querySelectorAll('input, textarea').forEach(el => {
            if (el.name) {
                el.name = el.name.replace(/\[\d+\]/, `[${serviceIndex}]`);
                el.value = '';
            }
        });

        container.appendChild(clone);
        serviceIndex++;
    }

    function removeBlock(btn) {
        const blocks = document.querySelectorAll('.service-block');
        if (blocks.length > 1) {
            btn.closest('.service-block').remove();
        } else {
            alert("Au moins un service est requis.");
        }
    }
</script>
@endsection