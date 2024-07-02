<?php

/**
 * Gestion des routes pour l'application DschangEcolo
 *
 * ce fichier contient des routes pour pour l'application DschangEcolo
 *
 * @package Route
 */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



