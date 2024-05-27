@extends('layouts.app')

@section('titulo')
    Inicia Sesión
@endsection

@section('contenido')

    <div class="md:flex">
        <div class="md:w-1/4"></div>
        <div class="md:w-2/4 mx-5">
            <form method="POST" action={{route('login')}}>
                @csrf

                @if (session('mensaje'))
                    <p  class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{@session('mensaje')}}</p>
                    
                @endif

                <div class="m-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold"> Correo Electronico</label>
                    <input id="email" name="email" type="text" placeholder="Tu email" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror value="{{old('email')}}">
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
                    <input type="checkbox" name="remember"><label for="remember" class=" text-gray-600 font-bold text-sm"> Mantener la Sesión</label>
                </div>

                <div class="m-5">
                    <input type="submit" value="Iniciar Sesión" class="bg-sky-500 hover:bg-sky-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" >
                </div>
            </form>
        </div>
        <div class="md:w-1/4"></div>
    
    </div>

@endsection