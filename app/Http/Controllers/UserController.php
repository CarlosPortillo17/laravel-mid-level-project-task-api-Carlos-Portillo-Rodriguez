<?php

namespace App\Http\Controllers;

use App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //para listar usuarios
    public function index()
    {
        return responde()->json(User::all(),200);
    }

    //para mostrar usuario por id
    public function show($id){

        $user = User::find($id);

        if (! $user) {
            return response()->json(['message' => 'Usuario no existe'], 404);
        }
        return response()->json($user,200);
    }

    //crear nuevo usuario

    public function store (Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        return response()->json($user,201);
    }

    public function update(Request $request, $id)
     {
        $user = User::find($id);
        if (! $user) {
            return response()->json(['message' => 'Usuario no existe'],400);
        }

        $data = $request->only(['name','email']);
        if ($request->filled('password')){
            $data ['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return response()->json($user, 200);

    }

    //eliminar usuario
    public function destroy($id)
    {
    $user = User::find($id); 
    
    if(! $user) {
        return response()->json(['message'=>'usuario no existe'],400);

    }
        $user->delete();
        return response()->json(['message' =>'usuario eliminado'],200);
    }

}