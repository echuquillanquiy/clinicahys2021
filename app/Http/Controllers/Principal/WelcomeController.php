<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Quotation;
use App\Models\Service;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $places = Place::all();
        $services = Service::all();

        return view('welcome', compact('places', 'services'));
    }

    public function StoreQuotation(Request $request)
    {
        $rules = [
            'ruc' => 'required|unique:quotations|min:3',
            'name' => 'required|min:3',
            'email' => 'required|unique:quotations',
            'phone' => 'required|min:3',
            'contact' => 'required|min:5',
            'position' => 'required|min:5',
            'workers' => 'required',
            'positions' => 'required|min:3',
        ];

        $messages = [
            'ruc.required' => 'El ruc es obligatorio.',
            'name.required' => 'La razón social es obligatoria.',
            'email.required' => 'El correo es obligatorio.',
            'phone.required' => 'El teléfono es obligatorio.',
            'contact.required' => 'El nombre de contacto es obligatorio.',
            'position.required' => 'El cargo es obligatorio.',
            'workers.required' => 'El N° de trabajadores es obligatorio.',
            'positions.required' => 'Los puestos son requeridos.',
        ];

        $this->validate($request, $rules, $messages);

        Quotation::create([
            'ruc' => $request->ruc,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'contact' => $request->contact,
            'position' => $request->position,
            'workers' => $request->workers,
            'positions' => $request->positions,
        ]);


        return back()->with('notification', 'Se envio correctamente su solicitud.');
    }
}
