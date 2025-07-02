@extends('layouts.dashboard')
@section('title', 'Déclaration Annuaire STRA')
@section('content')
    <div class="section">
        <div class="section-header">
            <h1><i class="fas fa-address-book text-primary mr-2"></i> Déclaration Annuaire STRA</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('annuairestra.index') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-list"></i> Liste
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <form method="POST" action="{{ route('annuairestra.store') }}">
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

                                <h5 class="mb-3 font-weight-bold text-primary">Services de l'annuaire</h5>
                                <div id="services-container">
                                    <div class="card mb-3 service-block border border-primary">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Opérateur</label>
                                                    <select name="services[0][operateur]" class="form-control" required>
                                                        <option value="">-- Opérateur --</option>
                                                        @foreach ($operateur as $operateur)
                                                            <option value="{{ $operateur->code }}">{{ $operateur->code }}
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Code service</label>
                                                    <select name="services[0][code_service]" class="form-control" required>
                                                        <option value="">-- Sélectionner un code --</option>
                                                        @foreach ($services as $service)
                                                            <option value="{{ $service->code }}">{{ $service->code }} -
                                                                {{ $service->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Nombre de sous-agents</label>
                                                    <input type="number" name="services[0][nbsous_agents]"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Points de service</label>
                                                    <input type="number" name="services[0][nbpoints_service]"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Description</label>
                                                    <input type="text" name="services[0][description_service]"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Date de lancement</label>
                                                    <input type="date" name="services[0][date_lancement]"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Périmètre</label>
                                                    <select name="services[0][perimetre]" class="form-control"
                                                        required>
                                                        <option value="">-- Périmètre partenariat --</option>
                                                        @foreach ($perimetres as $perimetre)
                                                            <option value="{{ $perimetre->nom }}">{{ $perimetre->nom }}
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Mécanisme de compensation</label>
                                                    <input type="text"
                                                        name="services[0][mecanisme_compensation_reglement]"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <h6 class="font-weight-bold text-primary mt-4">Transactions</h6>
                                            <div class="transactions-container">
                                                <div class="row transaction-row">
                                                    <div class="form-group col-md-4">
                                                        <label>Type de transaction</label>
                                                        <select name="services[0][transactions][0][type_transaction]"
                                                            class="form-control" required>
                                                            <option value="">-- Sélectionner un type --</option>
                                                            <option value="emission">Émission</option>
                                                            <option value="reception">Réception</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Mode d'envoi</label>
                                                        <input type="text"
                                                            name="services[0][transactions][0][mode_envoi]"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Mode de réception</label>
                                                        <input type="text"
                                                            name="services[0][transactions][0][mode_reception]"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Nombre intra</label>
                                                        <input type="number" name="services[0][transactions][0][nb_intra]"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Valeur intra</label>
                                                        <input type="number"
                                                            name="services[0][transactions][0][valeur_intra]"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Nombre hors</label>
                                                        <input type="number" name="services[0][transactions][0][nb_hors]"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Valeur hors</label>
                                                        <input type="number"
                                                            name="services[0][transactions][0][valeur_hors]"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-12 text-right">
                                                        <button type="button"
                                                            class="remove-transaction btn btn-link text-danger">
                                                            Supprimer cette transaction
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right mt-2">
                                                <button type="button"
                                                    class="add-transaction btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-plus"></i> Ajouter une transaction
                                                </button>
                                            </div>
                                            <div class="text-right mt-2">
                                                <button type="button" onclick="removeService(this)"
                                                    class="btn btn-link text-danger">
                                                    Supprimer ce service
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" onclick="addService()" class="btn btn-outline-primary mb-4">
                                    <i class="fas fa-plus"></i> Ajouter un service
                                </button>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary px-5">
                                        <i class="fas fa-save"></i> Enregistrer la déclaration
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

            // Update indexes for service
            clone.querySelectorAll('input, select').forEach(el => {
                if (el.name) {
                    el.name = el.name.replace(/\d+/, serviceIndex).replace(/\[\d+\]/g, '[0]');
                    el.value = '';
                }
            });

            // Reset transactions
            const transactionsContainer = clone.querySelector('.transactions-container');
            const firstTransaction = transactionsContainer.querySelector('.transaction-row');
            transactionsContainer.innerHTML = '';
            transactionsContainer.appendChild(firstTransaction);

            container.appendChild(clone);
            serviceIndex++;
        }

        function removeService(btn) {
            const all = document.querySelectorAll('.service-block');
            if (all.length > 1) {
                btn.closest('.service-block').remove();
            } else {
                alert("Au moins un service est requis.");
            }
        }

        document.addEventListener('click', function(e) {
            // Add transaction
            if (e.target && e.target.classList.contains('add-transaction')) {
                const serviceBlock = e.target.closest('.service-block');
                const container = serviceBlock.querySelector('.transactions-container');
                const index = container.querySelectorAll('.transaction-row').length;
                const serviceIndex = [...document.querySelectorAll('.service-block')].indexOf(serviceBlock);

                const row = document.createElement('div');
                row.className = 'row transaction-row mt-3';
                row.innerHTML = `
                <div class="form-group col-md-4">
                    <label>Type de transaction</label>
                    <select name="services[${serviceIndex}][transactions][${index}][type_transaction]" class="form-control" required>
                        <option value="">-- Sélectionner un type --</option>
                        <option value="emission">Émission</option>
                        <option value="reception">Réception</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Mode d'envoi</label>
                    <input type="text" name="services[${serviceIndex}][transactions][${index}][mode_envoi]" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Mode de réception</label>
                    <input type="text" name="services[${serviceIndex}][transactions][${index}][mode_reception]" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Nombre intra</label>
                    <input type="number" name="services[${serviceIndex}][transactions][${index}][nb_intra]" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Valeur intra</label>
                    <input type="number" name="services[${serviceIndex}][transactions][${index}][valeur_intra]" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Nombre hors</label>
                    <input type="number" name="services[${serviceIndex}][transactions][${index}][nb_hors]" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Valeur hors</label>
                    <input type="number" name="services[${serviceIndex}][transactions][${index}][valeur_hors]" class="form-control" required>
                </div>
                <div class="form-group col-md-12 text-right">
                    <button type="button" class="remove-transaction btn btn-link text-danger">
                        Supprimer cette transaction
                    </button>
                </div>
            `;
                container.appendChild(row);
            }

            // Remove transaction
            if (e.target && e.target.classList.contains('remove-transaction')) {
                const row = e.target.closest('.transaction-row');
                const container = row.closest('.transactions-container');
                const total = container.querySelectorAll('.transaction-row').length;

                if (total > 1) {
                    row.remove();
                } else {
                    alert("Au moins une transaction est requise.");
                }
            }
        });
    </script>
@endsection
