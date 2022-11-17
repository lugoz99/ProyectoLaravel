<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        return response()->json(Reservation::all(), 200);
    }

    public function show($id)
    {
        $the_reservation = Reservation::find($id);
        if (is_null($the_reservation)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_reservation= Reservation::with('elementos')->get()->find($id);
            return response()->json($the_reservation,200);
        }
    }
    public function store(Request $request)
    {
        $the_reservation = Reservation::create($request->all());
        return response($the_reservation, 201);
    }

    public function update(Request $request, $id)
    {
        $the_reservation = Reservation::find($id);
        if (is_null($the_reservation)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_reservation->update($request->all());
            return response()->json($the_reservation::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_reservation = Reservation::find($id);
        if (is_null($the_reservation)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_reservation->delete();
            return response()->json(null, 204);
        }
    }
}
