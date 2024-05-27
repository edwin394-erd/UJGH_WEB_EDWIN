@extends('layouts.app')

@section('titulo')
    Tu cuenta
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:6/12 px-5">
                <img src="{{asset('img/user_img.png')}}" alt="Imagen de usuario">
            </div>
            <div class="md:w-8/12 lg:6/12 px-5">
                <a class="text-gray-700 text-2xl">{{auth()->user()->username}}</a>
            </div>
        </div>
    </div>
@endsection