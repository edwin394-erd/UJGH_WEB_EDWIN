<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>UJGH WEB - @yield('titulo-tab')</title>
</head>
<body class="bg-gradient-to-r from-gray-200 to-gray-300">
    <header class="p-5 border-b bg-black shadow-2xl border-none">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-2xl font-bold text-white" href="{{route('home')}}">
                UJGH WEB
            </a>

            @auth
                <nav class="flex gap-2 items-center text-white">
                    <a href="{{ route('posts.create') }}" class="flex items-center gap-2 text-white bg-black rounded cursor-pointer border-white text-sm hover:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                    </a>
                    <p class="text-white">|</p>
                    <a href="{{ route('posts.index', auth()->user()->username) }}" class="flex items-center gap-2 text-white bg-black rounded cursor-pointer border-white text-sm hover:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </a>
                    <p class="text-white">|</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="cursor-pointer uppercase text-white text-sm hover:text-gray-400">
                            Cerrar sesión
                        </button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-2 items-center">
                    <a class="font-blod uppercase text-white text-sm hover:text-gray-400" href="{{ route('login') }}">Iniciar Sesión</a>
                    <p class="text-white">|</p>
                    <a class="font-blod uppercase text-white text-sm hover:text-gray-400" href="{{ route('register') }}">Crear Cuenta</a>
                </nav>
            @endguest
        </div>
    </header>

    <main class="container mt-10 mx-auto">
        <h2 class="font-black text-center text-3xl text-black mb-10">@yield('titulo')</h2>
        @yield('contenido')
    </main>


    <footer class="text-center p-5 text-gray-600 font-bold uppercase mt-11">
        UJGH WEB - Todos los derechos reservados {{ now()->year }}
    </footer>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
