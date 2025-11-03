<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = Avis::all();
        return response()->json($requests);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'auteur_id' => 'required|integer',
            'validateur_id' => 'required|integer',
            'covoiturage_id' => 'required|integer',
            'concerne_id' => 'required|integer',
            'note' => 'required|integer|min:0|max:5',
            'commentaire' => 'nullable|string',
            'statut_vide' => 'required|boolean',
            'date_creation' => 'required|date',
            'date_validation' => 'nullable|date',
        ]);

        $avis = Avis::create($request->all());
        return response()->json($avis, 201)([
            'status' => 'success',
            'data' => $avis
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Avis $avis)
    {
        return response()->json($avis);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avis $avis)
    {
        $request->validate([
            'auteur_id' => 'sometimes|integer',
            'validateur_id' => 'sometimes|integer',
            'covoiturage_id' => 'sometimes|integer',
            'concerne_id' => 'sometimes|integer',
            'note' => 'sometimes|integer|min:0|max:5',
            'commentaire' => 'nullable|string',
            'statut_vide' => 'sometimes|boolean',
            'date_creation' => 'sometimes|date',
            'date_validation' => 'nullable|date',
        ]);

        $avis->update($request->all());
        return response()->json($avis)([
            'status' => 'success',
            'data' => $avis
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avis $avis)
    {
        $avis->delete();
        return response()->json(null, 204)([
            'status' => 'success',
        ]);
    }
}
