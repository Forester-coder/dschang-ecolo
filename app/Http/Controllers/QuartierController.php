<?php

namespace App\Http\Controllers;

use App\Models\Quartier;
use Illuminate\Http\Request;

class QuartierController extends Controller
{
    /**
     * Affiche une liste de tous les quartiers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupère tous les quartiers de la base de données
        $quartiers = Quartier::all();

        // Retourne la vue index avec les quartiers
        return view('quartiers.index', compact('quartiers'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau quartier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retourne la vue de création d'un quartier
        return view('quartiers.create');
    }

    /**
     * Enregistre un nouveau quartier dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|unique:quartiers|max:255',
            'description' => 'required|string',
        ]);

        // Crée un nouveau quartier avec les données validées
        Quartier::create($validated);

        // Redirige vers l'index avec un message de succès
        return redirect()->route('quartiers.index')->with('success', 'Quartier créé avec succès.');
    }

    /**
     * Affiche un quartier spécifique.
     *
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function show(Quartier $quartier)
    {
        // Retourne la vue d'affichage d'un quartier spécifique
        return view('quartiers.show', compact('quartier'));
    }

    /**
     * Affiche le formulaire pour éditer un quartier spécifique.
     *
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function edit(Quartier $quartier)
    {
        // Retourne la vue de modification d'un quartier spécifique
        return view('quartiers.edit', compact('quartier'));
    }

    /**
     * Met à jour un quartier spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quartier $quartier)
    {
        // Valide les données du formulaire de modification
        $validated = $request->validate([
            'nom' => 'required|string|unique:quartiers,nom,' . $quartier->id . '|max:255',
            'description' => 'required|string',
        ]);

        // Met à jour le quartier avec les données validées
        $quartier->update($validated);

        // Redirige vers l'index avec un message de succès
        return redirect()->route('quartiers.index')->with('success', 'Quartier mis à jour avec succès.');
    }

    /**
     * Supprime un quartier spécifique de la base de données.
     *
     * @param  \App\Models\Quartier  $quartier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quartier $quartier)
    {
        // Supprime le quartier
        $quartier->delete();

        // Redirige vers l'index avec un message de succès
        return redirect()->route('quartiers.index')->with('success', 'Quartier supprimé avec succès.');
    }
}
