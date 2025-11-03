<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Administrateur;
use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrateurs = Administrateur::all();
        return response()->json($administrateurs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pseudo' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:administrateurs',
            'password' => 'required|string|min:8',
        ]);

        $administrateur = Administrateur::create([
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $administrateur,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrateur $administrateur)
    {
        return response()->json($administrateur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrateur $administrateur)
    {
        $request->validate([
            'pseudo' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:administrateurs,email,' . $administrateur->id,
            'password' => 'sometimes|required|string|min:8',
        ]);

        if ($request->has('pseudo')) {
            $administrateur->pseudo = $request->pseudo;
        }
        if ($request->has('email')) {
            $administrateur->email = $request->email;
        }
        if ($request->has('password')) {
            $administrateur->password = bcrypt($request->password);
        }

        $administrateur->save();

        return response()->json([
            'status' => 'success',
            'data' => $administrateur,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrateur $administrateur)
    {
        $administrateur->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Administrateur deleted successfully',
        ]);
    }
}
