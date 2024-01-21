<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener y mostrar la lista de doctores
        // ...

        // Devolver la vista de lista de doctores
        return view('admin.doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Devolver la vista para crear un nuevo doctor
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            // Puedes agregar reglas de validación según tus necesidades
        ]);

        // Crear un nuevo doctor
        // ...

        // Redirigir a la vista de lista de doctores después de crear un doctor
        return redirect()->route('admin.doctors');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener y mostrar detalles de un doctor específico
        // ...

        // Devolver la vista de detalles de doctor
        return view('admin.doctors.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener y devolver la vista para editar un doctor específico
        // ...

        // Devolver la vista de edición de doctor
        return view('admin.doctors.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario de edición
        $request->validate([
            // Puedes agregar reglas de validación según tus necesidades
        ]);

        // Actualizar el doctor específico
        // ...

        // Redirigir a la vista de lista de doctores después de la actualización
        return redirect()->route('admin.doctors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar el doctor específico
        // ...

        // Redirigir a la vista de lista de doctores después de la eliminación
        return redirect()->route('admin.doctors');
    }
}
