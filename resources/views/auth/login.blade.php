@extends('layouts.app')

@section('titulo-tab')
    Inicio de Sesión
@endsection

@section('contenido')

  <div class="md:flex">
        <div class="md:w-1/6 xl:w-2/6"></div>
        <div class="md:w-4/6 xl:w-2/6 mx-5 border bg-white rounded-2xl p-5">
            <h2 class="font-bold text-center text-3xl text-black mb-5">Incia Sesión</h2>
            <hr>
            
            <form method="POST" action={{route('login')}}>
                @csrf

                @if (session('msg_error'))
                    <p  class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{@session('msg_error')}}</p>
                    
                @endif

                @if (session('msg_registroExitoso'))
                    <p  class="bg-green-700 text-white my-2 rounded-lg text-sm p-2 text-center">{{@session('msg_registroExitoso')}}</p>
                    
                @endif

                

                <div class="m-5">
                    <label for="email" class="mb-2 block text-gray-600 font-bold"> Correo Electronico</label>
                    <input id="email" name="email" type="text" placeholder="Tu email" class="shadow-lg border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">
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
                    <input type="checkbox" name="remember" class="accent-black"><label for="remember" class=" text-gray-600 font-bold text-sm"> Mantener la Sesión</label>
                </div>
                <br>
                <div class="m-5">
                    <input type="submit" value="Iniciar Sesión" class="bg-black hover:bg-gray-600 shadow-lg transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg" >
                </div>
            </form>
        </div>
        <div class="md:w-1/6 xl:w-2/6"></div>
    
    </div>

@endsection




