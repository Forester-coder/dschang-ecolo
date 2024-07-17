<?php

/**
 * Gestion des routes pour l'application DschangEcolo
 *
 * ce fichier contient des routes pour l'application DschangEcolo
 *
 * @package Routes
 */

use App\Http\Controllers\AdminDashbord;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepotoirController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MTNPaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostDechetController;
use App\Http\Controllers\QuartierController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TypeAbonnementController;
use App\Http\Controllers\UserController;
use App\Models\TypeAbonnement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/admin-dashbord', [AdminDashbord::class, 'index'])->name('admin.dashbord');
Route::post('/subscribe', [IndexController::class, 'subscribe'])->name('subscribe');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('quartiers', QuartierController::class);


Route::get('/depotoirs/coordinates', [DepotoirController::class, 'getCoordinates'])->name('depotoirs.coordinates');
Route::resource('depotoirs', DepotoirController::class);

Route::get('/map', [MapController::class, 'showMap'])->name('map.show');


Route::get('/typeAbonnements', [TypeAbonnementController::class, 'selectTypeAbonnement'])->name('typeAbonnements.select');


Route::Resource('post-dechets', PostDechetController::class);


Route::resource('notifications', NotificationController::class);


Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');



Route::resource('users', UserController::class);


Route::get('/apropos', function () {
    return view('apropos');
})->name('apropos');





Route::get('mtn/payment', [MTNPaymentController::class, 'showPaymentForm'])->name('mtn.payment.form');
Route::post('mtn/payment', [MTNPaymentController::class, 'initiatePayment'])->name('mtn.payment.initiate');
Route::get('mtn/payment/status', [MTNPaymentController::class, 'checkPaymentStatus'])->name('mtn.payment.status');
