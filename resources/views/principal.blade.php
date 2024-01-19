@extends('layouts.app')

@section('titulo')
Inicio
@endsection

@section('contenido')
<div class="flex justify-around items-center">
    <div class="header__image">
        <img src="{{asset('images/img-1.webp')}}" alt="IMAGEN DE PACIENTE">
    </div>

    <div class="bg-green-400 p-5 rounded">
        <h2 class="font-bold text-2xl text-white text-center">Citas Médicas</h2>

        <p class=" text-white text-xl">Nuestro servicio está disponible en la ciudad de Quito.</p>
        <p class=" text-white text-xl">Para agendar una cita deber crear una cuenta!</p>
        <a href="{{ route('register') }}" class="bg-green-600 text-white font-semibold py-2 px-4 rounded inline-block mt-2 hover:bg-green-700 uppercase">Crear cuenta</a>
    </div>

</div>
<div class="text-center text-2xl font-black my-8">
    <h1>Especialidades</h1>
</div>

<div class="flex justify-around">

    <div class="max-w-md">
        <h2 class="font-bold border-b-2 border-green-500 inline-block mb-4">Especialidades Disponibles</h2>
        <p class="text-gray-800">
            Estas son algunas de nuestras especialidades disponibles en la clinica SaludPlus
        </p>
    </div>

    <div class="flex space-x-10">
        <div class="corazon">
            <h3 class="font-bold mb-2">Cardiología</h3>
            <img src="{{asset('images/icon-5.webp')}}" class="esp esp_corazon" alt="Especialidad 1">
        </div>
        <div class="fracturas">
            <h3 class="font-bold mb-2">Endoscopia</h3>
            <img src="{{asset('images/icon-6.webp')}}" class="esp esp_fracturas" alt="Especialidad 2">
        </div>
        <div class="examenes">
            <h3 class="font-bold mb-2">Cirugía General</h3>
            <img src="{{asset('images/icon-7.webp')}}" class="esp esp_examenes" alt="Especialidad 3">
        </div>
    </div>

</div>

@endsection
