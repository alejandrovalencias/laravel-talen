<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ChallengeController extends Controller
{
    /**
     * Metodo para mostrar todos los retos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = Challenge::with('user')->get();
        return response()->json($challenges);
    }

    /**
     * Metodo para crear nuevo reto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Challenge::rules());

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $challenge = Challenge::create($request->all());
        return response()->json($challenge, 201);
    }

    /**
     * Metodo para mostrar especifico reto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $challenge = Challenge::with('user')->find($id);

        if (!$challenge) {
            return response()->json(['error' => 'Reto no encontrado'], 404);
        }

        return response()->json($challenge);
    }

    /**
     * Metodo para actualizar
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Challenge::rules($id));

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $challenge = Challenge::find($id);

        if (!$challenge) {
            return response()->json(['error' => 'Reto no encontrado'], 404);
        }

        $challenge->update($request->all());
        return response()->json($challenge);
    }

    /**
     * Metodo para eliminar
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $challenge = Challenge::find($id);

        if (!$challenge) {
            return response()->json(['error' => 'Reto no encontrado'], 404);
        }

        $challenge->delete();
        return response()->json(['message' => 'Reto eliminado con exito']);
    }
}
