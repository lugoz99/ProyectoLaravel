<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FieldType;
use Exception;

class FieldTypeController extends Controller
{
    public function index()
    {
        return response()->json(FieldType::all(), 200);
    }

    public function show($id)
    {
        $the_field_type = FieldType::find($id);
        if (is_null($the_field_type)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            //$the_field_type->profile;
            // $the_field_type->rol;
            return response()->json($the_field_type::find($id), 200);
        }
    }
    public function store(Request $request)
    {
        $the_role = FieldType::create($request->all());
        return response($the_role, 201);
    }

    public function update(Request $request, $id)
    {
        $the_field_type = FieldType::find($id);
        if (is_null($the_field_type)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_field_type->update($request->all());
            return response()->json($the_field_type::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_field_type = FieldType::find($id);
        if (is_null($the_field_type)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_field_type->delete();
            return response()->json(null, 204);
        }
    }
}
