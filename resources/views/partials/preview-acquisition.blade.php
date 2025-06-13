<div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-800">Acquisition de cartes ({{ $data->count() }} lignes)</h3>
        <a href="{{ route('declaration.generate-xml', [
            'type' => 'acquisition',
            'debut' => request('debut'),
            'fin' => request('fin')
        ]) }}"
           class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
            Générer XML
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3 text-left border">Type</th>
                    <th class="p-3 text-left border">Tarif</th>
                    <th class="p-3 text-left border">Plafond rechargement</th>
                    <th class="p-3 text-left border">Retrait journalier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="p-3 border">{{ $item->code_type }}</td>
                        <td class="p-3 border">{{ number_format($item->tarif, 0, ',', ' ') }}</td>
                        <td class="p-3 border">{{ number_format($item->plafond_rechargement, 0, ',', ' ') }}</td>
                        <td class="p-3 border">{{ number_format($item->plafond_retrait_journalier, 0, ',', ' ') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
