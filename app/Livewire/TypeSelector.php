<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TypeCarte;

class TypeSelector extends Component
{
    public $types;
    public $selectedCode = '';
    public $libelle = '';

    public function mount()
    {
        $this->types = TypeCarte::all();
    }

    public function updatedSelectedCode($value)
    {
        $type = TypeCarte::where('code', $value)->first();
        $this->libelle = $type?->libelle ?? '';
    }

    public function render()
    {
        return view('livewire.type-selector');
    }
}
