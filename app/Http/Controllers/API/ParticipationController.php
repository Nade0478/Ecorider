<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Participation;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participations = Participation::all();
        return response()->json($participations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'covoiturage_id' => 'required|integer|exists:covoiturages,id',
            'passager_id' => 'required|integer|exists:users,id',
            'date_reservation' => 'required|date',
            'credits_utilises' => 'sometimes|integer|min:0',
            'statut' => 'required|string|max:255',
            'validation_trajet' => 'sometimes|boolean',
            'commentaires' => 'sometimes|string|nullable',
        ]);
        $participation = Participation::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $participation,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Participation $participation)
    {
        return response()->json($participation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participation $participation)
    {
        $request-> validate([
            'covoiturage_id' => 'sometimes|required|integer|exists:covoiturages,id',
            'passager_id' => 'sometimes|required|integer|exists:users,id',
            'date_reservation' => 'sometimes|required|date',
            'credits_utilises' => 'sometimes|integer|min:0',
            'statut' => 'sometimes|required|string|max:255',
            'validation_trajet' => 'sometimes|boolean',
            'commentaires' => 'sometimes|string|nullable',
        ]);
        $participation->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $participation,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participation $participation)
    {
        $participation->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Participation deleted successfully',
        ]);
    }
}
