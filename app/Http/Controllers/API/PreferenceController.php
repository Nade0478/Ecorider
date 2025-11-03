<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Preference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preferences = Preference::all();
        return response()->json($preferences);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'user_id' => 'required|integer|exists:users,id',
            'propriete' => 'required|string|max:255',
            'valeur' => 'required|string|max:255',
        ]);
        $preference = Preference::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $preference,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Preference $preference)
    {
        return response()->json($preference);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Preference $preference)
    {
        $request-> validate([
            'user_id' => 'sometimes|required|integer|exists:users,id',
            'propriete' => 'sometimes|required|string|max:255',
            'valeur' => 'sometimes|required|string|max:255',
        ]);
        $preference->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $preference,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Preference $preference)
    {
        $preference->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Preference deleted successfully',
        ]);
    }
}
