<?php

namespace App\Http\Livewire\Admin;
use Livewire\WithPagination;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permisos extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $search, $pageSelected, $selected_id, $permissionName;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Permisos';
        $this->pageSelected = 15;
    }

    public function render()
    {
        if ($this->search)
            $permisos = Permission::where('name', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pageSelected);
        else
            $permisos = Permission::orderBY('name', 'asc')
                ->paginate($this->pageSelected);

        return view('livewire.admin.permisos.permisos', compact('permisos'));
    }

    public function Store()
    {
        $rules = [
            'permissionName' => 'required|min:2|unique:permissions,name'
        ];

        $messages = [
            'permissionName.required' => 'El nombre del permiso es requerido.',
            'permissionName.unique' => 'El permiso ya existe.',
            'permissionName.min' => 'El permiso debe tener al menos 2 carácteres.'
        ];

        $this->validate($rules, $messages);

        Permission::create(['name' => $this->permissionName]);

        $this->emit('permisos-added', 'Se registró con existo');
        $this->resetUI();
    }

    public function Edit(Permission $permisos)
    {
        $this->selected_id = $permisos->id;
        $this->permisosName = $permisos->name;

        $this->emit('show-modal', 'Show Modal!');
    }

    public function Update()
    {
        $rules = [
            'permissionName' => "required|min:2|unique:permissions,name,{$this->selected_id}"
        ];

        $messages = [
            'permissionName.required' => 'El nombre del permiso es requerido.',
            'permissionName.unique' => 'el permiso ya existe.',
            'permissionName.min' => 'el permiso debe tener al menos 2 carácteres.'
        ];

        $this->validate($rules, $messages);

        $permiso= Permission::find($this->selected_id);

        $permiso->update([
            'name'=> $this->permissionName
        ]);

        $this->emit('permisos-updated', 'Se actualizó el permisos con éxito.');
        $this->resetUI();
    }

    protected $listeners = ['destroy' => 'Destroy'];

    public function Destroy(Permission $permission)
    {
        $rolesCount = $permission->getRoleNames()->count();
        if ($rolesCount > 0)
        {
            $this->emit('permisos-error', 'No se puede eliminar el permiso porque tiene roles asociados.');
        }
        $permission->delete();
        $this->emit('permisos-deleted', 'Se eliminó el permiso con éxito.');
    }

    public function resetUI()
    {
        $this->permissionName = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->resetValidation();
    }
}
