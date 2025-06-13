@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Émission de cartes</h2>

                <form method="POST" action="{{ route('emission-cartes.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Début période</label>
                            <input type="date" name="debut_periode" class="form-input w-full" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Fin période</label>
                            <input type="date" name="fin_periode" class="form-input w-full" required>
                        </div>
                    </div>

                    <hr class="my-6">

                    <h3 class="text-lg font-semibold mb-4">Détails</h3>

                    <div id="details-container">
                        <div class="detail-row grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <label>Famille Carte</label>
                                <select name="details[0][codefamille]" class="form-select w-full" required>
                                    <option value="">-- Sélectionner --</option>
                                    @foreach ($familles as $f)
                                        <option value="{{ $f->code }}">{{ $f->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label>Type Carte</label>
                                <select name="details[0][codetype]" class="form-select w-full" required>
                                    <option value="">-- Sélectionner --</option>
                                    @foreach ($types as $t)
                                        <option value="{{ $t->code }}">{{ $t->code }} - {{ $t->libelle }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label>Description</label>
                                <input type="text" name="details[0][description]" class="form-input w-full" required>
                            </div>

                            <div>
                                <label>Nombre de cartes</label>
                                <input type="number" name="details[0][nbcarte]" class="form-input w-full" required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between">
                        <button type="button" id="add-row" class="mb-6 btn btn-secondary px-6 py-2 mb-2">+ Ajouter une
                            ligne</button>

                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                            Enregistrer les émissions
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let rowIndex = 1;
        document.getElementById('add-row').addEventListener('click', () => {
            const container = document.getElementById('details-container');
            const newRow = container.children[0].cloneNode(true);
            newRow.querySelectorAll('select, input').forEach((el) => {
                const name = el.name;
                const newName = name.replace(/\d+/, rowIndex);
                el.name = newName;
                el.value = '';
            });
            container.appendChild(newRow);
            rowIndex++;
        });
    </script>
@endsection
