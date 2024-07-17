<?php

namespace App\Http\Controllers;

use App\Models\Depotoir;
use App\Models\Quartier;
use Illuminate\Http\Request;


/**
 * Classe DepotoirController
 *
 * Contrôleur pour gérer les opérations CRUD pour les dépotoirs.
 */
class DepotoirController extends Controller
{
    /**
     * Affiche une liste de tous les dépotoirs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depotoirs = Depotoir::with('quartier')->get();
        return view('depotoirs.index', compact('depotoirs'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau dépotoir.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quartiers = Quartier::all();
        return view('depotoirs.create', compact('quartiers'));
    }

    /**
     * Enregistre un nouveau dépotoir dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'quartier_id' => 'nullable|exists:quartiers,id',
        ]);

        Depotoir::create($validated);

        return redirect()->route('depotoirs.index')->with('success', 'Dépotoir créé avec succès.');
    }

    /**
     * Affiche un dépotoir spécifique.
     *
     * @param  \App\Models\Depotoir  $depotoir
     * @return \Illuminate\Http\Response
     */
    public function show(Depotoir $depotoir)
    {
        return view('depotoirs.show', compact('depotoir'));
    }

    /**
     * Affiche le formulaire pour éditer un dépotoir spécifique.
     *
     * @param  \App\Models\Depotoir  $depotoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Depotoir $depotoir)
    {
        $quartiers = Quartier::all();
        return view('depotoirs.edit', compact('depotoir', 'quartiers'));
    }

    /**
     * Met à jour un dépotoir spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depotoir  $depotoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depotoir $depotoir)
    {
        $validated = $request->validate([
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'quartier_id' => 'nullable|exists:quartiers,id',
        ]);

        $depotoir->update($validated);

        return redirect()->route('depotoirs.index')->with('success', 'Dépotoir mis à jour avec succès.');
    }

    /**
     * Supprime un dépotoir spécifique de la base de données.
     *
     * @param  \App\Models\Depotoir  $depotoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depotoir $depotoir)
    {
        $depotoir->delete();

        return redirect()->route('depotoirs.index')->with('success', 'Dépotoir supprimé avec succès.');
    }



    public function getCoordinates()
    {
        $depotoirs = Depotoir::select('latitude', 'longitude')->get();
        return response()->json($depotoirs);
    }
}
