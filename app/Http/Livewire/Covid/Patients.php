<?php

namespace App\Http\Livewire\Covid;
use App\Models\Client;
use App\Models\Department;
use App\Models\Patient;
use App\Models\Position;
use App\Models\Test;
use Carbon\Carbon;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class Patients extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $pageTitle, $componentName, $search, $pageSelected, $selected_id, $dni, $name, $lastname, $birthday, $age, $now, $origin, $image;
    public $clientId = 1, $positionId, $testId = 1;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = "Listado";
        $this->componentName = "Pacientes";
        $this->pageSelected = 10;
        $this->origin = 'HUANCAYO';
        $this->calcEdad();
    }

    public function render()
    {
        $clients = Client::all();
        $positions = Position::all();
        $tests = Test::all();

        if (auth()->user()->place == "HUANCAYO")
        {
            $patients = Patient::orderBy('id', 'desc')
                ->where('origin', 'LIKE', 'HUANCAYO')
                ->where('dni', 'LIKE', '%' . $this->search . '%')
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->where('lastname', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pageSelected);
        } elseif (auth()->user()->place == "LIMA") {
            $patients = Patient::orderBy('id', 'desc')
                ->where('origin', 'LIKE', 'LIMA')
                ->where('dni', 'LIKE', '%' . $this->search . '%')
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->where('lastname', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pageSelected);

        } elseif (auth()->user()->place == "HUANCAVELICA") {
            $patients = Patient::orderBy('id', 'desc')
                ->where('origin', 'LIKE', 'HUANCAVELICA')
                ->where('dni', 'LIKE', '%' . $this->search . '%')
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->where('lastname', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pageSelected);
        } else {
            $patients = Patient::orderBy('id', 'desc')
                ->where('dni', 'LIKE', '%' . $this->search . '%')
                ->orWhere('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pageSelected);
        }

        return view('livewire.covid.patient.patients', compact('patients', 'clients', 'positions', 'tests'));
    }

    public function Edit(Patient $patient)
    {
        $this->dni = $patient->dni;
        $this->name = $patient->name;
        $this->lastname = $patient->lastname;
        $this->birthday = $patient->birthday;
        $this->age = $patient->age;
        $this->origin = $patient->origin;
        $this->selected_id = $patient->id;
        $this->image = null;

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
            'age' => 'required',
            'origin' => 'required'
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
            'age.required' => 'La edad es obligatoria.',
            'origin.required' => 'El departamento de origen es requerido.',
        ];

        $this->validate($rules, $messages);

        $patient = Patient::create([
            'dni' => $this->dni,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'birthday' => $this->birthday,
            'age' => $this->age,
            'origin' => $this->origin
        ]);

        if ($this->image)
        {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/patients_huella_firma', $customFileName);
            $patient->image = $customFileName;
            $patient->save();
        }

        $data = [
            'user_id' => auth()->user()->id,
            'patient_id' => $patient->id,
            'position_id' => $this->positionId,
            'client_id' => $this->clientId,
            'test_id' => $this->testId
        ];

        $order = $patient->orders()->create($data);

        $dataLab = [
            'patient_id' => $order->patient_id,
            'order_id' => $order->id,
            'user_id' => auth()->user()->id
        ];

        $laboratory = $order->laboratory()->create($dataLab);

        $dataMed = [
            'anam_description' => 'NIEGA CONTACTO DIRECTO CON PERSONA O CASO SOSPECHOSO O CONFINADO DE COVID-19 EN LOS ULTIMOS 14 DIAS. / NIEGA SINTOMATOLOGÍA RESPIRATORIA. / EVALUADO EN REG, REN. REH Y LOTEP.',
            'ant_personal' => 'NIEGA ANTECEDENTES PERSONALES.',
            'ant_family' => 'NIEGA ANTECEDENTES FAMILIARES. / NIEGA COVID-19.',
            'orofaringe' => 'NO DOLOROSO A LA DEGLUCIÓN',
            'cardiovascular' => 'RUIDOS CARDIACOS RITMICOS, NORMOFONETICOS, AUSENCIA DE SOPLOS.',
            'torax' => 'MURMULLO VESICULAR PASA BIEN EN AMBOS CAMPOS PULMONARES, VIBRACIONES VOCALES CONSERVADAS, AUSENCIA DE RUIDOS AGREGADOS.',
            'printdx' => 'CLINICAMENTE SANO.',
            'observations' => 'MEDIDAS PREVENTIVAS GENERALES (Lavado de manos, distanciamiento físico, higiene respiratorio y uso de mascarilla)',
            'importance' => 1,
            'asymptomatic' => 1,
            'patient_id' => $order->patient_id,
            'order_id' => $order->id,
            'user_id' => auth()->user()->id
        ];

        $medicine = $order->medicine()->create($dataMed);

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
            'age' => 'required',
            'origin' => 'required'
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
            'age.required' => 'La edad es obligatoria.',
            'origin.required' => 'El departamento de origen es requerido.',
        ];

        $this->validate($rules, $messages);

        $patient = Patient::find($this->selected_id);

        $patient->update([
            'dni' => $this->dni,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'birthday' => $this->birthday,
            'age' => $this->age,
            'origin' => $this->origin
        ]);

        if ($this->image)
        {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/patients_huella_firma', $customFileName);
            $imageName = $patient->image;

            $patient->image = $customFileName;
            $patient->save();

            if ($imageName != null)
            {
                if (file_exists('storage/patients_huella_firma/' . $imageName))
                {
                    unlink('storage/patients_huella_firma/' . $imageName);
                }
            }
        }

        $this->resetUI();
        $this->emit('patient-updated', 'Paciente Actualizado');
    }

    public function resetUI()
    {
        $this->dni = '';
        $this->name = '';
        $this->lastname = '';
        $this->birthday = '';
        $this->age = 0;
        $this->origin = 'HUANCAYO';
        $this->selected_id = 0;
        $this->image = '';
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Patient $patient)
    {
        $patient->delete();

        $this->resetUI();
        $this->emit('client-deleted', 'Paciente eliminado');
    }
}
