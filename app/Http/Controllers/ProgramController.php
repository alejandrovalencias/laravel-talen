<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    /**
     * Metodo para mostrar lista de todos los programas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::with('user')->get();
        return response()->json($programs);
    }

    /**
     * Metodo para almacenar programas
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Program::rules());

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $program = Program::create($request->all());
        return response()->json($program, 201);
    }

    /**
     * Metodo para consultar programa especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::with('user')->find($id);
        if (!$program) {
            return response()->json(['error' => 'Programa no encontrado'], 404);
        }

        return response()->json($program);
    }

    /**
     * Metodo para actualizar programa
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Program::rules($id));

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $program = Program::find($id);

        if (!$program) {
            return response()->json(['error' => 'Programa no encontrado'], 404);
        }

        $program->update($request->all());
        return response()->json($program);
    }

    /**
     * Metodo para eliminar programa
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json(['error' => 'Programa no encontrado'], 404);
        }

        $program->delete();
        return response()->json(['message' => 'Programa creado con exito']);
    }
}
