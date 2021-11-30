<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class PatientController extends Controller
{
    public function index()
    {
        return view('covid.patients.index');
    }

    public function importar()
    {
        return view('covid.patients.importarPac');
    }

    public function importExcel(Request $request)
    {
        $rules = [
            'file' => 'required|in:xlsx,xls'
        ];

        $messages = [
            'file.required' => 'Seleccione un archivo excel',
            'file.in' => 'Solo puede seleccionar archivos excel'
        ];

        $request->validate($rules, $messages);

        $file = $request->file('file');
        $patients = (new FastExcel)->import($file, function ($line) {
            return Patient::create([
                'dni' => $line['DNI'],
                'name' => $line['Nombres'],
                'lastname' => $line['Apellidos'],
                'birthday' => $line['Fecha de Nacimiento'],
                'age' => $line['Edad'],
                'origin' => $line['Procedencia']
            ]);
        });

        return view('covid.patients.index');
    }

    public function exportResult()
    {
        return (new FastExcel(Medicine::all()))->download('medicine.xlsx', function ($medicine) {
            return [
                'Fecha de atención' => $medicine->created_at->format('Y-m-d'),
                'Empresa' => $medicine->order->client->name,
                'DNI' => $medicine->patient->dni,
                'Nombres' => $medicine->patient->name,
                'Apellidos' => $medicine->patient->lastname,
                'Edad' => $medicine->patient->age,
                'Puesto' => $medicine->order->position->name,
                'LUGAR DE EVALUACION' => 'H&S OCCUPATIONAL SAC',
                'Procedencia' => $medicine->patient->origin,
                'Resultado Laboratorio' => $medicine->order->laboratory->result,
                'APTO PARA SUBIR A TRANSPORTE' => $medicine->result,
            ];
        });
    }
}
