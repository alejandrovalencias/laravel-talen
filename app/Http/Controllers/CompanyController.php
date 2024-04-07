<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $company = Company::create($request->all());
        return response()->json($company, 201);
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());
        return response()->json($company, 200);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->json(null, 204);
    }
}