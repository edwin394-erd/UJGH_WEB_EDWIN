<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>UJGH web- @yield('titulo')</title>
        <script src="{{asset('js/app.js')}}"></script>      

    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    UJGH WEB
                </h1>

                @auth
                    <nav class="flex gap-2 items-center">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="font-blod uppercase text-gray-600 text-sm" href={{route('logout')}}>
                                Cerrar Sesión
                            </button>
                        </form>
                    </nav>
                @endauth

                @guest
                    <nav class="flex gap-2 items-center">
                        <a class="font-blod uppercase text-gray-600 text-sm" href={{route('login')}}>Login</a>
                        <a class="font-blod uppercase text-gray-600 text-sm" href={{route('register')}}>Crear Cuenta</a>
                    </nav>
                @endguest
                
            </div>          

        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
            @yield('contenido')
        </main>

        <footer class="text-center p-5 text-gray-600 font-bold uppercase mt-11">
            RedSocial - Todo los derechos resevados {{ now()->year }}
        </footer>

    </body>
</html>