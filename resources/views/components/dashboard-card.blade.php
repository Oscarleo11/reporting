@props(['icon', 'label', 'count', 'url', 'color'])

<a href="{{ $url }}" class="block bg-white shadow rounded-lg p-6 border-l-4 border-{{ $color }}-500 hover:bg-{{ $color }}-50 transition">
    <div class="flex items-center space-x-4">
        <svg class="w-8 h-8 text-{{ $color }}-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <use href="#{{ $icon }}" />
        </svg>
        <div>
            <h3 class="text-lg font-bold text-gray-800">{{ $label }}</h3>
            <p class="text-sm text-gray-500">{{ $count }} enregistrements</p>
        </div>
    </div>
</a>
