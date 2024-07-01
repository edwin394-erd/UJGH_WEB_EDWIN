@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    {{-- <x-listar-posts :posts="$posts"/> --}}
    
        
        @if($posts->count())
        @foreach ($posts as $post )
        <div class="container justify-center w-full text-center flex">
            <div class="w-0 lg:w-1/5 xl:w-1/3 h-96"></div>
            <div class="w-full lg:w-3/5 xl:w-1/3 p-5  bg-white rounded-lg shadow-lg mb-5 mx-5">

                <div class="mb-3 items-end flex">
                    <a href="{{route('posts.index',$post->user)}}" class="font-bold">{{$post->user->username}}</a>
                    <p class=" text-gray-500 mb-0 text-sm"> • {{$post->created_at->diffForHumans()}}</p>
                </div>
                
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}" class="hover:no-underline">
                    <div class="relative overflow-hidden">
                    <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post: {{$post->titulo}}" class="">

                    <div class="absolute inset-0 items-center justify-center  flex opacity-0 hover:opacity-100 duration-300 z-20 contenedor-post bg-black bg-opacity-50">
                        <p class="text-center text-white text-xl font-bold" >Abrir</p><br>
                    </div>
                    </div>
                </a>

                <div class="pb-0 flex items-center gap-2">
                    @auth
                        @if ($post->checkLike(auth()->user()))
                            <form action="{{route('posts.likes.destroy', $post)}}" method="POST">
                            @method('DELETE')
                            @csrf
                                <div class="my-2">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mt-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                        
                                    </button>
                                </div>                     
                            </form>
                        @else
                            <form action="{{route('posts.likes.store', $post)}}" method="POST">
                            @csrf
                                <div class="my-2">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mt-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                        
                                    </button>
                                </div>                     
                            </form>
                        @endif
                    @endauth
                    <p class="my-1">{{$post->likes->count()}} likes</p>

                    <div class="my-2 flex gap-2">
                        <a href="{{route('posts.show', ['post' => $post, 'user' => $post->user])}}" for="comentario"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mt-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                          </svg>
                        </a>
                        <label for="comentario"><p class="my-1">{{$post->comentarios->count()}} Comentarios</p></label>
                    </div>        
                    </div>        

            
            </div>
            <div class="w-0 lg:w-1/5 xl:w-1/3 h-96"></div>
        </div>
        @endforeach

            {{-- @foreach ($posts as $post )
            <div>
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}" class="hover:no-underline">
                    <div class="relative overflow-hidden">
                    <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post: {{$post->titulo}}" class="">

                    <div class="absolute inset-0 items-center justify-center  flex opacity-0 hover:opacity-100 duration-300 z-20 contenedor-post bg-black bg-opacity-50">
                        <p class="text-center text-white text-xl font-bold" >Abrir</p><br>
                    </div>
                    </div>
                </a>
            </div>

        
            @endforeach
        </div>
        <div class="w-1/3"></div>
        </div>
        <div class="my-10">
            {{$posts->links()}}
        </div> --}}

        
        @else
            <h1 class="text-center">No hay posts</h1>
        @endif
        
    
    

    

   
@endsection
   
