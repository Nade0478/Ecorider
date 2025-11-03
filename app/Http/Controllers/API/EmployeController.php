<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::all();
        return response()->json($employes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'pseudo' => 'required|string|max:255|unique:employes',
            'email' => 'required|string|email|max:255|unique:employes',
            'password' => 'required|string|min:6',
            'statut_suspendu' => 'sometimes|string|in:oui,non',
        ]);
        $employe = Employe::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $employe,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        return response()->json($employe);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employe $employe)
    {
        $request-> validate([
            'pseudo' => 'sometimes|required|string|max:255|unique:employes,pseudo,' . $employe->id,
            'email' => 'sometimes|required|string|email|max:255|unique:employes,email,' . $employe->id,
            'password' => 'sometimes|required|string|min:6',
            'statut_suspendu' => 'sometimes|string|in:oui,non',
        ]);
        $employe->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $employe,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Employe deleted successfully',
        ]);
    }
}
