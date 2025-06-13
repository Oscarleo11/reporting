@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('ecosysteme.store') }}">
            @csrf

            <h2 class="text-xl font-bold mb-6">🌐 Déclaration Écosystème</h2>

            {{-- Période et infos globales --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium">Début période</label>
                    <input type="date" name="debut_periode" class="form-input w-full" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Fin période</label>
                    <input type="date" name="fin_periode" class="form-input w-full" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Nombre de sous-agents</label>
                    <input type="number" name="nbsous_agents" class="form-input w-full" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Nombre de points de service</label>
                    <input type="number" name="nbpoints_service" class="form-input w-full" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium">Modalité de contrôle des sous-agents</label>
                    <textarea name="modalite_controle_sousagents" class="form-input w-full" rows="3" required></textarea>
                </div>
            </div>

            {{-- Services dynamiques --}}
            <div id="services-container" class="space-y-6 mb-6">
                <div class="service-block p-4 border rounded bg-gray-50">
                    <h3 class="font-semibold text-gray-700 mb-4">🛠️ Service</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="services[0][service_offert]" class="form-input w-full" placeholder="Service offert" required>
                        <input type="text" name="services[0][operateur]" class="form-input w-full" placeholder="Opérateur" required>
                        <input type="text" name="services[0][pays_operateur]" class="form-input w-full" placeholder="Pays opérateur" required>
                        <input type="text" name="services[0][perimetre_partenariat]" class="form-input w-full" placeholder="Périmètre partenariat" required>
                        <input type="date" name="services[0][debut_partenariat]" class="form-input w-full" placeholder="Début partenariat" required>
                        <input type="date" name="services[0][fin_partenariat]" class="form-input w-full" placeholder="Fin partenariat (optionnel)">
                        <textarea name="services[0][description_service]" class="form-input w-full md:col-span-2" placeholder="Description du service" rows="3" required></textarea>
                    </div>

                    <div class="text-right mt-3">
                        <button type="button" onclick="removeBlock(this)" class="text-red-500 text-sm hover:underline">
                            ❌ Supprimer ce service
                        </button>
                    </div>
                </div>
            </div>

            {{-- Bouton d'ajout --}}
            <button type="button" onclick="addService()" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 mb-6">
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

        clone.querySelectorAll('input, textarea').forEach(el => {
            el.name = el.name.replace(/\d+/, serviceIndex);
            el.value = '';
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
