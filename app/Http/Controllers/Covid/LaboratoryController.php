<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    public function index()
    {
        return view('covid.laboratories.index');
    }
}
