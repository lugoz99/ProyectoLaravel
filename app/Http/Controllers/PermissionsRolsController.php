<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permissionRol;

class PermissionsRolsController extends Controller
{
    public function index()
    {
        return response()->json(permissionRol::all(), 200);
    }

    public function show($id)
    {
        $the_permisionsRols = permissionRol::find($id);
        if (is_null($the_permisionsRols)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            return response()->json($the_permisionsRols::find($id), 200);
        }
    }
    public function store(Request $request)
    {
        $the_permisionsRols = permissionRol::create($request->all());
        return response($the_permisionsRols, 201);
    }

    public function update(Request $request, $id)
    {
        $the_permisionsRols = permissionRol::find($id);
        if (is_null($the_permisionsRols)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_permisionsRols->update($request->all());
            return response()->json($the_permisionsRols::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_permisionsRols = permissionRol::find($id);
        if (is_null($the_permisionsRols)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_permisionsRols->delete();
            return response()->json(null, 204);
        }
    }
}
