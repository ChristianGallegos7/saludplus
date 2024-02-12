@extends('layouts.app')

@section('titulo')
    Dashboard de Citas Médicas
@endsection

@section('contenido')
    <p>Bienvenido al sistema de SaludPlus: {{ auth()->user()->name }}</p>
@endsection