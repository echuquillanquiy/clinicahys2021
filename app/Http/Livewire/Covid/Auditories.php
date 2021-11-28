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
        if ($this->search)
            $orders = Order::join('patients as pat', 'pat.id', 'orders.patient_id')
                ->select('orders.*', 'pat.lastname as apellidos', 'pat.name as nombres')
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('pat.name', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pageSelected);
        else
            $orders = Order::orderBy('id', 'asc')
                ->where('created_at', 'LIKE', '%' . $this->dateFilter . '%')
                ->paginate($this->pageSelected);

        return view('livewire.covid.auditory.auditories', compact('orders'));
    }
}
