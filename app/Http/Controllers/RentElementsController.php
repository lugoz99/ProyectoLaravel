<?php

namespace App\Http\Controllers;

use App\Models\RentElement as ModelsRentElement;
use Illuminate\Http\Request;

class RentElementsController extends Controller
{
    public function index()
    {
        return response()->json(ModelsRentElement::all(), 200);
    }

    public function show($id)
    {
        $the_reservation = ModelsRentElement::find($id);
        if (is_null($the_reservation)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            return response()->json($the_reservation::find($id), 200);
        }
    }
    public function store(Request $request)
    {
        $the_reservation = ModelsRentElement::create($request->all());
        return response($the_reservation, 201);
    }

    public function update(Request $request, $id)
    {
        $the_reservation = ModelsRentElement::find($id);
        if (is_null($the_reservation)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_reservation->update($request->all());
            return response()->json($the_reservation::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_reservation = ModelsRentElement::find($id);
        if (is_null($the_reservation)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_reservation->delete();
            return response()->json(null, 204);
        }
    }
}
