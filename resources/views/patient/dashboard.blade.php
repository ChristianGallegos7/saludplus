@extends('layouts.app')

@section('titulo')
    Dashboard de Citas Médicas
@endsection

@section('contenido')
    <p class="font-bold text-2xl">Bienvenido al sistema de SaludPlus: <span class="text-green-600 uppercase">{{ auth()->user()->name }}</span></p>
@endsection