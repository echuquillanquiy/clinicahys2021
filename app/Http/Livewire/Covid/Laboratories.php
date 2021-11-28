<?php

namespace App\Http\Livewire\Covid;
use App\Models\Laboratory;
use Carbon\Carbon;
use Livewire\WithPagination;

use Livewire\Component;

class Laboratories extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $search, $selected_id, $pageSelected, $type, $result, $orderId, $userId, $userName, $dateFilter;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = 'Listado Resultado';
        $this->componentName = 'Laboratorio Covid-19';
        $this->dateFilter = Carbon::now()->format('Y-m-d');
        $this->pageSelected = 1;
    }

    public function render()
    {
        if ($this->search)
            $laboratories = Laboratory::join('patients as pat', 'pat.id', 'laboratories.patient_id')
                ->select('laboratories.*', 'pat.lastname as apellidos', 'pat.name as nombres')
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('pat.name', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pageSelected);
        else
            $laboratories = Laboratory::orderBy('id', 'desc')
                ->where('created_at', 'LIKE', '%' . $this->dateFilter . '%')
                ->paginate($this->pageSelected);

        return view('livewire.covid.laboratory.laboratories', compact('laboratories'));
    }

    public function Edit(Laboratory $laboratory)
    {
        $this->type = $laboratory->type;
        $this->result = $laboratory->result;
        $this->orderId = $laboratory->order_id;
        $this->userId = $laboratory->user_id;
        $this->userName = $laboratory->order->user->name;
        $this->selected_id = $laboratory->id;
    }

    public function Update()
    {
        $rules = [
            'type' => 'required|not_in:Elegir',
            'result' => 'required|not_in:Elegir'
        ];

        $messages = [
            'type.required' => 'El tipo de prueba es requerido.',
            'type.not_in' => 'Seleccione una opción diferente a Elegir.',
            'result.required' => 'El resultado de prueba es requerido.',
            'result.not_in' => 'Seleccione una opción diferente a Elegir.'
        ];

        $this->validate($rules, $messages);

        $laboratory = Laboratory::find($this->selected_id);

        $laboratory->update([
            'type' => $this->type,
            'result' => $this->result,
            'user_id' => auth()->user()->id
        ]);

        $this->resetUI();
        $this->emit('laboratory-updated', 'Resultados Actualizados');
    }

    public function resetUI()
    {
        $this->search = '';
        $this->selected_id = null;
        $this->type = null;
        $this->result = null;
        $this->userName = null;
        $this->orderId = null;
        $this->userId = null;
        $this->resetValidation();
    }
}
