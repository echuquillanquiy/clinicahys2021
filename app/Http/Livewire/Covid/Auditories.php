<?php

namespace App\Http\Livewire\Covid;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Auditories extends Component
{
    use WithPagination;

    public $search, $selected_id, $pageTitle, $componentName, $pageSelected;

    public function mount()
    {
        $this->componentName = 'Auditoria';
        $this->pageTitle = 'Listado de Atenciones';
        $this->pageSelected = 25;
    }

    public function render()
    {
        $orders = Order::orderBy('id', 'desc')
            ->paginate($this->pageSelected);

        return view('livewire.covid.auditory.auditories', compact('orders'));
    }
}
