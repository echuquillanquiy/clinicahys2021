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
        $placeuser = auth()->user()->place;

        if ($placeuser == "HUANCAYO") {
            $orders = Order::join('patients as pat', 'pat.id', 'orders.patient_id')
                ->select('orders.*', 'pat.origin as procedencia', 'pat.lastname as apellidos', 'orders.created_at as fecha')
                ->where('pat.origin', 'LIKE', 'HUANCAYO')
                ->whereDate('orders.created_at', 'LIKE', $this->dateFilter)
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pageSelected);
        } elseif ($placeuser == "HUANCAVELICA") {
            $orders = Order::join('patients as pat', 'pat.id', 'orders.patient_id')
                ->select('orders.*', 'pat.origin as procedencia', 'orders.created_at as fecha')
                ->whereDate('orders.created_at', 'LIKE', $this->dateFilter)
                ->where('pat.origin', 'LIKE', 'HUANCAVELICA')
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pageSelected);
        } elseif ($placeuser == "LIMA") {
            $orders = Order::join('patients as pat', 'pat.id', 'orders.patient_id')
                ->select('orders.*', 'pat.origin as procedencia', 'orders.created_at as fecha')
                ->whereDate('orders.created_at', 'LIKE', $this->dateFilter)
                ->where('pat.origin', 'LIKE', 'LIMA')
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pageSelected);
        } elseif ($placeuser == "PASCO") {
            $orders = Order::join('patients as pat', 'pat.id', 'orders.patient_id')
                ->select('orders.*', 'pat.origin as procedencia', 'orders.created_at as fecha')
                ->whereDate('orders.created_at', 'LIKE', $this->dateFilter)
                ->where('pat.origin', 'LIKE', 'PASCO')
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pageSelected);
        }else {
            $orders = Order::join('patients as pat', 'pat.id', 'orders.patient_id')
                ->select('orders.*', 'pat.origin as procedencia', 'orders.created_at as fecha')
                ->whereDate('orders.created_at', 'LIKE', $this->dateFilter)
                ->where('pat.lastname', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pageSelected);
        }

        return view('livewire.covid.auditory.auditories', compact('orders'));
    }
}
