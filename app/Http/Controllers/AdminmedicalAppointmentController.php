<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalAppointment;

class AdminMedicalAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las citas médicas
        $citas = MedicalAppointment::all();

        // Devolver la vista con las citas médicas
        return view('admin.citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Devolver la vista para crear una nueva cita médica
        return view('admin.citas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd("guardando cita");
        // // Validar los datos del formulario
        // $request->validate([
        //     // Puedes agregar reglas de validación según tus necesidades
        // ]);

        // Crear una nueva cita médica
        MedicalAppointment::create([
            'date_time' => $request->date_time,
            'doctor_id' => $request->doctor_id,
            'status' => $request->status
        ]);

        // // Redirigir a la vista de citas médicas después de crear una cita
        return redirect()->route('admin.appointments');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener y mostrar detalles de una cita médica específica
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cita = MedicalAppointment::findOrFail($id); // Obtener la cita médica por su ID
    // Puedes cargar los datos adicionales necesarios, como los médicos y pacientes, si es necesario

        return view('admin.citas.edit', compact('cita'));
        // Obtener y devolver la vista para editar una cita médica específica
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario de edición
        $request->validate([
            'date_time' => 'required', // Puedes agregar más reglas de validación según tus necesidades
        ]);
    
        // Obtener la cita médica por su ID
        $cita = MedicalAppointment::findOrFail($id);
    
        // Actualizar los campos con los datos del formulario
        $cita->date_time = $request->date_time;
        $cita->doctor_id = $request->doctor_id;
        $cita->patient_id = $request->patient_id;
        $cita->status = $request->status;
    
        // Guardar los cambios en la base de datos
        $cita->save();
    
        // Redirigir a la vista de citas médicas después de la actualización
        return redirect()->route('admin.appointments')->with('success', 'La cita médica ha sido actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar la cita médica específica
        // ...
        dd("se elemino la cita");
        // Redirigir a la vista de citas médicas después de la eliminación
        return redirect()->route('admin.appointments');
    }
}
