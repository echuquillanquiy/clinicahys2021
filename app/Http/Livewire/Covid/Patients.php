<?php

namespace App\Http\Livewire\Covid;
use App\Models\Patient;
use Carbon\Carbon;
use Livewire\WithPagination;

use Livewire\Component;

class Patients extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $search, $pageSelected, $selected_id, $dni, $name, $lastname, $birthday, $age = 0, $now;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = "Listado";
        $this->componentName = "Empresas Clientes";
        $this->pageSelected = 10;
        $this->calcEdad();
    }

    public function render()
    {
        if ($this->search)
            $patients = Patient::orderBy('id', 'desc')
                ->where('dni', 'LIKE', '%' . $this->search . '%')
                ->orWhere('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pageSelected);
        else
            $patients = Patient::orderBy('id', 'desc')
                ->paginate($this->pageSelected);

        return view('livewire.covid.patient.patients', compact('patients'));
    }

    public function Edit(Patient $patient)
    {
        $this->dni = $patient->dni;
        $this->name = $patient->name;
        $this->lastname = $patient->lastname;
        $this->birthday = $patient->birthday;
        $this->age = $patient->age;
        $this->selected_id = $patient->id;

        $this->emit('show-modal', 'Show Modal');

    }

    public function calcEdad()
    {
        $this->now = Carbon::now();
        $this->age = Carbon::parse($this->birthday)->diffInYears($this->now, $this->birthday);
    }

    public function resetUI()
    {

    }
}
