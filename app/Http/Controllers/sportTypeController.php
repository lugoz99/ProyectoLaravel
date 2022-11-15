<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sportType;

class sportTypeController extends Controller
{
    public function index()
    {
        return response()->json(sportType::all(), 200);
    }

    public function show($id)
    {
        $the_sport_type = sportType::find($id);
        if (is_null($the_sport_type)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            return response()->json($the_sport_type::find($id), 200);
        }
    }
    public function store(Request $request)
    {
        $the_sport_type = sportType::create($request->all());
        return response($the_sport_type, 201);
    }

    public function update(Request $request, $id)
    {
        $the_sport_type = sportType::find($id);
        if (is_null($the_sport_type)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_sport_type->update($request->all());
            return response()->json($the_sport_type::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_sport_type = sportType::find($id);
        if (is_null($the_sport_type)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_sport_type->delete();
            return response()->json(null, 204);
        }
    }
}
