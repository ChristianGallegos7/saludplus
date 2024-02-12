<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalAppointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\Specialty;
use App\Rules\ValidAppointmentTime;
use Illuminate\Support\Carbon;

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
        // Validar los datos recibidos del formulario
        $request->validate([
            'appointment_datetime' => ['required', 'date', new ValidAppointmentTime()],
            'specialty' => 'required|exists:specialties,id',
            'doctor_id' => 'required|exists:doctors,id',
            'additional_info' => 'nullable|string',
            'status' => 'required|in:available,reserved,completed',
        ], [
            'appointment_datetime.valid_appointment_time' => 'La cita médica solo puede ser programada entre las 8:00 y las 17:00 horas.',
            'appointment_datetime.date' => 'La fecha y hora de la cita no son válidas.',
            'appointment_datetime.required' => 'La fecha y hora de la cita son obligatorias.',
        ]);
        
        // Crear una nueva instancia de MedicalAppointment con los datos recibidos del formulario
        $appointment = new MedicalAppointment();
        $appointment->appointment_datetime = $request->appointment_datetime;
        $appointment->specialty_id = $request->specialty;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->additional_info = $request->additional_info;
        $appointment->status = $request->status;

        // Guardar la cita médica en la base de datos
        $appointment->save();

        // Redireccionar a la vista de citas médicas después de crear una cita con un mensaje de éxito
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
        $specialties = Specialty::all();

        return view('admin.citas.edit', compact('cita', 'doctors', 'usuarios', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario de edición
        $request->validate([
            'appointment_datetime' => 'required|date',
            'specialty' => 'required|exists:specialties,id',
            'doctor_id' => 'required|exists:doctors,id',
            'additional_info' => 'nullable|string',
            'status' => 'required|in:available,reserved,completed',
        ]);

        // Obtener la cita médica por su ID
        $cita = MedicalAppointment::findOrFail($id);

        // Actualizar los campos con los datos del formulario
        $cita->appointment_datetime = $request->appointment_datetime;
        $cita->specialty_id = $request->specialty;
        $cita->doctor_id = $request->doctor_id;
        $cita->additional_info = $request->additional_info;
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
    public function getDoctorsBySpecialty(Request $request)
    {
        try {
            $request->validate([
                'specialty_id' => 'required|exists:specialties,id',
            ]);

            $specialtyId = $request->input('specialty_id');

            // Mensaje de depuración para verificar que se esté recibiendo el ID de especialidad correctamente
            dd('Especialidad ID: ' . $specialtyId);

            $doctors = Doctor::where('specialty_id', $specialtyId)->get();

            // Mensaje de depuración para verificar los médicos obtenidos
            dd($doctors);

            // Obtener la lista de especialidades para cargar en el formulario
            $specialties = Specialty::all();

            // Devolver la vista para crear una nueva cita médica con los médicos filtrados por especialidad
            return view('admin.citas.create', compact('doctors', 'specialties'));
        } catch (\Exception $e) {
            // Capturar y manejar cualquier excepción que ocurra durante el proceso
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
