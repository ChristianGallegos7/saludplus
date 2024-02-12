@extends('layouts.app')

@section('titulo')
    Crear nuevo doctor
@endsection

@section('contenido')
    <a class="font-bold uppercase text-white bg-yellow-500 text-sm p-2 rounded-lg hover:bg-yellow-600"
        href="{{ route('admin.dashboard') }}">
        Volver
    </a>
    <div class="flex justify-center p-4">
        <div class="w-4/12 p-4 bg-gray-200">
            <!-- Formulario para crear un nuevo doctor -->
            <h2 class="text-2xl font-bold mb-4">Crear Nuevo Doctor</h2>
            <form action="{{ route('admin.create.doctor') }}" method="post" novalidate>
                @csrf

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-semibold text-gray-600">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required
                        class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        value="{{ old('nombre') }}">
                    @error('nombre')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="specialty_id" class="block text-sm font-semibold text-gray-600">Especialidad:</label>
                    <select id="specialty_id" name="specialty_id" required
                        class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        @foreach ($especialidades as $especialidad)
                            <option value="{{ $especialidad->id }}"
                                {{ old('specialty_id') == $especialidad->id ? 'selected' : '' }}>
                                {{ $especialidad->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('specialty_id')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="telefono" class="block text-sm font-semibold text-gray-600">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" required
                        class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        value="{{ old('telefono') }}">
                    @error('telefono')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="correo" class="block text-sm font-semibold text-gray-600">Correo electrónico:</label>
                    <input type="email" id="correo" name="correo" required
                        class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        value="{{ old('correo') }}">
                    @error('correo')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full p-2 font-bold bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">
                    Crear Doctor
                </button>
            </form>

        </div>
    </div>
@endsection
