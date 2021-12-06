<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Patient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $patients = Patient::whereDate('created_at', now())->count();
        $orders = Order::whereDate('created_at', now())->count();
        return view('covid.index', compact('patients', 'orders'));
    }
}
