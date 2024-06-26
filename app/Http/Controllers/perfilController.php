<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class perfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('perfil.index');
    }

    public function store(Request $request){

        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request,[
            'username' => ['required', 'max:30','unique:users,username, '. auth()->user()->id,'min:3','max:20','not_in:editar-perfil'],
            'email' => ['required','unique:users,email, '. auth()->user()->id,'max:30','email','max:60'],            
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen'); // Usa la instancia de Request, no la fachada
            $nombreImagen = Str::uuid() . "." . $imagen->getClientOriginalExtension();

            // Crea una nueva instancia de ImageManager con el driver de GD
            $manager = new ImageManager(array('driver' => 'gd'));

            // Usa el manager para crear una instancia de la imagen
            $imagenServidor = $manager->make($imagen)->fit(1000, 1000);
        
            // Guarda la imagen en el disco
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }
            
            $usuario= User::find(auth()->user()->id);
            $usuario->username = $request->username;
            $usuario->email = $request->email;
            $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
            $usuario->save();

            return redirect()->route('posts.index', $usuario->username);
    }
    
}
