@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('risquestra.store') }}">
            @csrf

            <h2 class="text-xl font-bold mb-6">Déclaration de Risques STRA</h2>

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
                    <h3 class="font-semibold text-gray-700 mb-4">🧾 Risque</h3>

                    <div class="grid grid-cols-1 gap-4">
                        <select name="details[0][code]" class="form-input w-full" required>
                            <option value="">-- Sélectionner un type de risque --</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->code }}">{{ $type->code }} - {{ $type->libelle }}</option>
                            @endforeach
                        </select>

                        <textarea name="details[0][risque]" class="form-input w-full" rows="2" placeholder="Libellé du risque" required></textarea>

                        <textarea name="details[0][mecanisme_maitrise]" class="form-input w-full" rows="2"
                                  placeholder="Mécanisme de maîtrise" required></textarea>
                    </div>

                    <div class="text-right mt-3">
                        <button type="button" onclick="removeBlock(this)" class="text-red-500 text-sm hover:underline">
                            ❌ Supprimer ce risque
                        </button>
                    </div>
                </div>
            </div>

            {{-- Ajouter un risque --}}
            <div class="mt-6">
                <button type="button" onclick="addBlock()" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Ajouter un risque
                </button>
            </div>

            {{-- Submit --}}
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
            alert("Au moins un risque est requis.");
        }
    }
</script>
@endsection
