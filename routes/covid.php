<?php

use App\Http\Controllers\Covid\HomeController;
use App\Http\Controllers\Covid\ClientController;
use App\Http\Controllers\Covid\TestController;
use App\Http\Controllers\Covid\PositionController;
use App\Http\Controllers\Covid\PatientController;
use App\Http\Controllers\Covid\OrderController;
use App\Http\Controllers\Covid\MedicineController;
use App\Http\Controllers\Covid\LaboratoryController;
use App\Http\Controllers\Covid\AuditoriaController;
use Illuminate\Support\Facades\Route;


Route::get('', [HomeController::class, 'index'])->name('covid.index');

Route::get('/clients', [ClientController::class, 'index'])->name('clientes');
Route::get('/tests', [TestController::class, 'index'])->name('pruebas');
Route::get('/positions', [PositionController::class, 'index'])->name('puestos');
Route::get('/patients', [PatientController::class, 'index'])->name('pacientes');
Route::get('/orders', [OrderController::class, 'index'])->name('ordenes');
Route::get('/medicine', [MedicineController::class, 'index'])->name('atenciones.medicina');
Route::get('/laboratory', [LaboratoryController::class, 'index'])->name('atenciones.laboratorio');
Route::get('/medicine/{medicine}/edit', [MedicineController::class, 'edit'])->name('form.medicina');
Route::put('/medicine/{medicine}', [MedicineController::class, 'update'])->name('form-act');
Route::get('/auditories', [AuditoriaController::class, 'index'])->name('auditoria');
Route::get('/order/{order}/historia', [AuditoriaController::class, 'covidHistory'])->name('historia');
