<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configurations = Configuration::all();
        return response()->json($configurations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'credits_total' => 'required|integer',
            'credits_inscription' => 'required|integer',
            'date_derniere_maj' => 'required|date',
            'commission_trajet' => 'required|numeric',
        ]);
        $configuration = Configuration::create($request->all());
        return response()->json($configuration, 201)([
            'status' => 'success',
            'data' => $configuration,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Configuration $configuration)
    {
        return response()->json($configuration);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Configuration $configuration)
    {
        $request-> validate([
            'credits_total' => 'sometimes|required|integer',
            'credits_inscription' => 'sometimes|required|integer',
            'date_derniere_maj' => 'sometimes|required|date',
            'commission_trajet' => 'sometimes|required|numeric',
        ]);
        $configuration->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $configuration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuration $configuration)
    {
        $configuration->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Configuration deleted successfully',
        ]);
    }
}
