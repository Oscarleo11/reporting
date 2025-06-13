@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('fraudestra.store') }}">
            @csrf

            <h2 class="text-xl font-bold mb-6">🚨 Déclaration de Fraudes STRA</h2>

            {{-- Période --}}
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

            {{-- Détails dynamiques --}}
            <div id="details-container" class="space-y-6">
                <div class="detail-block p-4 border rounded bg-gray-50">
                    <h3 class="font-semibold text-gray-700 mb-4">🧾 Détail de la fraude</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="details[0][fraude]" placeholder="Code fraude" class="form-input w-full" required>
                        <input type="text" name="details[0][service]" placeholder="Service concerné" class="form-input w-full" required>
                        <input type="number" name="details[0][nb_fraude]" placeholder="Nombre de fraudes" class="form-input w-full" required>
                        <input type="number" name="details[0][valeur_fraude]" placeholder="Valeur fraude CFA" class="form-input w-full" required>
                        <input type="date" name="details[0][debut_fraude]" placeholder="Début fraude" class="form-input w-full" required>
                        <input type="date" name="details[0][fin_fraude]" placeholder="Fin fraude" class="form-input w-full" required>

                        <textarea name="details[0][mode_operatoire]" placeholder="Mode opératoire"
                                  class="form-input w-full md:col-span-2" rows="2" required></textarea>

                        <textarea name="details[0][mesures_correctives]" placeholder="Mesures correctives"
                                  class="form-input w-full md:col-span-2" rows="2" required></textarea>
                    </div>

                    <div class="text-right mt-3">
                        <button type="button" onclick="removeBlock(this)" class="text-red-500 text-sm hover:underline">
                            ❌ Supprimer ce bloc
                        </button>
                    </div>
                </div>
            </div>

            {{-- Ajouter un bloc --}}
            <div class="mt-6">
                <button type="button" onclick="addBlock()" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    ➕ Ajouter une fraude
                </button>
            </div>

            {{-- Enregistrer --}}
            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    ✅ Enregistrer
                </button>
            </div>
        </form>
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

    function removeBlock(btn) {
        const blocks = document.querySelectorAll('.detail-block');
        if (blocks.length > 1) {
            btn.closest('.detail-block').remove();
        } else {
            alert("Au moins une ligne est requise.");
        }
    }
</script>
@endsection
