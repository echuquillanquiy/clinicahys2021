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

    public $selectedDepartment = null, $selectedProvince = null, $selectedDistrict = null;
    public $provinces = null, $districts = null;

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

        return view('livewire.covid.clients', compact('clients', 'departments'));
    }

    /* FUNCIONES PARA SELECTS DEPENDIENTES */

    public function updatedselectedDepartment($department_id)
    {
        $this->provinces = Province::where('department_id', $department_id)->get();
    }

    public function updatedselectedProvince($province_id)
    {
        $this->districts = District::where('province_id', $province_id)->get();
    }

    /* FIN DE FUNCIONES PARA SELECTS DEPENDIENTES */

    public function resetUI()
    {

    }
}
