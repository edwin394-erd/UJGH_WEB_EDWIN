@extends('layouts.app')

@section('titulo-tab')
    Tu cuenta
@endsection


    


@section('contenido')
    <div class="bg-white rounded-2xl mx-9 md:mx-auto md:w-3/4 lg:w-2/4">
        <br>
        <h2 class="font-black text-center text-3xl text-black">Perfil: <text>@</text>{{$user->username}}</h2>

        <div class="md:mx-auto flex justify-center bg-white rounded-2xl p-5 object-center">
            <div class="w-full md:w-8/12 flex flex-col items-center md:flex-row">
                <div class="w-8/12 md:w-6/12 px-5 items-center justify-center">
                    <img src="{{asset('img/user_img.png')}}" class="mx-auto" alt="Imagen de usuario">
                </div>
                <div class="w-8/12 md:w-6/12 px-5 flex flex-col items-center md:items-start md:justify-center pb-8 pt-5 md:py-5">
                    <p class="text-gray-700 text-2xl mt-1">{{$user->username}}</p>
    
                    <p class="text-gray-800 text-sm mb-3 font-bold" href="">0<span class="font-normal"> Seguidores</span></p>
    
                    <p class="text-gray-800 text-sm mb-3 font-bold" href="">0<span class="font-normal"> Siguiendo</span></p>
    
                    <p class="text-gray-800 text-sm mb-3 font-bold" href="">0<span class="font-normal"> Post</span></p>
                </div>
            </div>
        </div>

    </div>
    
@endsection