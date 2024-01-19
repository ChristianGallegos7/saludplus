@extends('layouts.app')

@section('titulo')
    Registrate en SaludPlus
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-6/12  p-5">
            <img src="{{ asset('images/registro.avif') }}" alt="IMAGEN DE REGISTRO">
        </div>
        <div class="md:w-4/12 bg-white rounded-lg shadow-2xl p-6">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">
                        Nombre
                    </label>
                    <input type="text" placeholder="Nombre" id="name" name="name"
                        class="border p-3 w-full rounded-lg
                        @error('name')
                            border-red-500
                        @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="apellido" class="mb-2 block uppercase text-gray-600 font-bold">
                        Apellido
                    </label>
                    <input type="text" placeholder="Apellido" id="apellido" name="lastname"
                        class="border p-3 w-full rounded-lg  @error('lastname')
                        border-red-500
                        @enderror"
                        value="{{ old('lastname') }}">
                    @error('lastname')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="telefono" class="mb-2 block uppercase text-gray-600 font-bold">
                        Telefono
                    </label>
                    <input type="number" placeholder="Telefono" id="telefono" name="phone"
                        class="border p-3 w-full rounded-lg  @error('phone')
                        border-red-500
                    @enderror"
                    value="{{ old('phone') }}"
                    >
                    @error('phone')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">
                        E-mail
                    </label>
                    <input type="email" placeholder="Email" id="email" name="email"
                        class="border p-3 w-full rounded-lg  @error('email')
                        border-red-500
                    @enderror"
                    value="{{ old('email') }}"

                    >
                    @error('email')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">
                        Password
                    </label>
                    <input type="password" placeholder="Password de registro" id="password" name="password"
                        class="border p-3 w-full rounded-lg  @error('password')
                        border-red-500
                    @enderror">
                    @error('password')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-600 font-bold ">
                        Repetir Password
                    </label>
                    <input type="password" placeholder="Repite tu password" id="password_confirmation"
                        name="password_confirmation"
                        class="border p-3 w-full rounded-lg @error('password_confirmation')
                        border-red-500
                    @enderror">
                    @error('password_confirmation')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input type="submit" value="Crear Cuenta"
                    class="bg-green-600 hover:bg-green-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>

    </div>
@endsection
