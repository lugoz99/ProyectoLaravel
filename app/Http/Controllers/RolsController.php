<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolsController extends Controller
{
    public function index()
    {
        return response()->json(Rol::all(), 200);
    }

    public function show($id)
    {
        $the_role = Rol::find($id);
        if (is_null($the_role)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_role->users;
            //$the_role->permissions;
            return response()->json($the_role, 200);
        }
    }
    public function store(Request $request)
    {
        $the_role = Rol::create($request->all());
        return response($the_role, 201);
    }

    public function update(Request $request, $id)
    {
        $the_role = Rol::find($id);
        if (is_null($the_role)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_role->update($request->all());
            return response()->json($the_role::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_role = Rol::find($id);
        if (is_null($the_role)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_role->delete();
            return response()->json(null, 204);
        }
    }
}
