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
        $data = $request->all();

        $medicine->fill($data);
        $medicine->save();

        $notification = 'Se actualizo correctamente.';
        return back()->with(compact('notification'));
    }
}
