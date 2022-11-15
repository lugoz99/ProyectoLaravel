<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayersController extends Controller
{
    public function index()
    {
        return response()->json(Player::all(), 200);
    }

    public function show($id)
    {
        $the_player = Player::find($id);
        if (is_null($the_player)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            return response()->json($the_player::find($id), 200);
        }
    }
    public function store(Request $request)
    {
        $the_player = Player::create($request->all());
        return response($the_player, 201);
    }

    public function update(Request $request, $id)
    {
        $the_player = Player::find($id);
        if (is_null($the_player)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_player->update($request->all());
            return response()->json($the_player::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_player = Player::find($id);
        if (is_null($the_player)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_player->delete();
            return response()->json(null, 204);
        }
    }
}
