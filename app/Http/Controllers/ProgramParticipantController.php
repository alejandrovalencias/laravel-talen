<?php

namespace App\Http\Controllers;

use App\Models\ProgramParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProgramParticipantController extends Controller
{
    /**
     * metodo para mostrarlos todos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = ProgramParticipant::with('program', 'entity')->get(); 
        return response()->json($participants);
    }

    /**
     * Metodo para guardar
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $participant = new ProgramParticipant();

        $validator = Validator::make($request->all(), ProgramParticipant::rulesEntity($request->input('entity_type')));
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $participant = ProgramParticipant::create($request->all());
        return response()->json($participant, 201);
    }

    /**
     * Metodo para consultar un programa en especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participant = ProgramParticipant::with('program', 'entity')->find($id); 

        if (!$participant) {
            return response()->json(['error' => 'Programa participante no encontrado'], 404);
        }

        return response()->json($participant);
    }

    /**
     * Metodo para actualizar programa participante
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), ProgramParticipant::rulesEntity($request->input('entity_type')));

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $participant = ProgramParticipant::find($id);

        if (!$participant) {
            return response()->json(['error' => 'Actualización con exito'], 404);
        }

        $participant->update($request->all());
        return response()->json($participant);
    }

    /**
     * Metodo para eliminar programa participante
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = ProgramParticipant::find($id);

        if (!$participant) {
            return response()->json(['error' => 'Programa participante no encontrado'], 404);
        }

        $participant->delete();
        return response()->json(['message' => 'Programa participante eliminado con exito']);
    }
}
