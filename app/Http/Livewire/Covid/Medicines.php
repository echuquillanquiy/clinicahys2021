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
        $placesuser = auth()->user()->place;

        if ($placesuser == "HUANCAYO")
            $medicines = Medicine::join('patients as pat', 'pat.id', 'medicines.patient_id')
                ->select('medicines.*', 'pat.origin as procedencia', 'pat.lastname as apellidos', 'medicines.created_at as fecha')
                ->where('pat.origin', 'LIKE', 'HUANCAYO')
                ->whereDate('medicines.created_at', 'LIKE', $this->dateFilter)
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'asc')
                ->paginate($this->pageSelected);
        elseif ($placesuser == "HUANCAVELICA")
            $medicines = Medicine::join('patients as pat', 'pat.id', 'medicines.patient_id')
                ->select('medicines.*', 'pat.origin as procedencia', 'pat.lastname as apellidos', 'medicines.created_at as fecha')
                ->where('pat.origin', 'LIKE', 'HUANCAVELICA')
                ->whereDate('medicines.created_at', 'LIKE', $this->dateFilter)
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'asc')
                ->paginate($this->pageSelected);
        elseif ($placesuser == "LIMA")
            $medicines = Medicine::join('patients as pat', 'pat.id', 'medicines.patient_id')
                ->select('medicines.*', 'pat.origin as procedencia', 'pat.lastname as apellidos', 'medicines.created_at as fecha')
                ->where('pat.origin', 'LIKE', 'LIMA')
                ->whereDate('medicines.created_at', 'LIKE', $this->dateFilter)
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'asc')
                ->paginate($this->pageSelected);
        elseif ($placesuser == "PASCO")
            $medicines = Medicine::join('patients as pat', 'pat.id', 'medicines.patient_id')
                ->select('medicines.*', 'pat.origin as procedencia', 'pat.lastname as apellidos', 'medicines.created_at as fecha')
                ->where('pat.origin', 'LIKE', 'PASCO')
                ->whereDate('medicines.created_at', 'LIKE', $this->dateFilter)
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'asc')
                ->paginate($this->pageSelected);
        else
            $medicines = Medicine::join('patients as pat', 'pat.id', 'medicines.patient_id')
                ->select('medicines.*', 'pat.origin as procedencia', 'pat.lastname as apellidos', 'medicines.created_at as fecha')
                ->whereDate('medicines.created_at', 'LIKE', $this->dateFilter)
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'asc')
                ->paginate($this->pageSelected);


        return view('livewire.covid.medicine.medicines', compact('medicines'));
    }
}
