<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
use App\Models\Patient;
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
}
