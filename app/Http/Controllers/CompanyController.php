<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Metodo para mostrar todas las compañias
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with('user')->get(); 
        return response()->json($companies);
    }

    /**
     * Metodo para crear una compañia
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Company::rules());

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $company = Company::create($request->all());
        return response()->json($company, 201);
    }

    /**
     * Metodo para mostrar una compañia
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::with('user')->find($id); 

        if (!$company) {
            return response()->json(['error' => 'Compañia no encontrada'], 404);
        }

        return response()->json($company);
    }

    /**
     * Metodo para actualizar compañia
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Company::rules($id));

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $company = Company::find($id);

        if (!$company) {
            return response()->json(['error' => 'Compañia no encontrada'], 404);
        }

        $company->update($request->all());
        return response()->json($company);
    }

    /**
     * Metodo para eliminar compañia
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['error' => 'Compañia no encontradad'], 404);
        }

        $company->delete();
        return response()->json(['message' => 'Compañia eliminada con exito']);
    }
}
