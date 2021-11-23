<?php

namespace App\Http\Livewire\Covid;
use App\Models\Client;
use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use Livewire\Component;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;

    /*public $selectedDepartment = null, $selectedProvince = null, $selectedDistrict = null;
    public $provinces = null, $districts = null;*/

    public $pageTitle, $componentName, $search, $pageSelected, $selected_id, $ruc, $name, $address;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = "Listado";
        $this->componentName = "Empresas Clientes";
        $this->pageSelected = 5;
    }

    public function render()
    {
        if ($this->search)
            $clients = Client::orderBy('id', 'asc')
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pageSelected);
        else
            $clients = Client::orderBy('id', 'asc')
                ->paginate($this->pageSelected);

        $departments = Department::all();

        return view('livewire.covid.client.clients', compact('clients', 'departments'));
    }

    /* FUNCIONES PARA SELECTS DEPENDIENTES

    public function updatedselectedDepartment($department_id)
    {
        $this->provinces = Province::where('department_id', $department_id)->get();
    }

    public function updatedselectedProvince($province_id)
    {
        $this->districts = District::where('province_id', $province_id)->get();
    }

    FIN DE FUNCIONES PARA SELECTS DEPENDIENTES */

    public function Edit(Client $client)
    {
        $this->ruc = $client->ruc;
        $this->name = $client->name;
        $this->address = $client->address;
        $this->selected_id = $client->id;

        $this->emit('show-modal');
    }

    public function Store()
    {
        $rules = [
            'ruc' => 'required|unique:clients|min:11',
            'name' => 'required|min:3',
            'address' => 'min:3'
        ];

        $messages = [
            'ruc.required' => 'El # de RUC es requerido',
            'ruc.unique' => 'El RUC ya se encuentra registrado.',
            'ruc.min' => 'El RUC debe 11 digitos',
            'name.required' => 'La Razón social es requerida',
            'name.min' => 'La Razón Social debe tener mínimo 3 carácteres',
            'address.min' => 'La dirección debe tener mínimo 3 carácteres'
        ];

        $this->validate($rules, $messages);

        Client::create([
            'ruc' => $this->ruc,
            'name' => $this->name,
            'address' => $this->address
        ]);

        $this->resetUI();
        $this->emit('client-added', 'Cliente registrado');
    }

    public function Update()
    {
        $rules = [
            'ruc' => "required|min:11|unique:clients,ruc,{$this->selected_id}",
            'name' => 'required|min:3',
            'address' => 'min:3'
        ];

        $messages = [
            'ruc.required' => 'El # de RUC es requerido',
            'ruc.unique' => 'El RUC ya se encuentra registrado.',
            'ruc.min' => 'El RUC debe 11 digitos',
            'name.required' => 'La Razón social es requerida',
            'name.min' => 'La Razón Social debe tener mínimo 3 carácteres',
            'address.min' => 'La dirección debe tener mínimo 3 carácteres'
        ];

        $this->validate($rules, $messages);

        $client = Client::find($this->selected_id);
        $client->update([
            'ruc' => $this->ruc,
            'name' => $this->name,
            'address' => $this->address
        ]);

        $this->resetUI();
        $this->emit('client-updated', 'Cliente actualizado');
    }

    public function resetUI()
    {
        $this->ruc = '';
        $this->name = '';
        $this->address = '';
        $this->selected_id = 0;
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Client $client)
    {
        $client->delete();

        $this->resetUI();
        $this->emit('client-deleted', 'Cliente eliminado');
    }
}
