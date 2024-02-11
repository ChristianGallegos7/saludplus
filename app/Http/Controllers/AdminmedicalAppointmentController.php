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
            'appointment_datetime' => ['required', 'date','after_or_equal:' . Carbon::now()->format('Y-m-d\TH:i') ,new ValidAppointmentTime],
            'specialty' => 'required|exists:specialties,id', // Asegúrate de que la especialidad seleccionada existe en la tabla de especialidades
            'doctor_id' => 'required|exists:doctors,id', // Asegúrate de que el médico seleccionado existe en la tabla de doctores
            'additional_info' => 'nullable|string',
            'status' => 'required|in:available,reserved,completed', // Asegúrate de que el estado sea uno de los valores permitidos
        ],
        [
            'appointment_datetime.valid_appointment_time' => 'La cita médica solo puede ser programada entre las 8:00 y las 17:00 horas.',
            'appointment_datetime.after_or_equal' => 'La cita médica debe ser programada para una fecha y hora futura.'
        ]
    );

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
        // Obtener el ID de la especialidad desde la solicitud
        $specialtyId = $request->specialty_id;

        // Buscar los médicos asociados a la especialidad
        $doctors = Doctor::where('specialty_id', $specialtyId)->get();

        // Retornar los médicos en formato JSON
        return response()->json(['doctors' => $doctors]);
    }
}
