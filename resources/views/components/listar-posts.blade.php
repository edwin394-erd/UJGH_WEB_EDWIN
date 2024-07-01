<div>
    @if($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mx-10 gap-6">
        @foreach ($posts as $post )
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

    <div class="my-10">
        {{$posts->links()}}
    </div>
    @else
        <h1 class="text-center">No hay posts</h1>
    @endif
</div>