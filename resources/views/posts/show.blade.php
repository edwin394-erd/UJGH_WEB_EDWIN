@extends('layouts.app')

@section('titulo-tab')
     {{$post->titulo}}
@endsection

@section('contenido')

    <div class="container lg:flex bg-white shadow w-4/5 mx-auto rounded-lg">
        
        <div class="lg:w-3/5">
            <div class="px-5 pt-5 pb-0 md:pb-5 h-full">

                <div class="lg:h-4/4">
                    {{-- IMAGEN --}}
                    <img src="{{asset('uploads'.'/'. $post->imagen)}}" alt="{{$post->titulo}}" class="w-full h-6/6">
                   {{-- LIKES --}}
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
                            <label for="comentario"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mt-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                              </svg>
                              </label>
                            <label for="comentario"><p class="my-1">{{$post->comentarios->count()}} Comentarios</p></label>
                        </div>        

                    </div>
                </div>
            </div>

        </div>
        
        <div class="lg:w-2/5 py-0">
            <div class="px-5 pb-5 pt-0 lg:pt-5 bg-white mb-5 h-full rounded-lg">
                 <div class="container lg:flex flex-col">
                     <div class="flex justify-between mb-2 p-0 align-bottom">
                         <div class="mb-0 items-end">
                            <a href="{{route('posts.index',$post->user)}}" class="font-bold">{{$post->user->username}}</a>
                            <p class=" text-gray-500 mb-0 text-sm">{{$post->created_at->diffForHumans()}}</p>
                        </div>
                  
                  
                        @auth
                            @if (auth()->user()->id === $post->user_id)
                            <div class="relative inline-block text-left">
                            <div>
                              <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                  </svg>
                                  
                              </button>

                             </div>

                             <div class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden " role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <form action="{{route('posts.destroy', $post)}}" method="POST" class="ms-2">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="cursor-pointer">
                                           Eliminar                      
                                        </button>
                                    </form>
                                  
                                </div>
                              </div>
                            </div>
                            @endif
                        @endauth
                  
                    </div>
                 </div>
                <hr>
                 <div class=" bg-white shadow mb-5 overflow-y-scroll mt-2 h-48 lg:h-[220px] xl:h-[440px]">       
                        <hr>   
                        @if ($post->comentarios->count())
                            <div class="p-5 border-gray-300 border-b" style="word-wrap: break-word;">
                                <a href="{{route('posts.index',$post->user)}}" class="font-bold text-sm">{{$post->user->username}}</a>
                                <p class="text-sm">{{$post->descripcion}}</p>
                                <p class="text-sm text-gray-600">{{$post->created_at->diffForHumans()}}</p>
                            </div>
                            @foreach ($post->comentarios as $comentario)
                                <div class="p-5 border-gray-300 border-b" style="word-wrap: break-word;">
                                    <a href="{{route('posts.index',$comentario->user)}}" class="font-bold text-sm">{{$comentario->user->username}}</a>
                                    <p class="text-sm">{{$comentario->comentario}}</p>
                                    <p class="text-sm text-gray-600">{{$comentario->created_at->diffForHumans()}}</p>
                                </div>
                                
                            @endforeach
                        @else
                        <div class="p-5 border-gray-300 border-b" style="word-wrap: break-word;">
                            <a href="{{route('posts.index',$post->user)}}" class="font-bold text-sm">{{$post->user->username}}</a>
                            <p class="text-sm">{{$post->descripcion}}</p>
                            <p class="text-sm text-gray-600">{{$post->created_at->diffForHumans()}}</p>
                        </div>
                            <br><br><br><p class="´p-10 text-center uppercase text-gray-500 align-middle">no hay comentarios aun</p>
                        @endif
                  
                 </div>
        
        
                <div class="h-1/4 mt-1">
                    @auth
                    
                        <form action="{{route('comentarios.store', ['post' => $post, 'user' => $user])}}" method="POST">
                            @csrf
                            

                            <div class="my-5">
                                <label for="comentario" class="mb-2 block text-gray-600 font-bold"> Agrega un comentario</label>
                                @error('comentario')
                                    <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{$message}}</p>
                                @enderror
                                <textarea id="comentario" name="comentario" type="text" placeholder="Agrega un comentario" class="shadow-lg border p-2 w-full rounded-t-lg @error('comentario') border-red-500 @enderror"></textarea>
                                
        
                                <br>
                                <div class="mb-5">
                                    <input type="submit" value="Comentar" class="bg-black hover:bg-gray-600 shadow-lg transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-b-lg" >
                                </div>
                            </div>
                        </form>          
                    
                    @endauth
                </div>
            </div>
        </div>
        
    </div>

    
@endsection


