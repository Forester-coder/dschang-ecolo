<?php
/**
 * Gestion des routes pour l'application DschangEcolo
 *
 * ce fichier contient des routes API RestFull  pour l'application DschangEcolo
 *
 * @package Routes
 */

use App\Http\Controllers\MoyenPaiementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeAbonnementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('roles', RoleController::class);

Route::apiResource('typeAbonnements' , TypeAbonnementController::class);

Route::apiResource('moyenPaiements' , MoyenPaiementController::class);

