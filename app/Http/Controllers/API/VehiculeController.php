<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        return response()->json($vehicules);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:' . date('Y'),
            'couleur' => 'required|string|max:100',
            'immatriculation' => 'required|string|max:20|unique:vehicules,immatriculation',
            'nombre_places' => 'required|integer|min:1',
            'type_vehicule' => 'required|string|max:100',
        ]);

        $vehicule = Vehicule::create($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $vehicule,
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicule $vehicule)
    {
        return response()->json($vehicule);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'user_id' => 'sometimes|required|integer|exists:users,id',
            'marque' => 'sometimes|required|string|max:255',
            'modele' => 'sometimes|required|string|max:255',
            'annee' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
            'couleur' => 'sometimes|required|string|max:100',
            'immatriculation' => 'sometimes|required|string|max:20|unique:vehicules,immatriculation,' . $vehicule->id,
            'nombre_places' => 'sometimes|required|integer|min:1',
            'type_vehicule' => 'sometimes|required|string|max:100',
        ]);

        $vehicule->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $vehicule,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
