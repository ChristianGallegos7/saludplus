<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalAppointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\Specialty;

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
        // Obtener la lista de especialidades desde la base de datos
        $specialties = Specialty::all();
        
        // Obtener la lista de doctores desde la base de datos
        $doctors = Doctor::all();
        
        // Devolver la vista para crear una nueva cita médica
        return view('admin.citas.create', compact('specialties', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_datetime' => 'required|date_format:Y-m-d\TH:i',
            'specialty' => 'required',
            'doctor_id' => 'required',
            'status' => 'required',
            'additional_info' => 'nullable|string',
        ]);
    
        MedicalAppointment::create([
            'appointment_datetime' => $request->appointment_datetime,
            'specialty_id' => $request->specialty,
            'doctor_id' => $request->doctor_id,
            'status' => $request->status,
            'additional_info' => $request->additional_info,
        ]);
    
        // Redirigir a la vista de citas médicas después de crear una cita
        return redirect()->route('admin.appointments')->with('success', 'La cita médica ha sido creada exitosamente.');
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
        $doctors = Doctor::all(); // Obtener la lista de doctores
        $usuarios = User::all(); // Obtener la lista de usuarios si es necesario
    
        return view('admin.citas.edit', compact('cita', 'doctors', 'usuarios'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario de edición
        $request->validate([
            'appointment_datetime' => 'required|date', // Agregar más reglas de validación según sea necesario
        ]);
    
        // Obtener la cita médica por su ID
        $cita = MedicalAppointment::findOrFail($id);
    
        // Actualizar los campos con los datos del formulario
        $cita->appointment_datetime = $request->appointment_datetime;
        $cita->doctor_id = $request->doctor_id;
        $cita->user_id = $request->user_id;
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
        // Buscar la cita médica por su ID
        $cita = MedicalAppointment::findOrFail($id);
    
        // Eliminar la cita médica
        $cita->delete();
    
        // Redirigir a la vista de citas médicas después de la eliminación
        return redirect()->route('admin.appointments')->with('success', 'La cita médica ha sido eliminada exitosamente.');
    }
    
    public function getDoctorsBySpecialty(Request $request) {
        $specialtyId = $request->specialty_id;
        $doctors = Doctor::where('specialty_id', $specialtyId)->get();
        return response()->json(['doctors' => $doctors]);
    }  
}
