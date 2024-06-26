@extends('layouts.app')

@section('titulo-tab')
    {{$user->username}}
@endsection


    


@section('contenido')
    <div class="bg-white rounded-2xl mx-9 md:mx-auto md:w-4/5 lg:w-2/4">
        <br>
        <h2 class="font-black text-center text-3xl text-black">Perfil: <text>@</text>{{$user->username}}</h2>

        <div class="md:mx-auto flex justify-center bg-white rounded-2xl p-5 object-center">
            <div class="w-full md:w-8/12 flex flex-col items-center md:flex-row">
                @if ($user->imagen)
                <div class="w-8/12 md:w-6/12 px-5 items-center justify-center">
                    <img src="{{asset('perfiles/'.$user->imagen)}}" class="mx-auto rounded-full" alt="Imagen de usuario">
                </div>
                @else
                <div class="w-8/12 md:w-6/12 px-5 items-center justify-center">
                    <img src="{{asset('img/user_img.png')}}" class="mx-auto" alt="Imagen de usuario">
                </div>
                @endif
                
                <div class="w-8/12 md:w-6/12 px-5 flex flex-col items-center md:items-start md:justify-center pb-8 pt-5 md:py-5">
                    <div class="flex items-center gap-2">
                        <p class="text-gray-700 text-2xl mt-1">{{$user->username}}</p>
                        @auth
                            @if ($user->id === auth()->user()->id)
                                <a href="{{route('perfil.index', $user)}}" class="text-gray-500 hover:text-gray-600 cursor-pointer">


                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                            @endif
                        @endauth
                    </div>
                    
    
                    <p class="text-gray-800 text-sm mb-3 font-bold" href="">{{$user->followers->count()}}<span class="font-normal"> @choice('Seguidor|Seguidores',$user->followers->count())</span></p>
    
                    <p class="text-gray-800 text-sm mb-3 font-bold" href="">{{$user->followings->count()}}<span class="font-normal"> Siguiendo</span></p>
    
                    <p class="text-gray-800 text-sm mb-3 font-bold" href="">{{$user->posts->count()}}<span class="font-normal"> Post</span></p>
                
                @auth
                @if ($user->id !== auth()->user()->id)
                    @if ($user->siguiendo(auth()->user()))
                    <form action="{{route('users.unfollow', $user)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="text-white bg-black text-xs font-bold cursor-pointer p-2 rounded-md" value="Dejar de seguir"/>
                    </form>
                    @else
                    <form action="{{route('users.follow', $user)}}" method="POST">
                        @csrf
                        <input type="submit" class="text-white bg-black text-xs font-bold cursor-pointer p-2 rounded-md" value="Seguir"/>
                    </form>
                    @endif

                    
                @endif

               
                    
                
               
                @endauth
                
                </div>
            </div>
        </div>

    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

    @if ($posts->count())
        
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mx-10 gap-6">
        @foreach ($posts as $post )
        <div>
            <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}" class="hover:no-underline">
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

    <div class="my-10">
        {{$posts->links()}}
    </div>
    </section>
    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No ha publicaciones</p>
    @endif
    <br>
    
@endsection

