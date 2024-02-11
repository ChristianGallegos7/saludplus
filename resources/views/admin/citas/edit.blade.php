@extends('layouts.app')

@section('titulo', 'Editar Cita')

@section('contenido')
    <a href="{{ route('admin.appointments') }}" class="font-bold uppercase text-white bg-yellow-500 text-sm p-2 rounded-lg hover:bg-yellow-600">Volver</a>
    <div class="flex justify-center p-4">
        <div class="w-4/12 p-4 bg-gray-200">
            <h2 class="text-2xl font-bold mb-4">Editar Cita Médica</h2>
            <form action="{{ route('admin.update.appointment', ['id' => $cita->id]) }}" method="post" novalidate>
                @csrf
                @method('PUT')

                <!-- Input para la fecha y hora de la cita -->
                <div class="mb-4">
                    <label for="appointment_datetime" class="block text-sm font-semibold text-gray-600">Fecha y Hora de la Cita:</label>
                    <input type="datetime-local" id="appointment_datetime" name="appointment_datetime" required value="{{ $cita->appointment_datetime }}" min="{{ now()->format('Y-m-d\TH:i') }}" class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <!-- Select para la especialidad -->
                <div class="mb-4">
                    <label for="specialty" class="block text-sm font-semibold text-gray-600">Especialidad:</label>
                    <select id="specialty" name="specialty" required onchange="getDoctorsBySpecialty(this.value)" class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        <option value="">Selecciona una especialidad</option>
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->id }}" {{ $specialty->id == $cita->specialty_id ? 'selected' : '' }}>{{ $specialty->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Select para el médico asociado -->
                <div class="mb-4">
                    <label for="doctor_id" class="block text-sm font-semibold text-gray-600">Médico Asociado:</label>
                    <select id="doctor_id" name="doctor_id" required class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        <!-- Iterar sobre la lista de doctores para mostrar las opciones -->
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $doctor->id == $cita->doctor_id ? 'selected' : '' }}>{{ $doctor->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Textarea para la información adicional -->
                <div class="mb-4">
                    <label for="additional_info" class="block text-sm font-semibold text-gray-600">Información Adicional:</label>
                    <textarea id="additional_info" name="additional_info" class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">{{ $cita->additional_info }}</textarea>
                </div>

                <!-- Select para el estado de la cita -->
                <div class="mb-4">
                    <label for="status" class="block text-sm font-semibold text-gray-600">Estado de la Cita:</label>
                    <select id="status" name="status" required class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        <option value="available" {{ $cita->status == 'available' ? 'selected' : '' }}>Disponible</option>
                        <option value="reserved" {{ $cita->status == 'reserved' ? 'selected' : '' }}>Reservada</option>
                        <option value="completed" {{ $cita->status == 'completed' ? 'selected' : '' }}>Completada</option>
                    </select>
                </div>

                <!-- Botón para actualizar la cita médica -->
                <button type="submit" class="w-full p-2 font-bold bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Actualizar Cita Médica</button>
            </form>
        </div>
    </div>
@endsection
