<?php

use App\Http\Controllers\API\AdministrateurController;
use App\Http\Controllers\API\AvisController;
use App\Http\Controllers\API\ConfigurationController;
use App\Http\Controllers\API\CovoiturageController;
use App\Http\Controllers\API\EmployeController;
use App\Http\Controllers\API\ParticipationController;
use App\Http\Controllers\API\PreferenceController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VehiculeController;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });
    Route::apiResource('Users', UserController::class);
    Route::apiResource('Covoiturages', CovoiturageController::class);
    Route::apiResource('Participations', ParticipationController::class);
    Route::apiResource('Configurations', ConfigurationController::class);
    Route::apiResource('Employes', EmployeController::class);
    Route::apiResource('Administrateurs', AdministrateurController::class);
    Route::apiResource('Vehicules', VehiculeController::class);
    Route::apiResource('Preferences', PreferenceController::class);
    Route::apiResource('Avis', AvisController::class);

    //Routes pour l'authentification accesible à tous

    Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login']);

    //Route d'authentification seulement accessible avec le JWT
    Route::middleware('auth:api')->group(function () {
        Route::get('/currentuser', [App\Http\Controllers\API\UserController::class, 'currentUser']);
        Route::post('logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    });

