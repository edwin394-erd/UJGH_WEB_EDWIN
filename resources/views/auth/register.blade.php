@extends('layouts.app')

@section('titulo')
    Registrate
@endsection

@section('contenido')

    <div class="md:flex">
        <div class="md:w-1/4"></div>
        <div class="md:w-2/4 mx-5">
            <form action={{route('register')}} method="POST" novalidate>
                @csrf
                <div class="m-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold"> Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Tu nombre" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}">
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold"> Nombre de usuario</label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror value="{{old('username')}}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold"> Correo Electronico</label>
                    <input id="email" name="email" type="text" placeholder="Tu email de registro" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror value="{{old('email')}}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold"> Contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Tu contraseña" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-600 font-bold"> Confirmar Contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirma tu contraseña" class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <input type="submit" value="Crear Cuenta" class="bg-sky-500 hover:bg-sky-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" >
                </div>
            </form>
        </div>
        <div class="md:w-1/4"></div>
    
    </div>

@endsection