@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Déclaration d'incidents chèques/cartes</h2>

                <form method="POST" action="{{ route('incidentchequecarte.store') }}">
                    @csrf

                    {{-- Période globale --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Début période</label>
                            <input type="date" name="debut_periode" class="form-input w-full" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Fin période</label>
                            <input type="date" name="fin_periode" class="form-input w-full" required>
                        </div>
                    </div>

                    {{-- Zone dynamique --}}
                    <div id="details-container" class="space-y-6">
                        <div class="detail-row grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-4 border rounded">
                            <div>
                                <label class="block text-sm font-medium">Type</label>
                                <select name="details[0][type]" class="form-select w-full" required>
                                    <option value="">-- Choisir --</option>
                                    <option value="CHEQUE">CHEQUE</option>
                                    <option value="CARTE">CARTE</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Date incident</label>
                                <input type="date" name="details[0][dateincident]" class="form-input w-full" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Libellé incident</label>
                                <input type="text" name="details[0][libelleincident]" class="form-input w-full" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Risque</label>
                                <input type="text" name="details[0][risque]" class="form-input w-full">
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Nb d’occurrences</label>
                                <input type="number" name="details[0][nboccurrence]" class="form-input w-full" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Impact financier (CFA)</label>
                                <input type="number" name="details[0][impactfinancier]" class="form-input w-full" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Description</label>
                                <input type="text" name="details[0][descriptiondetaillee]" class="form-input w-full">
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Mesures correctives</label>
                                <input type="text" name="details[0][mesurescorrectives]" class="form-input w-full">
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Statut incident</label>
                                <input type="text" name="details[0][statutincident]" class="form-input w-full" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Date clôture</label>
                                <input type="date" name="details[0][datecloture]" class="form-input w-full">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium">Infos complémentaires</label>
                                <textarea name="details[0][infoscomplementaires]" class="form-textarea w-full" rows="2"></textarea>
                            </div>

                            <div class="md:col-span-2 text-right mt-2">
                                <button type="button" onclick="removeRow(this)"
                                    class="text-red-500 text-sm hover:underline">Supprimer cette ligne</button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between">

                        <div class="mt-4">
                            <button type="button" onclick="addRow()"
                                class="mb-6 bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                                Ajouter une ligne
                            </button>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                                Enregistrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let rowIndex = 1;

        function addRow() {
            const container = document.getElementById('details-container');
            const template = document.querySelector('.detail-row');
            const newRow = template.cloneNode(true);

            newRow.querySelectorAll('input, select, textarea').forEach(el => {
                if (el.name) {
                    el.name = el.name.replace(/\[\d+\]/, `[${rowIndex}]`);
                    el.value = '';
                }
            });

            container.appendChild(newRow);
            rowIndex++;
        }

        function removeRow(button) {
            const rows = document.querySelectorAll('.detail-row');
            if (rows.length > 1) {
                button.closest('.detail-row').remove();
            } else {
                alert("Au moins une ligne est requise.");
            }
        }
    </script>
@endsection
