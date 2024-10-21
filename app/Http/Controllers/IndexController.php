<?php

namespace App\Http\Controllers;

use App\Models\PostDechet;
use App\Models\Subscriber;
use Illuminate\Http\Request;

/**
 * ce controlleur permet de gerer la pade index de notre site web
 */
class IndexController extends Controller
{
    /**
     * cette fonction permet retourner la page index avec tout les donneé relative a cette page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    function index()
    {
        $postDechets = PostDechet::with('user', 'images')->orderBy('created_at', 'desc')->paginate(8);
        return view('welcome', compact('postDechets'));
    }


    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Logique pour enregistrer l'email dans la base de données
        Subscriber::create(['email' => $request->email]);

        return back()->with('success', 'Merci pour votre inscription à notre newsletter !');
    }
}
