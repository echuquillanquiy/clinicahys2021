<?php

use App\Http\Controllers\Covid\HomeController;
use App\Http\Controllers\Covid\ClientController;
use App\Http\Controllers\Covid\TestController;
use App\Http\Controllers\Covid\PositionController;
use App\Http\Controllers\Covid\PatientController;
use Illuminate\Support\Facades\Route;


Route::get('', [HomeController::class, 'index'])->name('covid.index');

Route::get('/clients', [ClientController::class, 'index'])->name('clientes');
Route::get('/tests', [TestController::class, 'index'])->name('pruebas');
Route::get('/positions', [PositionController::class, 'index'])->name('puestos');
Route::get('/pacientes', [PatientController::class, 'index'])->name('pacientes');
