<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pseudo' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
            'credits' => 'nullable|integer',
            'statut_chauffeur' => 'nullable|string|max:50',
            'statut_Passager' => 'nullable|string|max:50',
            'statut_suspendu' => 'nullable|string|max:50',
            'statut_inscription' => 'nullable|string|max:50',
            'date_inscription' => 'nullable|date',
        ]);

        $filename = "";
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/photos', $filename);
        }
        else {
            $filename = null;
        }

        $user = User::create(array_merge($request->all(), ['photo' => $filename]));

        return response()->json([
            'status' => 'success',
            'data' => $user,
        ], 201);

        $user = User::create([
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'photo' => $request->photo,
            'credits' => $request->credits ?? 0,
            'statut_chauffeur' => $request->statut_chauffeur ?? 'active',
            'statut_Passager' => $request->statut_Passager ?? 'active',
            'statut_suspendu' => $request->statut_suspendu ?? 'non',
            'statut_inscription' => $request->statut_inscription ?? 'valide',
            'date_inscription' => $request->date_inscription,
        ]);

        return response()->json([
            'status' => 'success',
            'date' => $user,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'pseudo' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
            'credits' => 'nullable|integer',
            'statut_chauffeur' => 'nullable|string|max:50',
            'statut_Passager' => 'nullable|string|max:50',
            'statut_suspendu' => 'nullable|string|max:50',
            'statut_inscription' => 'nullable|string|max:50',
            'date_inscription' => 'nullable|date',
        ]);

        if ($request->has('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        }

        $user->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully',
        ]);
    }
}
