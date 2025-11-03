<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Covoiturage;
use Illuminate\Http\Request;

class CovoiturageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $covoiturages = Covoiturage::all();
        return response()->json($covoiturages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'date_depart' => 'required|date',
            'date_arrivee' => 'required|date|after_or_equal:date_depart',
            'places_disponibles' => 'required|integer|min:1',
            'places_restantes' => 'required|integer|min:0',
            'prix' => 'required|numeric|min:0',
            'statut' => 'required|string|max:50',
            'statut_ecologique' => 'required|string|max:50',
            'chauffeur_id' => 'required|exists:users,id',
        ]);
        $covoiturage = Covoiturage::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $covoiturage,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Covoiturage $covoiturage)
    {
        return response()->json($covoiturage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Covoiturage $covoiturage)
    {
        $request-> validate([
            'ville_depart' => 'sometimes|required|string|max:255',
            'ville_arrivee' => 'sometimes|required|string|max:255',
            'date_depart' => 'sometimes|required|date',
            'date_arrivee' => 'sometimes|required|date|after_or_equal:date_depart',
            'places_disponibles' => 'sometimes|required|integer|min:1',
            'places_restantes' => 'sometimes|required|integer|min:0',
            'prix' => 'sometimes|required|numeric|min:0',
            'statut' => 'sometimes|required|string|max:50',
            'statut_ecologique' => 'sometimes|required|string|max:50',
            'chauffeur_id' => 'sometimes|required|exists:users,id',
        ]);
        $covoiturage->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $covoiturage,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Covoiturage $covoiturage)
    {
        $covoiturage->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Covoiturage deleted successfully',
        ]);
    }
}
