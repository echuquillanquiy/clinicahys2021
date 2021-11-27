<?php

namespace App\Http\Livewire\Covid;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Auditories extends Component
{
    use WithPagination;

    public $search, $selected_id, $pageTitle, $componentName, $pageSelected, $dateFilter;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->componentName = 'Auditoria';
        $this->pageTitle = 'Listado de Atenciones';
        $this->dateFilter = Carbon::now()->format('Y-m-d');
        $this->pageSelected = 25;
    }

    public function render()
    {
        $orders = Order::orderBy('id', 'desc')
            ->where('created_at', 'LIKE', '%' . $this->dateFilter . '%')
            ->paginate($this->pageSelected);

        return view('livewire.covid.auditory.auditories', compact('orders'));
    }
}
