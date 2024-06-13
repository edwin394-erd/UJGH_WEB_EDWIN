@extends('layouts.app')

@section('titulo-tab')
    Registro
@endsection

@section('contenido')

    <div class="md:flex">
        <div class="md:w-1/6 xl:w-2/6"></div>
        <div class="md:w-4/6 xl:w-2/6 mx-5 border bg-white rounded-2xl p-5">
            <h2 class="font-bold text-center text-3xl text-black mb-5">Registrate</h2>
            <hr>
            <form action={{route('register')}} method="POST" novalidate>
                @csrf
                <div class="m-5">
                    <label for="name" class="mb-2 block text-gray-600 font-bold"> Nombre y Apellido</label>
                    <input id="name" name="name" type="text" placeholder="Tu nombre" class="shadow-lg border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}">
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <label for="username" class="mb-2 block text-gray-600 font-bold"> Nombre de usuario</label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" class="shadow-lg border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{old('username')}}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <label for="email" class="mb-2 block text-gray-600 font-bold"> Correo Electronico</label>
                    <input id="email" name="email" type="text" placeholder="Tu email de registro" class="shadow-lg border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <label for="password" class="mb-2 block text-gray-600 font-bold"> Contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Tu contraseña" class="shadow-lg border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <label for="password_confirmation" class="mb-2 block text-gray-600 font-bold"> Confirmar Contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirma tu contraseña" class="shadow-lg border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <br>
                <div class="m-5">
                    <input type="submit" value="Crear Cuenta" class="bg-black hover:bg-gray-600 shadow-lg transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg" >
                </div>
            </form>
        </div>
        <div class="md:w-1/6 xl:w-2/6"></div>
    
    </div>

@endsection