@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-md rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Acquisition de cartes</h2>

                <form method="POST" action="{{ route('acquisition.store') }}">
                    @csrf

                    {{-- Période globale --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Début période</label>
                            <input type="date" name="debut_periode"
                                class="form-input mt-1 w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Fin période</label>
                            <input type="date" name="fin_periode"
                                class="form-input mt-1 w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                    </div>

                    {{-- Zone dynamique --}}
                    <div id="details-container" class="space-y-6">
                        <div
                            class="detail-row bg-gray-50 border border-gray-200 p-6 rounded-lg grid grid-cols-1 md:grid-cols-2 gap-6 relative">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Type de carte</label>
                                <select name="details[0][codetype]"
                                    class="form-select mt-1 w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">-- Sélectionner --</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->code }}">{{ $type->code }} - {{ $type->libelle }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tarif</label>
                                <input type="number" name="details[0][tarif]"
                                    class="form-input mt-1 w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Plafond rechargement</label>
                                <input type="number" name="details[0][plafondrechargement]"
                                    class="form-input mt-1 w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Plafond retrait journalier</label>
                                <input type="number" name="details[0][plafondretraitjournalier]"
                                    class="form-input mt-1 w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>

                            <div class="md:col-span-2 text-right mt-4">
                                <button type="button" onclick="removeRow(this)"
                                    class="text-red-500 text-sm hover:underline">
                                    Supprimer cette ligne
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between">
                        {{-- Bouton ajouter ligne --}}
                        <div class="mt-6">
                            <button type="button" onclick="addRow()"
                                class="btn btn-secondary px-6 py-2 mb-4">
                                + Ajouter une ligne
                            </button>
                        </div>

                        {{-- Bouton soumettre --}}
                        <div class="mt-8">
                            <button type="submit"
                                class="mb-6 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                                Enregistrer l'acquisition
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script JavaScript --}}
    <script>
        let rowIndex = 1;

        function addRow() {
            const container = document.getElementById('details-container');
            const template = document.querySelector('.detail-row');
            const newRow = template.cloneNode(true);

            // Mise à jour des index
            newRow.querySelectorAll('input, select').forEach(el => {
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
