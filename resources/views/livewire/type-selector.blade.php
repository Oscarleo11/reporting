<div>
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Type de carte (code)</label>
        <select wire:model="selectedCode" name="codetype" class="form-select w-full" required>
            <option value="">-- Choisir un code --</option>
            @foreach($types as $type)
                <option value="{{ $type->code }}">{{ $type->code }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Libellé</label>
        <input type="text" class="form-input w-full bg-gray-100" value="{{ $libelle }}" disabled>
    </div>
</div>

