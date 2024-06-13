<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){
        //dd($request); 

        $request->request->add(['username' => Str::slug($request->username)]);

        //validacion
        $this->validate($request,[
            'name' => 'required|max:30',
            'username' => 'required|max:30|unique:users|min:3|max:20',
            'email' => 'required|unique:users|max:30|email|max:60',
            'password' => 'required|min:6|max:25|confirmed'
        ]);

    User::create([
        'name' =>$request->name,
        'username' =>Str::slug($request->username),
        'email' =>$request->email,
        'password' =>Hash::make($request->password)
    ]);

    return redirect()->route('login')->with('msg_registroExitoso', 'Registro exitoso, ya puedes iniciar sesión');;

    }
}

