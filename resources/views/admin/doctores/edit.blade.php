@extends('layouts.app')

@section('titulo')
    Editar doctor
@endsection

@section('contenido')
    <a class="font-bold uppercase text-white bg-yellow-500 text-sm p-2 rounded-lg hover:bg-yellow-600"
       href="{{ route('admin.doctors') }}">
        Volver
    </a>
    <div class="flex justify-center p-4">
        <div class="w-4/12 p-4 bg-gray-200">
            <h2 class="text-2xl font-bold mb-4">Editar Doctor</h2>
            <form action="{{ route('admin.update.doctor', $doctor->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-semibold text-gray-600">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ $doctor->nombre }}"
                           class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="especialidad" class="block text-sm font-semibold text-gray-600">Especialidad:</label>
                    <input type="text" id="especialidad" name="especialidad" value="{{ $doctor->especialidad }}"
                           class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="telefono" class="block text-sm font-semibold text-gray-600">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" value="{{ $doctor->telefono }}"
                           class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="correo" class="block text-sm font-semibold text-gray-600">Correo electrónico:</label>
                    <input type="email" id="correo" name="correo" value="{{ $doctor->correo }}"
                           class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <button type="submit"
                        class="w-full p-2 font-bold bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">
                    Guardar Cambios
                </button>
            </form>
        </div>
    </div>
@endsection
