@extends('layouts.app')

@section('titulo')
    Panel de Citas
@endsection

@section('contenido')
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
            <div class="bg-green-400 hover:bg-green-600 p-4 mb-4 rounded-lg shadow-lg cursor-pointer">
                <p class="font-bold">Fecha de la cita: {{ $cita->date_time }}</p>
                <p>{{ $cita->doctor_id }}</p>
                <p>Estado de la cita: {{ $cita->status }}</p>
        
                <!-- Botones de editar y eliminar -->
                <div class="flex mt-2">
                    <a href=""
                       class="bg-blue-500 text-white px-2 py-1 rounded-md mr-2 hover:bg-blue-600">
                       Editar
                    </a>
        
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">
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
