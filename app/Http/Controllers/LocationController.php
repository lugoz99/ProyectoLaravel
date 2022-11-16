<?php

namespace App\Http\Controllers;

use App\Models\Location as ModelsLocation;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        return response()->json(ModelsLocation::all(), 200);
    }

    public function show($id)
    {
        $the_location = ModelsLocation::find($id);
        if (is_null($the_location)){
            return response()->json(['message' => 'Not found'], 404);
        } else {
            //$the_field_type->profile;
            // $the_field_type->rol;
            return response()->json( $the_location::find($id), 200);
        }
    }
    public function store(Request $request)
    {
        $the_location = ModelsLocation::create($request->all());
        return response($the_location, 201);
    }

    public function update(Request $request, $id)
    {
        $the_location= ModelsLocation::find($id);
        if (is_null( $the_location)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_location->update($request->all());
            return response()->json( $the_location::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_location= ModelsLocation::find($id);
        if (is_null($the_location)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_location->delete();
            return response()->json(null, 204);
        }
    }
}
