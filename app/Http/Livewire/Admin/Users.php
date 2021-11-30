<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class Users extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $search, $pageSelected, $selected_id, $name, $email, $status, $password, $profile;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->page = 'Listado';
        $this->componentName = 'Usuarios';
        $this->pageSelected = 10;
        $this->status = 'Elegir';
    }

    public function render()
    {
        if ($this->search)
            $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                ->select('*')->orderBy('name', 'asc')->paginate($this->pageSelected);
        else
            $users = User::select('*')->orderBy('name', 'asc')->paginate($this->pageSelected);

        $roles = Role::orderBy('name', 'asc')->get();

        return view('livewire.admin.user.users', compact('users', 'roles'));
    }

    public function resetUI()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->search = '';
        $this->status = 'Elegir';
        $this->selected_id = 0;
        $this->resetValidation();
    }

    public function Edit(User $user)
    {
        $this->selected_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->profile = $user->profile;
        $this->status = $user->status;
        $this->password = '';

        $this->emit('show-modal', 'Show Modal!');
    }

    protected $listeners = [
        'deleteRow' => 'Destroy',
        'resetUI' => 'resetUI'
    ];

    public function Store()
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'status' => 'required|not_in:Elegir',
            'profile' => 'required|not_in:Elegir',
            'password' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'Ingresa el nombre.',
            'name.min' => 'El nombre del usuario debe tener al menos 3 caracteres.',
            'email.required' => 'Ingrese el válido.',
            'email.email' => 'Ingrese un correo válido.',
            'email.unique' => 'El correo ya existe en el sistema.',
            'status.required' => 'Selecciona el estado para el usuario.',
            'profile.required' => 'Seleccione el perfil /role del usuario.',
            'password.required' => 'Ingresa una contraseña.',
            'password.min' => 'el password debe tener minimo 3 caracteres.',
            'status.not_in' => 'Selecciona un estado distinto a Elegir.',
            'profile.not_in' => 'Selecciona un perfil/role distinto a Elegir.',
        ];

        $this->validate($rules, $messages);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'profile' => $this->profile,
            'password' => bcrypt($this->password)
        ]);

        $user->syncRoles($this->profile);

        $this->resetUI();
        $this->emit('user-added', 'Usuario Registrado');
    }

    public function Update()
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => "required|email|unique:users,email,{$this->selected_id}",
            'status' => 'required|not_in:Elegir',
            'profile' => 'required|not_in:Elegir',
            'password' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'Ingresa el nombre.',
            'name.min' => 'El nombre del usuario debe tener al menos 3 caracteres.',
            'email.required' => 'Ingrese el válido.',
            'email.email' => 'Ingrese un correo válido.',
            'email.unique' => 'El correo ya existe en el sistema.',
            'status.required' => 'Selecciona el estado para el usuario.',
            'profile.required' => 'Seleccione el perfil /role del usuario.',
            'password.required' => 'Ingresa una contraseña.',
            'password.min' => 'el password debe tener minimo 3 caracteres.',
            'status.not_in' => 'Selecciona un estado distinto a Elegir.',
            'profile.not_in' => 'Selecciona un perfil/role distinto a Elegir.',
        ];

        $this->validate($rules, $messages);

        $user = User::find($this->selected_id);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'profile' => $this->profile,
            'password' => bcrypt($this->password)
        ]);

        $user->syncRoles($this->profile);

        $this->resetUI();
        $this->emit('user-updated', 'Usuario Actualizado');
    }

    public function Destroy(User $user)
    {
        if ($user) {
            $orders = Order::where('user_id', $user->id)->count();
            if ($orders > 0) {
                $this->emit('user-withorders', 'No es posible eliminar el usuario por que tiene ordenes registradas');
            }else {
                $user->delete();
                $this->resetUI();
                $this->emit('user-deleted', 'Usuarios Eliminado!.');
            }
        }
    }
}
