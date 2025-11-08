<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\JWTGuard;

class UserController extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get current authenticated user
     */
    public function currentUser()
    {
        /** @var JWTGuard $auth */
        $auth = auth();

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'User fetched successfully!',
            ],
            'data' => [
                'user' => $auth->user(),
            ],
        ]);
    }

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
            'photo' => 'nullable|image|max:2048',
            'credits' => 'nullable|integer',
            'statut_chauffeur' => 'nullable|string|max:50',
            'statut_passager' => 'nullable|string|max:50',
            'statut_suspendu' => 'nullable|boolean',
            'statut_inscription' => 'nullable|string|max:50',
            'date_inscription' => 'nullable|date',
        ]);

        $filename = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/photos', $filename);
        }

        $user = User::create([
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'photo' => $filename,
            'credits' => $request->credits ?? 0,
            'statut_chauffeur' => $request->statut_chauffeur ?? 'active',
            'statut_passager' => $request->statut_passager ?? 'active',
            'statut_suspendu' => $request->statut_suspendu ?? false,
            'statut_inscription' => $request->statut_inscription ?? 'valide',
            'date_inscription' => $request->date_inscription,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $user,
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
            'photo' => 'nullable|image|max:2048',
            'credits' => 'nullable|integer',
            'statut_chauffeur' => 'nullable|string|max:50',
            'statut_passager' => 'nullable|string|max:50',
            'statut_suspendu' => 'nullable|boolean',
            'statut_inscription' => 'nullable|string|max:50',
            'date_inscription' => 'nullable|date',
        ]);

        if ($request->has('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/photos', $filename);
            $request->merge(['photo' => $filename]);
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