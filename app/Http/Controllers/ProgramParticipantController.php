<?php

namespace App\Http\Controllers;

use App\Models\ProgramParticipant;
use Illuminate\Http\Request;

class ProgramParticipantController extends Controller
{
    public function index()
    {
        $participants = ProgramParticipant::all();
        return response()->json($participants);
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'entity_type' => 'required|string|max:50',
            'entity_id' => 'required|exists:users,id',
        ]);

        $participant = ProgramParticipant::create($request->all());
        return response()->json($participant, 201);
    }

    public function show($id)
    {
        $participant = ProgramParticipant::findOrFail($id);
        return response()->json($participant);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'entity_type' => 'required|string|max:50',
            'entity_id' => 'required|exists:users,id',
        ]);

        $participant = ProgramParticipant::findOrFail($id);
        $participant->update($request->all());
        return response()->json($participant, 200);
    }

    public function destroy($id)
    {
        $participant = ProgramParticipant::findOrFail($id);
        $participant->delete();
        return response()->json(null, 204);
    }
}
