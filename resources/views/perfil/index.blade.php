@extends('layouts.app')

@section('titulo')
    Editar Perfil: <text>@</text>{{auth()->user()->username}}
@endsection

@section('titulo-tab')
    Editar Perfil
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow-2xl p-6">
            <form action="{{route('perfil.store')}}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">
               @csrf
                <div class="m-5">
                    <label for="username" class="mb-2 block text-gray-600 font-bold"> Nombre de usuario</label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" class="shadow-lg border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{auth()->user()->username}}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <label for="imagen" class="mb-2 block text-gray-600 font-bold"> Imagen perfil</label>
                    <input id="imagen" name="imagen" type="file"  class="shadow-lg border p-3 w-full rounded-lg" accept=".jpg, .jpeg, .png, .gif">
              
                </div>

                <div class="m-5">
                    <label for="email" class="mb-2 block text-gray-600 font-bold"> Correo Electronico</label>
                    <input id="email" name="email" type="text" placeholder="Tu email de registro" class="shadow-lg border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{auth()->user()->email}}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>


                <br>
                <div class="m-5">
                    <input type="submit" value="Guardar Cambios" class="bg-black hover:bg-gray-600 shadow-lg transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg" >
                </div>
               


            </form>
        </div>
    </div>
@endsection