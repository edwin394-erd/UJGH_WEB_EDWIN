<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request; // Asegúrate de importar la clase Request

class ImagenController extends Controller
{
    public function store(Request $request) // Inyecta la instancia de Request aquí
    {
        $imagen = $request->file('file'); // Usa la instancia de Request, no la fachada
        $nombreImagen = Str::uuid() . "." . $imagen->getClientOriginalExtension();

        // Crea una nueva instancia de ImageManager con el driver de GD
        $manager = new ImageManager(array('driver' => 'gd'));

        // Usa el manager para crear una instancia de la imagen
        $imagenServidor = $manager->make($imagen)->fit(1000, 1000);

        // Guarda la imagen en el disco
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json([
            'imagen' => $nombreImagen,
        ]);

        
    }
}
