@extends('layouts.app')

@section('titulo')
    Panel de Administrador
@endsection

@section('contenido')
    <p class="font-bold text-center">Bienvenido al sistema de administración de SaludPlus: {{ auth()->user()->name }}</p>
@endsection
