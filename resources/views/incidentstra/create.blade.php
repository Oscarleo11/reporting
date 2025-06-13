@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('incidentstra.store') }}">
            @csrf

            <h2 class="text-xl font-bold mb-6">Déclaration des incidents STRA</h2>

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

            {{-- Zone dynamique --}}
            <div id="details-container" class="space-y-6">
                <div class="detail-block p-4 border rounded bg-gray-50">
                    <h3 class="font-semibold text-gray-700 mb-4"> Incident</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="details[0][plateformetechnique]" placeholder="Plateforme technique" class="form-input w-full" required>

                        <input type="text" name="details[0][risque]" placeholder="Risque" class="form-input w-full" required>

                        <input type="date" name="details[0][dateincident]" class="form-input w-full" required>

                        <input type="text" name="details[0][libelleincident]" placeholder="Libellé de l'incident" class="form-input w-full" required>

                        <input type="number" name="details[0][nboccurrence]" placeholder="Nombre d'occurrences" class="form-input w-full" required>

                        <textarea name="details[0][descriptiondetaillee]" placeholder="Description détaillée" class="form-input w-full" rows="2" required></textarea>

                        <textarea name="details[0][mesurescorrectives]" placeholder="Mesures correctives" class="form-input w-full" rows="2" required></textarea>

                        <input type="number" name="details[0][impactfinancier]" placeholder="Impact financier (CFA)" class="form-input w-full">

                        <select name="details[0][statutincident]" class="form-input w-full" required>
                            <option value="">-- Statut de l'incident --</option>
                            <option value="N">Non clôturé</option>
                            <option value="T">Clôturé</option>
                        </select>

                        <input type="date" name="details[0][datecloture]" class="form-input w-full" placeholder="Date de clôture">

                        <input type="text" name="details[0][naturedeclaration]" placeholder="Nature de déclaration" class="form-input w-full">

                        <input type="text" name="details[0][reference]" placeholder="Référence" class="form-input w-full">
                    </div>

                    <div class="text-right mt-3">
                        <button type="button" onclick="removeBlock(this)" class="text-red-500 text-sm hover:underline">❌ Supprimer cet incident</button>
                    </div>
                </div>
            </div>

            {{-- Ajouter un bloc --}}
            <div class="mt-6">
                <button type="button" onclick="addBlock()" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    ➕ Ajouter un incident
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

        clone.querySelectorAll('input, textarea, select').forEach(el => {
            if (el.name) {
                el.name = el.name.replace(/\d+/, index);
                el.value = '';
            }
        });

        container.appendChild(clone);
        index++;
    }

    function removeBlock(btn) {
        const blocks = document.querySelectorAll('.detail-block');
        if (blocks.length > 1) {
            btn.closest('.detail-block').remove();
        } else {
            alert("Au moins un incident est requis.");
        }
    }
</script>
@endsection
