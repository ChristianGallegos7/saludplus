<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialty;

class DoctorController extends Controller
{
    public function doctor()
    {
        return view('doctor.dashboard');

    }
    public function index()
    {
        $doctores = Doctor::all();
        return view('admin.doctores.index', compact('doctores'));
    }

    public function create()
    {
        $especialidades = Specialty::all();
        return view('admin.doctores.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'specialty_id' => 'required|exists:specialties,id',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|unique:doctors,correo', // 'correo' es el nombre correcto de la columna
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'specialty_id.required' => 'La especialidad es obligatoria.',
            'specialty_id.exists' => 'La especialidad seleccionada no es válida.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'correo.unique' => 'El correo electrónico ya ha sido registrado.',
        ]);
    
        Doctor::create($request->all());
    
        return redirect()->route('admin.doctors')->with('success', 'Doctor creado correctamente.');
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'specialty_id' => 'required|exists:specialties,id',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|unique:doctors,correo,' . $id, // Corregir 'email' a 'correo'
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());

        return redirect()->route('admin.doctors')->with('success', 'Doctor actualizado correctamente.');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $especialidades = Specialty::all();
        return view('admin.doctores.edit', compact('doctor', 'especialidades'));
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctors')->with('success', 'Doctor eliminado correctamente.');
    }
}
