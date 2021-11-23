<?php

namespace App\Http\Livewire\Covid;
use App\Models\Test;
use Livewire\WithPagination;

use Livewire\Component;

class Tests extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $lot, $brand, $status, $selected_id, $search, $pageSelected;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = "Listado";
        $this->componentName = "Pruebas Covid";
        $this->pageSelected = 10;
        $this->status = "Elegir";
    }

    public function render()
    {
        if ($this->search)
            $tests = Test::orderBy('id', 'desc')
                ->where('lot', 'LIKE', '%' . $this->search . '%')
                ->orWhere('brand', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pageSelected);
        else
            $tests = Test::orderBy('id', 'desc')
                ->paginate($this->pageSelected);

        return view('livewire.covid.test.tests', compact('tests'));
    }

    public function Edit(Test $test)
    {
        $this->lot = $test->lot;
        $this->brand = $test->brand;
        $this->status = $test->status;
        $this->selected_id = $test->id;

        $this->emit('show-modal', 'show modal');
    }

    public function Store()
    {
        $rules = [
            'lot' => 'required|min:3|unique:tests',
            'brand' => 'required|min:3',
            'status' => 'not_in:Elegir'
        ];

        $messages = [
            'lot.required' => 'El # de LOTE es requerido.',
            'lot.min' => 'El LOTE debe tener minímo 3 digítos.',
            'lot.unique' => 'El # de LOTE debe ser único.',
            'brand.required' => 'La marca es requerida.',
            'brand.min' => 'La marca debe tener minímo 3 carácteres.',
            'status.not_in' => 'Seleccione una opción diferente a Elegir'
        ];

        $this->validate($rules, $messages);

        Test::create([
            'lot' => $this->lot,
            'brand' => $this->brand,
            'status' => $this->status
        ]);

        $this->resetUI();
        $this->emit('test-added', 'Prueba covid agregada');
    }

    public function Update()
    {
        $rules = [
            'lot' => "required|min:3|unique:tests,lot,{$this->selected_id}",
            'brand' => 'required|min:3',
            'status' => 'not_in:Elegir'
        ];

        $messages = [
            'lot.required' => 'El # de LOTE es requerido.',
            'lot.min' => 'El LOTE debe tener minímo 3 digítos.',
            'lot.unique' => 'El # de LOTE debe ser único.',
            'brand.required' => 'La marca es requerida.',
            'brand.min' => 'La marca debe tener minímo 3 carácteres.',
            'status.not_in' => 'Seleccione una opción diferente a Elegir'
        ];

        $this->validate($rules, $messages);

        $test = Test::find($this->selected_id);
        $test->update([
            'lot' => $this->lot,
            'brand' => $this->brand,
            'status' => $this->status
        ]);

        $this->resetUI();
        $this->emit('test-updated', 'Prueba covid actualizada');
    }

    public function resetUI()
    {
        $this->lot = '';
        $this->brand = '';
        $this->status = '';
        $this->selected_id = 0;
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Test $test)
    {
        $test->delete();

        $this->resetUI();
        $this->emit('test-deleted', 'Prueba Covid eliminada');
    }
}
