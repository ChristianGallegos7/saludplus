<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor; // Asegúrate de importar el modelo Doctor al principio del archivo

class DoctorController extends Controller
{
    public function index()
    {
        // Obtener y mostrar la lista de doctores
        $doctores = Doctor::all();
        return view('admin.doctores.index', compact('doctores'));
    }

    public function create()
    {
        // Devolver la vista para crear un nuevo doctor
        return view('admin.doctores.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            // Define tus reglas de validación aquí
        ]);

        // Crear un nuevo doctor
        Doctor::create($request->all());

        // Redirigir a la vista de lista de doctores después de crear un doctor
        return redirect()->route('admin.doctores.index')->with('success', 'Doctor creado correctamente.');
    }

    public function show($id)
    {
        // Obtener y mostrar detalles de un doctor específico
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.show', compact('doctor'));
    }

    public function edit($id)
    {
        // Obtener y devolver la vista para editar un doctor específico
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario de edición
        $request->validate([
            // Define tus reglas de validación aquí
        ]);

        // Actualizar el doctor específico
        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());

        // Redirigir a la vista de lista de doctores después de la actualización
        return redirect()->route('admin.doctores.index')->with('success', 'Doctor actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Eliminar el doctor específico
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        // Redirigir a la vista de lista de doctores después de la eliminación
        return redirect()->route('admin.doctores.index')->with('success', 'Doctor eliminado correctamente.');
    }
}
