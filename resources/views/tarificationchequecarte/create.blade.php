@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Saisie de la tarification (carte & chèque)</h2>

                <form method="POST" action="{{ route('tarificationchequecarte.store') }}">
                    @csrf

                    {{-- Période --}}
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

                    {{-- Cartes --}}
                    <h3 class="text-lg font-semibold text-blue-700 mb-2">Tarification Carte</h3>
                    <div id="cartes-container" class="space-y-4 mb-6">
                        <div class="carte-row grid grid-cols-1 md:grid-cols-2 gap-6 bg-blue-50 p-4 border rounded">
                            <div>
                                {{-- <label class="block text-sm font-medium">Code service</label>
                                <input type="text" name="cartes[0][code]" class="form-input w-full" required> --}}
                                <label for="">Code service</label>
                                <select name="details[0][code]" class="form-select w-full" required>
                                    <option value="">-- Sélectionner --</option>
                                    @foreach ($famillesCa as $tarifcarte)
                                        <option value="{{ $tarifcarte->code }}">{{ $tarifcarte->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Coût minimum</label>
                                <input type="number" name="cartes[0][coutminimum]" class="form-input w-full" required>
                            </div>
                            <div class="md:col-span-2 text-right">
                                <button type="button" onclick="removeRow(this, 'carte')"
                                    class="text-red-500 text-sm hover:underline">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="addRow('carte')"
                        class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                        Ajouter un service carte
                    </button><br><br><br>

                    {{-- Chèques --}}
                    <h3 class="text-lg font-semibold text-green-700 mb-2">Tarification Chèque</h3>
                    <div id="cheques-container" class="space-y-4 mb-6">
                        <div class="cheque-row grid grid-cols-1 md:grid-cols-2 gap-6 bg-green-50 p-4 border rounded">
                            <div>
                                {{-- <label class="block text-sm font-medium">Code service</label>
                                <input type="text" name="cheques[0][code]" class="form-input w-full" required> --}}
                                <label for="">Code service</label>
                                <select name="details[0][code]" class="form-select w-full" required>
                                    <option value="">-- Sélectionner --</option>
                                    @foreach ($famillesCH as $tarifcheque)
                                        <option value="{{ $tarifcheque->code }}">{{ $tarifcheque->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Coût minimum</label>
                                <input type="number" name="cheques[0][coutminimum]" class="form-input w-full" required>
                            </div>
                            <div class="md:col-span-2 text-right">
                                <button type="button" onclick="removeRow(this, 'cheque')"
                                    class="text-red-500 text-sm hover:underline">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between">
                        <button type="button" onclick="addRow('cheque')"
                            class="mb-6 bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                            Ajouter un service chèque
                        </button>

                        <div class="mt-8">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                                Enregistrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script>
        let carteIndex = 1;
        let chequeIndex = 1;

        function addRow(type) {
            const container = document.getElementById(type + 's-container');
            const template = document.querySelector('.' + type + '-row');
            const newRow = template.cloneNode(true);

            newRow.querySelectorAll('input').forEach(el => {
                if (el.name) {
                    el.name = el.name.replace(/\[\d+\]/, `[${type === 'carte' ? carteIndex : chequeIndex}]`);
                    el.value = '';
                }
            });

            container.appendChild(newRow);
            type === 'carte' ? carteIndex++ : chequeIndex++;
        }

        function removeRow(button, type) {
            const rows = document.querySelectorAll('.' + type + '-row');
            if (rows.length > 1) {
                button.closest('.' + type + '-row').remove();
            } else {
                alert("Au moins une ligne est requise.");
            }
        }
    </script>
@endsection
