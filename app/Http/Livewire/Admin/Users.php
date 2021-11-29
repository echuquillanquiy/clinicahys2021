<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $search, $pageSelected, $selected_id, $name, $email, $status, $password, $role;

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
        $users = User::paginate(10);
        return view('livewire.admin.user.users', compact('users'));
    }
}
