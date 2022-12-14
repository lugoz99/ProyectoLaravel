<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class UsersController extends Controller
{
    public function index()
    {
        $the_user = User::with('role')->get();
        return response()->json($the_user, 200);
    }

    public function show($id)
    {
        $the_user = User::find($id);
        if (is_null($the_user)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            //$the_user->profile;
            $the_user = User::with(['role','teams'])->get()->find($id);
            return response()->json($the_user, 200);
        }
    }
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'rol_id' => 'required'
            ]);
            $data['password'] = bcrypt($request->password); // Proceso de encriptacion de la contraseña
            $user = User::create($data);
            //error_log('user ' .$user);
            $token = $user->createToken('API Token')->accessToken;
             // Cada que se crea un usuario se le va a generar un Token
            return response(['user' => $user, 'token' =>$token]);
        } catch (Exception $e) {
            error_log(' ' . $e->getMessage());
            return response(['data' => "Data incomplete "], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $the_user = User::find($id);
        if (is_null($the_user)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_user->update($request->all());
            return response()->json($the_user::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_user = User::find($id);
        if (is_null($the_user)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_user->delete();
            return response()->json(null, 204);
        }
    }
}
