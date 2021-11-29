<?php

namespace App\Http\Livewire\Admin;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use DB;

use Livewire\Component;

class Asginar extends Component
{
    use WithPagination;

    public $role, $componentName, $permisosSelected = [], $old_permissions = [], $pageSelected;

    public function mount()
    {
        $this->role = 'Elegir';
        $this->componentName = 'Asignar Permisos';
        $this->pageSelected = 25;
    }

    public function render()
    {
        $permisos = Permission::select('name', 'id', DB::raw("0 as checked"))
            ->orderBy('name', 'asc')
            ->paginate($this->pageSelected);

        if ($this->role != 'Elegir')
        {
            $list = Permission::join('role_has_permissions as rp', 'rp.permission_id', 'permissions.id')
                ->where('role_id', $this->role)->pluck('permissions.id')->toArray();

            $this->old_permissions = $list;
        }

        if ($this->role != 'Elegir')
        {
            foreach ($permisos as $permiso){
                $role = Role::find($this->role);
                $tienePermiso = $role->hasPermissionTo($permiso->name);
                if ($tienePermiso){
                    $permiso->checked = 1;
                }
            }
        }
        $roles = Role::orderBy('name', 'asc')->get();

        return view('livewire.admin.asignar.asginar', compact('roles', 'permisos'));
    }

    public $listeners = ['revokeall' => 'RemoveAll'];

    public function RemoveAll()
    {
        if ($this->role == 'Elegir')
        {
            $this->emit('sync-error', 'Seleccione un role  válido');
            return;
        }

        $role = Role::find($this->role);
        $role->syncPermissions([0]);
        $this->emit('removeall', "Se revocaron todos los permisos al role $role->name");
    }

    public function SyncAll()
    {
        if ($this->role == 'Elegir')
        {
            $this->emit('sync-error', 'Seleccione un role  válido');
            return;
        }
        $role = Role::find($this->role);
        $permisos = Permission::pluck('id')->toArray();
        $role->syncPermissions($permisos);
        $this->emit('syncall', "Se sincronizaron todos los permisos al role $role->name");
    }

    public function syncPermiso($state, $permisoName)
    {
        if ($this->role != 'Elegir')
        {
            $roleName = Role::find($this->role);

            if ($state)
            {
                $roleName->givePermissionTo($permisoName);
                $this->emit('permi', "Permiso asignado correctamente");
            } else {
                $roleName->revokePermissionTo($permisoName);
                $this->emit('permi', "Permiso eliminado correctamente");
            }
        } else {
            $this->emit('sync-error', "Elige un rol válido");
        }
    }
}
