<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        return view('covid.medicines.index');
    }

    public function edit(Medicine $medicine)
    {
        return view('covid.medicines.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $rules = [
            'temperature' => 'required|min:2',
            'fc' => 'required|min:2',
            'spo2' => 'required|min:2'
        ];

        $messages = [
            'temperature.required' => 'La temperatura es requerida.',
            'temperature.min' => 'la temperatura debe tener 2 digítos.',
            'fc.required' => 'La frecuencia es requerida.',
            'fc.min' => 'la frecuencia debe tener 2 digítos.',
            'spo2.required' => 'La saturación es requerida.',
            'spo2.min' => 'la saturación debe tener 2 digítos.'
        ];

        $request->validate($rules, $messages);

        $data = $request->all();

        $medicine->fill($data);
        $medicine->save();

        $notification = 'Se actualizo correctamente.';
        return back()->with(compact('notification'));
    }
}
