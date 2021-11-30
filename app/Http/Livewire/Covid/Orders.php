<?php

namespace App\Http\Livewire\Covid;
use App\Models\Client;
use App\Models\Order;
use App\Models\Patient;
use App\Models\Position;
use App\Models\Test;
use Carbon\Carbon;
use Livewire\WithPagination;

use Livewire\Component;

class Orders extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $search, $pageSelected, $selected_id,$userId, $patientId, $positionId, $clientId, $subclientId, $testId, $dni = null, $name = null, $lastname = null, $dateFilter;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Ordenes Covid';
        $this->pageSelected = 25;
        $this->dateFilter = Carbon::now()->format('Y-m-d');
        $this->testId = 1;
        $this->clientId = 1;
        $this->positionId = 1;
    }

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $clients = Client::all('id', 'name');
        $positions = Position::all('id', 'name');
        $tests = Test::where('status', 'VIGENTE')->get();

        if ($this->search)
            $orders = Order::join('patients as pat', 'pat.id', 'orders.patient_id')
                ->select('orders.*', 'pat.lastname as apellidos', 'pat.name as nombres')
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('pat.name', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pageSelected);
        else
            $orders = Order::orderBy('id', 'asc')
                ->where('created_at', 'LIKE', '%' . $this->dateFilter . '%')
                ->paginate($this->pageSelected);

        return view('livewire.covid.order.orders', compact('orders', 'clients', 'positions', 'tests'));
    }

    public function consultDni()
    {
        $patient = Patient::where('dni', 'LIKE', '%' . $this->dni . '%')->first();

        if ($patient)
        {
            $this->patientId = $patient->id;
            $this->name = $patient->name;
            $this->lastname = $patient->lastname;
        }else{
            return "no hay datos coincidentes";
        }

    }

    public function editDni()
    {
        $patient = Patient::where('dni', $this->dni)->first();

        $this->name = $patient->name;
        $this->lastname = $patient->lastname;
    }

    public function Edit(Order $order)
    {
        $this->patientId = $order->patient_id;
        $this->dni = $order->patient->dni;
        $this->clientId = $order->client_id;
        $this->positionId = $order->position_id;
        $this->subclientId = $order->subclient_id;
        $this->testId = $order->test_id;
        $this->selected_id = $order->id;

        $this->emit('show-modal', 'Show Modal!');
    }

    public function Store()
    {
        $rules = [
            'patientId' => 'required',
            'positionId' => 'required',
            'clientId' => 'required',
            'testId' => 'required',
        ];

        $messages = [
            'patientId.required' => 'Por favor escriba un número Dni.',
            'positionId.required' => 'El campo es requerido.',
            'clientId.required' => 'El campo es requerido.',
            'testId.required' => 'El campo es requerido.',
        ];

        $this->validate($rules, $messages);

        $existsOrdersToday = Order::where('patient_id', $this->patientId)
            ->whereDate('created_at', date('Y-m-d'))->exists();

        if ($existsOrdersToday)
        {
            $this->emit('order-exists', 'El paciente ya tiene una orden generada.');
            $this->resetUI();
            return;
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'patient_id' => $this->patientId,
            'client_id' => $this->clientId,
            'position_id' => $this->positionId,
            'subclient_id' => $this->subclientId,
            'test_id' => $this->testId
        ]);

        $dataLab = [
            'patient_id' => $order->patient_id,
            'order_id' => $order->id,
            'user_id' => $order->user_id
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
            'observations' => 'MEDIDAS PREVENTIVAS GENERALES (Lavado de manos, ditanciamiento físico, higiene respiratorio y uso de mascarilla)',
            'importance' => 1,
            'asymptomatic' => 1,
            'patient_id' => $order->patient_id,
            'order_id' => $order->id,
            'user_id' => $order->user_id
        ];

        $medicine = $order->medicine()->create($dataMed);

        $this->resetUI();
        $this->emit('order-added', 'Orden Registrada');
    }

    public function Update()
    {
        $rules = [
            'patientId' => 'required',
            'positionId' => 'required|not_in:Elegir',
            'clientId' => 'required|not_in:Elegir',
            'subclientId' => 'required|not_in:Elegir',
            'testId' => 'required|not_in:Elegir',
        ];

        $messages = [
            'patientId.required' => 'Por favor escriba un número Dni.',
            'positionId.required' => 'El campo es requerido.',
            'positionId.not_in' => 'Elige una una opción diferente a Elegir.',
            'clientId.required' => 'El campo es requerido.',
            'clientId.not_in' => 'Elige una una opción diferente a Elegir.',
            'subclientId.required' => 'El campo es requerido.',
            'subclientId.not_in' => 'Elige una una opción diferente a Elegir.',
            'testId.required' => 'El campo es requerido.',
            'testId.not_in' => 'Elige una una opción diferente a Elegir.',
        ];

        $this->validate($rules, $messages);

        $order = Order::find($this->selected_id);

        $order->update([
            'user_id' => auth()->user()->id,
            'patient_id' => $this->patientId,
            'client_id' => $this->clientId,
            'position_id' => $this->positionId,
            'subclient_id' => $this->subclientId,
            'test_id' => $this->testId
        ]);

        $data = [
            'order_id' => $order->id,
            'user_id' => $order->user_id
        ];

        $medicine = $order->medicine()->update($data);
        $laboratory = $order->laboratory()->update($data);

        $this->resetUI();
        $this->emit('order-updated', 'Orden Actualizada');
    }

    public function resetUI()
    {
        $this->userId = null;
        $this->patientId = null;
        $this->dni = '';
        $this->name = '';
        $this->lastname = '';
        $this->clientId = null;
        $this->positionId = null;
        $this->subclientId = null;
        $this->testId = null;
        $this->selected_id = null;
        $this->search = '';
        $this->resetValidation();
    }

    protected $listeners = [
        'deleteRow' => 'Destroy'
    ];

    public function Destroy(Order $order)
    {
        $order->medicine()->delete();
        $order->laboratory()->delete();
        $order->delete();
    }
}
