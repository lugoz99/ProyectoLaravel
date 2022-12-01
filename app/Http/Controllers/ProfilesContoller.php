<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfilesContoller extends Controller
{
    public function index()
    {
        return response()->json(Profile::all(), 200);
    }

    public function show($id)
    {
        $the_profile = Profile::find($id);
        if (is_null($the_profile)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            return response()->json($the_profile::find($id), 200);
        }
    }
    public function store(Request $request)
    {
        $url = "";
        if ($request->file('image') && ($request->file('image')->getClientOriginalExtension() == "jpg"
            || $request->file('image')->getClientOriginalExtension() == "png")) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->user_id . "-" . time() . '.' . $extension;
            $url = $file->move("avatars", $filename);
            error_log('url->' . $url);
        } else {
            return response(['message' => 'se debe cargar una imagen'], 400);
        }

        $the_profile = Profile::where('user_id', "=", $request->user_id)->first();
        if (is_null($the_profile)) {
            $data = $request->all();
            $data["url_avatar"] = $url;
            $the_profile = Profile::create($data);
            $the_profile = Profile::find($the_profile->id);
            return response($the_profile, 201);
        }
    }

    public function update(Request $request, $id)
    {
        $the_profile = Profile::find($id);
        if (is_null($the_profile)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_profile->update($request->all());
            return response()->json($the_profile::find($id), 200);
        }
    }
    public function destroy(Request $request, $id)
    {
        $the_profile = Profile::find($id);
        if (is_null($the_profile)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_profile->delete();
            return response()->json(null, 204);
        }
    }
}
