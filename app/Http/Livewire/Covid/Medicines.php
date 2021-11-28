<?php

namespace App\Http\Livewire\Covid;
use App\Models\Medicine;
use App\Models\Order;
use Carbon\Carbon;
use Livewire\WithPagination;

use Livewire\Component;

class Medicines extends Component
{
    use WithPagination;

    public $search, $selected_id, $pageTitle, $componentName, $pageSelected, $dateFilter;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->componentName = 'Medicina';
        $this->pageTitle = 'Listado de Atenciones';
        $this->dateFilter = Carbon::now()->format('Y-m-d');
        $this->pageSelected = 125;
    }

    public function render()
    {
        if ($this->search)
            $medicines = Medicine::join('patients as pat', 'pat.id', 'medicines.patient_id')
                ->select('medicines.*', 'pat.lastname as apellidos', 'pat.name as nombres')
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('pat.name', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pageSelected);
        else
            $medicines = Medicine::orderBy('id', 'asc')
                ->where('created_at', 'LIKE', '%' . $this->dateFilter . '%')
                ->paginate($this->pageSelected);

        return view('livewire.covid.medicine.medicines', compact('medicines'));
    }
}
