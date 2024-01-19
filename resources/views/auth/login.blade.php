@extends('layouts.app')

@section('titulo')
    Inicia Sesión en SaludPlus
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-6/12  p-5">
            <img src="{{ asset('images/login.avif') }}" alt="IMAGEN DE LOGIN USUARIO">
        </div>
        <div class="md:w-4/12 bg-white rounded-lg shadow-2xl p-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if (session('mensaje'))
                <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ session('mensaje') }}
                        </p>
                @endif
                <div class="mb-5 mt-2">
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
                    <input type="checkbox" name="remember"> <label class=" text-gray-600 text-sm">Mantener mi sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión"
                    class="bg-green-600 hover:bg-green-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>

    </div>
@endsection
