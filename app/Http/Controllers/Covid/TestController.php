<?php

namespace App\Http\Controllers\Covid;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('covid.tests.index');
    }
}
