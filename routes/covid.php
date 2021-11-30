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

Route::get('/clients', [ClientController::class, 'index'])->middleware('can:Empresa_index')->name('clientes');
Route::get('/tests', [TestController::class, 'index'])->middleware('can:Prueba_index')->name('pruebas');
Route::get('/positions', [PositionController::class, 'index'])->middleware('can:Puesto_index')->name('puestos');
Route::get('/patients', [PatientController::class, 'index'])->middleware('can:Paciente_index')->name('pacientes');
Route::get('/importar-pacientes', [PatientController::class, 'importar'])->name('importar.pacientes');
Route::post('import-excel-patient', [PatientController::class, 'importExcel'])->name('import.patient');
Route::get('export-excel-patient', [PatientController::class, 'exportResult'])->name('export.patient');
Route::get('/orders', [OrderController::class, 'index'])->middleware('can:Orden_index')->name('ordenes');
Route::get('/medicine', [MedicineController::class, 'index'])->middleware('can:Medicina_index')->name('atenciones.medicina');
Route::get('/laboratory', [LaboratoryController::class, 'index'])->middleware('can:Laboratorio_index')->name('atenciones.laboratorio');
Route::get('/medicine/{medicine}/edit', [MedicineController::class, 'edit'])->middleware('can:Medicina_update')->name('form.medicina');
Route::put('/medicine/{medicine}', [MedicineController::class, 'update'])->middleware('can:Medicina_update')->name('form-act');
Route::get('/auditories', [AuditoriaController::class, 'index'])->middleware('can:Auditoria_index')->name('auditoria');
Route::get('/order/{order}/historia', [AuditoriaController::class, 'covidHistory'])->middleware('can:Auditoria_print')->name('historia');
