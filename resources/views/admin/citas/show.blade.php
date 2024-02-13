<!-- resources/views/admin/medical_appointments/show.blade.php -->
@extends('layouts.app')

@section('titulo')
    Detalle de la cita
@endsection

@section('contenido')
    <div class="container mx-auto flex justify-center items-center">
        <div class="max-w-lg bg-blue-200 rounded-lg shadow-lg p-3">
            <div class="bg-gradient-to-b from-blue-700 to-blue-400 p-4 rounded-lg">
                <p class="text-white"><strong>Fecha de la cita:</strong> {{ $cita->appointment_datetime }}</p>
                <p class="text-white"><strong>Especialidad:</strong> {{ $cita->specialty ? $cita->specialty->name : 'Especialidad no asignada' }}</p>
                <p class="text-white"><strong>Médico:</strong> {{ $cita->doctor ? $cita->doctor->nombre : 'Médico no asignado' }}</p>
                <p class="text-white"><strong>Estado de la cita:</strong> {{ $cita->status }}</p>
                @if ($cita->additional_info)
                    <p class="text-white"><strong>Información adicional:</strong> {{ $cita->additional_info }}</p>
                @endif
            </div>

            <!-- Botones de editar y eliminar solo para administradores -->
            @if (auth()->user()->isAdmin())
                <div class="flex mt-4">
                    <a href="{{ route('admin.edit.appointment', ['id' => $cita->id]) }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-blue-600 transition-colors duration-300">
                        Editar
                    </a>
                    <form action="{{ route('admin.destroy.appointment', ['id' => $cita->id]) }}" method="post"
                        onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta cita?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors duration-300">
                            Eliminar
                        </button>
                    </form>
                </div>
            @endif

            <!-- Botón "Volver" para usuarios pacientes o administradores -->
            @if (auth()->user()->isPatient() || auth()->user()->isAdmin())
                <div class="flex mt-4">
                    <a href=""
                        class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600 transition-colors duration-300">
                        Obtener cita
                    </a>
                    <a href="{{ route('admin.appointments') }}"
                        class="bg-yellow-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-yellow-600 transition-colors duration-300">
                        Volver
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
