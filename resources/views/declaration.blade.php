@extends('layouts.app')

@section('content')
<div class="py-12 max-w-7xl mx-auto">
    <div class="bg-white p-8 shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-6">Déclaration</h2>

        <!-- Sélection du type -->
        <div class="mb-8">
            <label class="block text-sm font-semibold mb-2">Type de déclaration</label>
            <select id="declaration-type" class="form-select w-full">
                <option value="">-- Choisir --</option>
                <option value="acquisition">Acquisition de cartes</option>
                <option value="emission">Émission de cartes</option>
                <option value="fraude">Fraude chèque/carte</option>
            </select>
        </div>

        <!-- Période -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <label class="block text-sm font-semibold">Début période</label>
                <input type="date" id="debut-periode" class="form-input w-full">
            </div>
            <div>
                <label class="block text-sm font-semibold">Fin période</label>
                <input type="date" id="fin-periode" class="form-input w-full">
            </div>
        </div>

        <!-- Boutons d'action -->
        <div class="flex space-x-4">
            <button id="preview-btn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Voir les données
            </button>
            <button id="generate-xml-btn" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Générer XML
            </button>
        </div>

        <!-- Zone de prévisualisation -->
        <div id="preview-container" class="mt-8 hidden">
            <!-- Contenu dynamique chargé via AJAX -->
        </div>
    </div>
</div>

<script>
    document.getElementById('preview-btn').addEventListener('click', function() {
        const type = document.getElementById('declaration-type').value;
        const debut = document.getElementById('debut-periode').value;
        const fin = document.getElementById('fin-periode').value;

        if (!type || !debut || !fin) {
            alert('Veuillez remplir tous les champs.');
            return;
        }

        // Chargement AJAX
        fetch(`/declaration/preview?type=${type}&debut=${debut}&fin=${fin}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('preview-container').innerHTML = html;
                document.getElementById('preview-container').classList.remove('hidden');
            });
    });

    document.getElementById('generate-xml-btn').addEventListener('click', function() {
        const type = document.getElementById('declaration-type').value;
        const debut = document.getElementById('debut-periode').value;
        const fin = document.getElementById('fin-periode').value;

        if (!type || !debut || !fin) {
            alert('Veuillez remplir tous les champs.');
            return;
        }

        // Téléchargement du XML
        window.location.href = `/declaration/generate-xml?type=${type}&debut=${debut}&fin=${fin}`;
    });
</script>
@endsection
