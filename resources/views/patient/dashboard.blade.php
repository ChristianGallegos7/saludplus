@extends('layouts.app')

@section('titulo')
    Citas medicas disponibles✔
@endsection

@section('contenido')
    <div>
        <p class="font-bold text-2xl">Bienvenido al sistema de SaludPlus: <span
                class="text-green-700 uppercase">{{ auth()->user()->name }}</span></p>

    </div>
@endsection
