<?php

namespace App\Http\Livewire\Covid;
use App\Models\Position;
use Livewire\WithPagination;

use Livewire\Component;

class Positions extends Component
{
    use WithPagination;

    public $search, $pageTitle, $componentName, $name, $pageSelected, $selected_id;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->pageTitle = "Listado";
        $this->componentName = "Puestos";
        $this->pageSelected = 5;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search)
            $positions = Position::orderBy('id', 'asc')
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pageSelected);
        else
            $positions = Position::orderBy('id', 'asc')
                ->paginate($this->pageSelected);

        return view('livewire.covid.position.positions', compact('positions'));
    }

    public function Edit(Position $position)
    {
        $this->name = $position->name;
        $this->selected_id = $position->id;
        $this->emit('show-modal', 'Show Modal!');
    }

    public function Store()
    {
        $rules = [
            'name' => 'required|min:3|unique:positions'
        ];

        $messages = [
            'name.required' => 'El nombre del puesto es requerido.',
            'name.min' => 'El nombre de tener mínimo 3 carácteres.',
            'name.unique' => 'El puesto ya esta registrado.'
        ];

        $this->validate($rules, $messages);

        Position::create([
            'name' => $this->name
        ]);

        $this->resetUI();
        $this->emit('position-added', 'Puesto Agregado');
    }

    public function Update()
    {
        $rules = [
            'name' => "required|min:3|unique:positions,name,{$this->selected_id}"
        ];

        $messages = [
            'name.required' => 'El nombre del puesto es requerido.',
            'name.min' => 'El nombre de tener mínimo 3 carácteres.',
            'name.unique' => 'El puesto ya esta registrado.'
        ];

        $this->validate($rules, $messages);

        $position = Position::find($this->selected_id);
        $position->update([
            'name' => $this->name
        ]);

        $this->resetUI();
        $this->emit('position-updated', 'Puesto Agregado');
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Position $position)
    {
        $position->delete();

        $this->resetUI();
        $this->emit('position-deleted', 'Puesto eliminado');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->selected_id = 0;
    }

}
