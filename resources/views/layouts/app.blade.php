<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaludPlus - @yield('titulo')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow" id="header">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('principal') }}">
                <h1 class="text-3xl font-black">SaludPlus</h1>
            </a>
            @auth
                <nav class="flex gap-4 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm " href="#">
                        Hola: <span class="font-normal">
                            {{ auth()->user()->name }}
                        </span>
                        <!-- Mostrar pestañas específicas para el rol de administrador -->
                        @if (auth()->user()->isAdmin())
                            <a class="font-bold uppercase text-white text-sm bg-green-500 p-2 rounded-lg hover:bg-green-600 hover:no-underline"
                                href="{{ route('admin.appointments') }}">
                                Citas Médicas
                            </a>

                            <a class="font-bold uppercase text-white bg-yellow-500 text-sm p-2 rounded-lg hover:bg-yellow-600"
                                href="{{ route('admin.doctors') }}">
                                Doctores
                            </a>
                           
                        @endif
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm hover:underline">
                            Cerrar Sesión
                        </button>
                    </form>
                </nav>
            @endauth
            @guest
                <nav class="flex gap-4 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm hover:underline" href="{{ route('login') }}">
                        Login
                    </a>
                    <a class="font-bold uppercase text-gray-600 text-sm hover:underline" href="{{ route('register') }}">
                        Crear Cuenta
                    </a>
                </nav>
            @endguest
        </div>
    </header>



    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-2xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10">
        SaludPlus - &copy;Todos los derechos Reservados
        {{ now()->year }}
    </footer>

</body>

</html>
