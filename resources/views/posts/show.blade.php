@extends('layouts.app')

@section('titulo-tab')
     {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container md:flex">
        
        <div class="md:w-1/2 p-5 mx-5">
            <div class="container md:flex flex-col">
       
                <div class="flex justify-between mb-2 p-0 align-bottom">
                
                  <div class="flex mb-0 items-end">
                    <a href="{{route('posts.index',$post->user)}}" class="font-bold ">{{$post->user->username}}</a>
                    <p class=" text-gray-500 mb-0">  • {{$post->created_at->diffForHumans()}}</p>
                  </div>
                  
                  
                  @auth
                  <form action="{{route('posts.destroy', $post)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Eliminar Publicación" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold cursor-pointer text-sm">
                  </form>
                  @endauth
                  
                </div>
                
            </div>
            <img src="{{asset('uploads'.'/'. $post->imagen)}}" alt="{{$post->titulo}}">
            
            <div class="p-3">
                <p>0 likes</p>
            </div>

            <div class="p-3">
                <p class="">{{$post->descripcion}}</p>
            </div>

            
            
        </div>

        

        <div class="md:w-1/2 p-5 mx-5 md:mt-8">
            <div class="p-5 bg-white shadow mb-5">
                @auth
                <p class="text-xl font-bold text-center mb-4"> Agrega un nuevo comentario</p>

                @if (@session('mensaje'))
                    
                <div class="bg-green-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{@session('mensaje')}}
                </div>
                    
                @endif
                <form action="{{route('comentarios.store', ['post' => $post, 'user' => $user])}}" method="POST">
                    @csrf
                    <div class="m-5">
                        <label for="comentario" class="mb-2 block text-gray-600 font-bold"> Comentario</label>
                        <textarea id="comentario" name="comentario" type="text" placeholder="Agrega un comentario" class="shadow-lg border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
                        @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror

                        <br>
                        <div class="m-5">
                            <input type="submit" value="Comentar" class="bg-black hover:bg-gray-600 shadow-lg transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg" >
                        </div>
                    </div>
                </form>
                @endauth
                
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{route('posts.index',$comentario->user)}}" class="font-bold">{{$comentario->user->username}}</a>
                                <p>{{$comentario->comentario}}</p>
                                <p class="text-sm text-gray-600">{{$comentario->created_at->diffForHumans()}}</p>
                            </div>
                            
                        @endforeach
                    @else
                        <p class="´p-10 text-center uppercase text-gray-500">no hay cometantarios aun</p>
                    @endif

                </div>
            
            </div>
        </div>
        
    </div>
@endsection