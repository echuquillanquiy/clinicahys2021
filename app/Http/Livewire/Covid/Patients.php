<?php

namespace App\Http\Livewire\Covid;
use App\Models\Patient;
use Carbon\Carbon;
use Livewire\WithPagination;

use Livewire\Component;

class Patients extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $search, $pageSelected, $selected_id, $dni, $name, $lastname, $birthday, $age, $now;

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

    public function Store()
    {
        $rules = [
            'dni' => 'required|min:8|unique:patients',
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'birthday' => 'required',
            'age' => 'required'
        ];

        $messages = [
            'dni.required' => 'El # DNI es requerido.',
            'dni.min' => 'El dni debe tener mínimo 8 digítos.',
            'dni.unique' => 'El DNI ya esta registrado.',
            'name.required' => 'Los nombres son obligatorios.',
            'name.min' => 'Los nombres deben tener minimo 3 carácteres.',
            'lastname.required' => 'Los apellidos son obligatorios.',
            'lastname.min' => 'Los apellidos debe tener minimo 3 carácteres.',
            'birthday.required' => 'la fecha de nacimiento es obligatoria.',
            'age.required' => 'La edad es obligatoria.'
        ];

        $this->validate($rules, $messages);

        Patient::create([
            'dni' => $this->dni,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'birthday' => $this->birthday,
            'age' => $this->age
        ]);

        $this->resetUI();
        $this->emit('patient-added', 'Paciente registrado');
    }

    public function Update()
    {
        $rules = [
            'dni' => "required|min:8|unique:patients,dni,{$this->selected_id}",
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'birthday' => 'required',
            'age' => 'required'
        ];

        $messages = [
            'dni.required' => 'El # DNI es requerido.',
            'dni.min' => 'El dni debe tener mínimo 8 digítos.',
            'dni.unique' => 'El DNI ya esta registrado.',
            'name.required' => 'Los nombres son obligatorios.',
            'name.min' => 'Los nombres deben tener minimo 3 carácteres.',
            'lastname.required' => 'Los apellidos son obligatorios.',
            'lastname.min' => 'Los apellidos debe tener minimo 3 carácteres.',
            'birthday.required' => 'la fecha de nacimiento es obligatoria.',
            'age.required' => 'La edad es obligatoria.'
        ];

        $this->validate($rules, $messages);

        $patient = Patient::find($this->selected_id);

        $patient->update([
            'dni' => $this->dni,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'birthday' => $this->birthday,
            'age' => $this->age
        ]);

        $this->resetUI();
        $this->emit('patient-updated', 'Paciente registrado');
    }

    public function resetUI()
    {
        $this->dni = '';
        $this->name = '';
        $this->lastname = '';
        $this->birthday = '';
        $this->age = 0;
        $this->selected_id = 0;
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Patient $patient)
    {
        $patient->delete();

        $this->resetUI();
        $this->emit('client-deleted', 'Paciente eliminado');
    }
}
