@extends('layouts.app')

@section('titulo')
    Panel de Citas
@endsection

@section('contenido')
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded-md mb-4 w-auto success-alert" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
    <a class="font-bold uppercase text-white bg-yellow-500 text-sm p-2 rounded-lg hover:bg-yellow-600"
        href="{{ route('admin.dashboard') }}">
        Volver
    </a>
    <div class="flex justify-between p-4">
        <div class="w-1/1">
            <!-- Lista de citas medicas -->
            <h2 class="text-2xl font-bold mb-4">Lista de Citas Médicas</h2>
            <!-- Aquí puedes iterar sobre tus citas y mostrarlas -->
            @foreach ($citas as $cita)
                <div
                    class="bg-white p-4 mb-4 rounded-lg shadow-lg cursor-pointer transition-transform transform hover:scale-105">
                    <p class="font-bold text-lg mb-2">Fecha de la cita: {{ $cita->appointment_datetime }}</p>
                    <p class="mb-2">
                        <span class="font-bold">Especialidad:</span>
                        @if ($cita->specialty)
                            {{ $cita->specialty->name }}
                        @else
                            Especialidad no asignada
                        @endif
                    </p>
                    <p class="mb-2">
                        <span class="font-bold">Médico:</span>
                        @if ($cita->doctor)
                            {{ $cita->doctor->nombre }}
                        @else
                            Médico no asignado
                        @endif
                    </p>
                    <p class="mb-2"><span class="font-bold">Estado de la cita:</span> {{ $cita->status }}</p>
                    @if ($cita->additional_info)
                        <p class="mb-2"><span class="font-bold">Información adicional:</span> {{ $cita->additional_info }}
                        </p>
                    @endif
                    <!-- Botones de editar y eliminar -->
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
                </div>
            @endforeach
        </div>
        <div class="w-1/4 p-4 bg-gray-200">
            <!-- Botón para crear una nueva cita -->
            <h2 class="text-2xl font-bold mb-4">Crear Nueva Cita</h2>
            <a href="{{ route('admin.create.appointment') }}"
                class="block w-full p-2 font-bold bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none text-center">
                Crear Cita Médica
            </a>
        </div>
    </div>
@endsection
