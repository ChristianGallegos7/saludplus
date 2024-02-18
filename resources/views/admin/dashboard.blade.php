@extends('layouts.app')

@section('titulo')
    Panel de Administrador
@endsection

@section('contenido')
    <p class="font-bold text-center">Bienvenido al sistema de administración de SaludPlus: {{ auth()->user()->name }}</p>

    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Resumen</h2>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Citas Médicas</h3>
                <p class="text-gray-600">Total: {{ $totalMedicalAppointments }}</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Doctores</h3>
                <p class="text-gray-600">Total: {{ $totalDoctors }}</p>
            </div>
        </div>
    </div>
@endsection
