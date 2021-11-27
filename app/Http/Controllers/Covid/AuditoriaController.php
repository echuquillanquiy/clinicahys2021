<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    public function index()
    {
        return view('covid.auditories.index');
    }

    public function covidHistory(Order $order)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('covid.auditories.historia', compact('order'));
        return $pdf->stream($order->patient->name . " " . $order->patient->lastname . "_" . $order->created_at->format('Y-m-d').".pdf");
    }
}
