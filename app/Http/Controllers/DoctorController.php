<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctores = Doctor::all();
        return view('admin.doctores.index', compact('doctores'));
    }

    public function create()
    {
        return view('admin.doctores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Define tus reglas de validación aquí
        ]);

        Doctor::create($request->all());

        return redirect()->route('admin.doctores.index')->with('success', 'Doctor creado correctamente.');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.edit', compact('doctor')); // Cambio aquí
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Define tus reglas de validación aquí
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());

        return redirect()->route('admin.doctors')->with('success', 'Doctor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctors')->with('success', 'Doctor eliminado correctamente.');
    }
}
