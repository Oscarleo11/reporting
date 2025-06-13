@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('annuairestra.store') }}">
            @csrf

            <h2 class="text-xl font-bold mb-6">🗂️ Déclaration STRA</h2>

            {{-- Période globale --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium">Début période</label>
                    <input type="date" name="debut_periode" class="form-input w-full" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Fin période</label>
                    <input type="date" name="fin_periode" class="form-input w-full" required>
                </div>
            </div>

            {{-- Bloc dynamique des services --}}
            <div id="services-container" class="space-y-6 mb-6">
                {{-- Bloc prototype --}}
                <div class="service-block p-4 border rounded bg-gray-50">
                    <h3 class="font-semibold text-gray-700 mb-4">🧍‍♂️ Service</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" name="services[0][operateur]" placeholder="Opérateur" class="form-input w-full" required>
                        <select name="services[0][code_service]" class="form-input w-full" required>
                            <option value="">-- Code --</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->code }}">{{ $service->code }} - {{ $service->libelle }}</option>
                            @endforeach
                        </select>

                        <input type="number" name="services[0][nbsous_agents]" placeholder="Sous-agents" class="form-input w-full" required>
                        <input type="number" name="services[0][nbpoints_service]" placeholder="Points de service" class="form-input w-full" required>
                        <input type="text" name="services[0][description_service]" placeholder="Description service" class="form-input w-full">
                        <input type="date" name="services[0][date_lancement]" class="form-input w-full">
                        <input type="text" name="services[0][perimetre]" placeholder="Périmètre" class="form-input w-full">
                        <input type="text" name="services[0][mecanisme_compensation_reglement]" placeholder="Mécanisme de compensation" class="form-input w-full">
                    </div><br><br>

                    {{-- Transactions dynamiques --}}
                    <div class="transactions-container space-y-4 mt-4">
                        <div class="transaction-row grid grid-cols-1 md:grid-cols-2 gap-4">
                            <select name="services[0][transactions][0][type_transaction]" class="form-input w-full" required>
                                <option value="">-- Type de transaction --</option>
                                <option value="emission">Émission</option>
                                <option value="reception">Réception</option>
                            </select>
                            <input type="text" name="services[0][transactions][0][mode_envoi]" placeholder="Mode d'envoi" class="form-input w-full">
                            <input type="text" name="services[0][transactions][0][mode_reception]" placeholder="Mode de réception" class="form-input w-full">
                            <input type="number" name="services[0][transactions][0][nb_intra]" placeholder="Nb intra" class="form-input w-full" required>
                            <input type="number" name="services[0][transactions][0][valeur_intra]" placeholder="Valeur intra" class="form-input w-full" required>
                            <input type="number" name="services[0][transactions][0][nb_hors]" placeholder="Nb hors" class="form-input w-full" required>
                            <input type="number" name="services[0][transactions][0][valeur_hors]" placeholder="Valeur hors" class="form-input w-full" required>
                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button type="button" class="add-transaction bg-gray-100 px-3 py-1 rounded hover:bg-gray-200 text-sm text-gray-600">
                            ➕ Ajouter une transaction
                        </button>
                    </div>

                    <div class="text-right mt-4">
                        <button type="button" onclick="removeService(this)" class="text-red-500 hover:underline">❌ Supprimer ce service</button>
                    </div>
                </div>
            </div>

            {{-- Ajouter un service --}}
            <button type="button" onclick="addService()" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded mb-6">
                ➕ Ajouter un service
            </button>

            {{-- Submit --}}
            <div>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    ✅ Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let serviceIndex = 1;

function addService() {
    const container = document.getElementById('services-container');
    const prototype = container.querySelector('.service-block');
    const clone = prototype.cloneNode(true);

    clone.querySelectorAll('input, select').forEach(el => {
        if (el.name) {
            el.name = el.name.replace(/\d+/, serviceIndex).replace(/\[\d+\]/g, '[0]');
            el.value = '';
        }
    });

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

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('add-transaction')) {
        const serviceBlock = e.target.closest('.service-block');
        const container = serviceBlock.querySelector('.transactions-container');
        const index = container.querySelectorAll('.transaction-row').length;
        const serviceIndex = [...document.querySelectorAll('.service-block')].indexOf(serviceBlock);

        const row = document.createElement('div');
        row.className = 'transaction-row grid grid-cols-1 md:grid-cols-2 gap-4 mt-4';
        row.innerHTML = `
            <select name="services[${serviceIndex}][transactions][${index}][type_transaction]" class="form-input w-full" required>
                <option value="">-- Type de transaction --</option>
                <option value="emission">Émission</option>
                <option value="reception">Réception</option>
            </select>
            <input type="text" name="services[${serviceIndex}][transactions][${index}][mode_envoi]" placeholder="Mode d'envoi" class="form-input w-full">
            <input type="text" name="services[${serviceIndex}][transactions][${index}][mode_reception]" placeholder="Mode de réception" class="form-input w-full">
            <input type="number" name="services[${serviceIndex}][transactions][${index}][nb_intra]" placeholder="Nb intra" class="form-input w-full" required>
            <input type="number" name="services[${serviceIndex}][transactions][${index}][valeur_intra]" placeholder="Valeur intra" class="form-input w-full" required>
            <input type="number" name="services[${serviceIndex}][transactions][${index}][nb_hors]" placeholder="Nb hors" class="form-input w-full" required>
            <input type="number" name="services[${serviceIndex}][transactions][${index}][valeur_hors]" placeholder="Valeur hors" class="form-input w-full" required>
            <div class="col-span-2 text-right">
                <button type="button" class="remove-transaction text-red-500 text-sm hover:underline mt-1">
                    ❌ Supprimer cette transaction
                </button>
            </div>
        `;

        container.appendChild(row);
    }

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
