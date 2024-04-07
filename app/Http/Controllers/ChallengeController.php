<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index()
    {
        return Challenge::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'difficulty' => 'required|integer',
            'user_id' => 'required|exists:users,id',
        ]);

        return Challenge::create($request->all());
    }

    public function show($id)
    {
        return Challenge::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'difficulty' => 'required|integer',
                'user_id' => 'required|exists:users,id',
            ], [
                'user_id.exists' => 'El user_id especificado no existe.',
            ]);

            $challenge = Challenge::findOrFail($id);
            $challenge->update($request->all());
            return $challenge;
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo actualizar el id:' . $id, 'msg' => $e->validator->customMessages], 500);
        }
    }

    public function destroy($id)
    {
        $challenge = Challenge::findOrFail($id);
        $challenge->delete();

        return response()->json(null, 204);
    }
}
