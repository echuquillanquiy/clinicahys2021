<?php

namespace App\Http\Livewire\Covid;
use App\Models\Medicine;
use Livewire\WithPagination;

use Livewire\Component;

class Medicines extends Component
{
    use WithPagination;

    public $search, $selected_id, $pageTitle, $componentName, $pageSelected;

    public function mount()
    {
        $this->componentName = 'Medicina';
        $this->pageTitle = 'Listado de Atenciones';
        $this->pageSelected = 25;
    }

    public function render()
    {
        $medicines = Medicine::orderBy('id', 'desc')
            ->paginate($this->pageSelected);

        return view('livewire.covid.medicine.medicines', compact('medicines'));
    }
}
