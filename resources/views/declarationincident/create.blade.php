@extends('layouts.dashboard')

@section('title', 'Déclaration d’incidents')
@section('content')
    <div class="section">
        <div class="section-header">
            <h1><i class="fas fa-bolt text-danger mr-2"></i> Déclaration d’incidents</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('declarationincident.index') }}" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-list"></i> Liste
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header text-white">
                            <h4 class="mb-0"><i class="fas fa-exclamation-circle mr-2"></i> Formulaire de déclaration</h4>
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

                            <form method="POST" action="{{ route('declarationincident.store') }}">
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

                                {{-- Éléments constitutifs --}}
                                <hr>
                                <h5 class="text-dark"> Éléments constitutifs</h5>
                                <div id="constitutif-container" class="mb-3">
                                    <div class="constitutif-row border rounded p-3 bg-light mb-2">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Code</label>
                                                <select name="elements_constitutifs[0][code]" class="form-control" required
                                                    onchange="setIntitule(this)">
                                                    <option value="">-- Sélectionner un code --</option>
                                                    @foreach ($codes as $code)
                                                        <option value="{{ $code->code }}"
                                                            data-libelle="{{ $code->libelle }}">
                                                            {{ $code->code }} {{-- - {{ $code->libelle }} --}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Intitulé</label>
                                                <input type="text" name="elements_constitutifs[0][intitule]"
                                                    class="form-control" required readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Valeur</label>
                                                <input type="number" name="elements_constitutifs[0][valeur]"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="removeConstitutif(this)" class="btn btn-link text-danger p-0">❌ Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" onclick="addConstitutif()" class="btn btn-outline-dark btn-sm mb-4">
                                     Ajouter un élément
                                </button>

                                {{-- Incidents --}}
                                <h5 class="text-dark"> Fiche descriptive des incidents</h5>
                                <div id="incident-container" class="mb-3">
                                    <div class="incident-row border rounded p-3 bg-light mb-2">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label>Nombre</label>
                                                <input type="number" name="incidents[0][nombre]" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Descriptif</label>
                                                <input type="text" name="incidents[0][descriptif]" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Mesure prise</label>
                                                <input type="text" name="incidents[0][mesureprise]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="removeIncident(this)" class="btn btn-link text-danger p-0">❌ Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" onclick="addIncident()" class="btn btn-outline-danger btn-sm mb-4">
                                     Ajouter un incident
                                </button>

                                {{-- Captures --}}
                                <h5 class="text-dark"> Fiche des motifs de capture</h5>
                                <div id="capture-container" class="mb-3">
                                    <div class="capture-row border rounded p-3 bg-light mb-2">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label>Nombre</label>
                                                <input type="number" name="captures[0][nombre]" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Motif</label>
                                                <input type="text" name="captures[0][motif]" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Mesure prise</label>
                                                <input type="text" name="captures[0][mesureprise]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="removeCapture(this)" class="btn btn-link text-danger p-0">❌ Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" onclick="addCapture()" class="btn btn-outline-secondary btn-sm mb-4">
                                     Ajouter une capture
                                </button>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i> Enregistrer
                                    </button>
                                </div>
                            </form>

                        </div> <!-- card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS --}}
    <script>
        let constitutifIndex = 1,
            incidentIndex = 1,
            captureIndex = 1;

        function addConstitutif() {
            const container = document.getElementById('constitutif-container');
            const block = container.querySelector('.constitutif-row').cloneNode(true);
            block.querySelectorAll('input, select').forEach(el => {
                el.name = el.name.replace(/\d+/, constitutifIndex);
                if (el.tagName === 'INPUT') el.value = '';
                if (el.tagName === 'SELECT') el.selectedIndex = 0;
            });
            // S'assure que le select a bien l'événement
            block.querySelector('select').setAttribute('onchange', 'setIntitule(this)');
            container.appendChild(block);
            constitutifIndex++;
        }

        function addIncident() {
            const container = document.getElementById('incident-container');
            const block = container.querySelector('.incident-row').cloneNode(true);
            block.querySelectorAll('input').forEach(el => {
                el.name = el.name.replace(/\d+/, incidentIndex);
                el.value = '';
            });
            container.appendChild(block);
            incidentIndex++;
        }

        function addCapture() {
            const container = document.getElementById('capture-container');
            const block = container.querySelector('.capture-row').cloneNode(true);
            block.querySelectorAll('input').forEach(el => {
                el.name = el.name.replace(/\d+/, captureIndex);
                el.value = '';
            });
            container.appendChild(block);
            captureIndex++;
        }

        function setIntitule(select) {
            const intituleInput = select.closest('.form-row').querySelector('input[name*="[intitule]"]');
            const selectedOption = select.options[select.selectedIndex];
            intituleInput.value = selectedOption.getAttribute('data-libelle');
        }

        function removeConstitutif(button) {
            const container = document.getElementById('constitutif-container');
            if (container.querySelectorAll('.constitutif-row').length > 1) {
                button.closest('.constitutif-row').remove();
            } else {
                alert('Il doit y avoir au moins un élément constitutif.');
            }
        }

        function removeIncident(button) {
            const container = document.getElementById('incident-container');
            if (container.querySelectorAll('.incident-row').length > 1) {
                button.closest('.incident-row').remove();
            } else {
                alert('Il doit y avoir au moins un incident.');
            }
        }

        function removeCapture(button) {
            const container = document.getElementById('capture-container');
            if (container.querySelectorAll('.capture-row').length > 1) {
                button.closest('.capture-row').remove();
            } else {
                alert('Il doit y avoir au moins une capture.');
            }
        }
    </script>
@endsection
