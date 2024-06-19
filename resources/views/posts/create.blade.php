@extends('layouts.app')

@section('titulo-tab')
    Crear Post
@endsection

@section('titulo')
    Crea una nueva publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store')}}" id="dropzone" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" method="POST">
            @csrf</form>
        </div>

        <div class="md:w-1/2 p-10 border bg-white rounded-2xl mt-10 md:mt-0 mx-8">
            <form action={{route('posts.store')}} method="POST" novalidate>
                @csrf
                <div class="m-5">
                    <label for="titulo" class="mb-2 block text-gray-600 font-bold"> Titulo</label>
                    <input id="titulo" name="titulo" type="text" placeholder="Titulo de la publicación" class="shadow-lg border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror" value="{{old('titulo')}}">
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{old('imagen')}}">

                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-5">
                    <label for="descripcion" class="mb-2 block text-gray-600 font-bold"> Descripción</label>
                    <textarea id="descripcion" name="descripcion" type="text" placeholder="Descripción de la publicación" class="shadow-lg border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{old('descripcion')}}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <br>
                <div class="m-5">
                    <input type="submit" value="Crear Publicación" class="bg-black hover:bg-gray-600 shadow-lg transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg" >
                </div>
            </form>
        </div>
       
    </div>
@endsection