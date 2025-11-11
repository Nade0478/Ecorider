<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // Récupérer toutes les images
    public function index()
    {
        $files = Storage::files('public/images');
        $urls = array_map(fn($file) => Storage::url($file), $files);
        return response()->json($urls);
    }

    // Upload d'une image
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Stockage
        $path = $request->file('image')->store('public/images');

        return response()->json([
            'message' => 'Image uploadée avec succès',
            'url' => Storage::url($path)
        ], 201);
    }
}
