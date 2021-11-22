<?php

use App\Http\Controllers\Covid\HomeController;
use App\Http\Controllers\Covid\ClientController;
use Illuminate\Support\Facades\Route;


Route::get('', [HomeController::class, 'index'])->name('covid.index');

Route::get('/clients', [ClientController::class, 'index'])->name('clientes');
