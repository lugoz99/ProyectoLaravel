<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\playerTeam;

class PlayerTeamsController extends Controller
{
    public function index()
    {
        return response()->json(playerTeam::all(), 200);
    }

    public function show($id)
    {
        $the_player_teams = playerTeam::find($id);
        if (is_null($the_player_teams)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            return response()->json($the_player_teams::find($id), 200);
        }
    }
    public function store(Request $request)
    {
        $the_player_teams = playerTeam::create($request->all());
        return response($the_player_teams, 201);
    }

    public function update(Request $request, $id)
    {
        $the_player_teams = playerTeam::find($id);
        if (is_null($the_player_teams)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_player_teams->update($request->all());
            return response()->json($the_player_teams::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_player_teams = playerTeam::find($id);
        if (is_null($the_player_teams)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_player_teams->delete();
            return response()->json(null, 204);
        }
    }
}
