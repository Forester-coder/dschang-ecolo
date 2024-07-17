<?php

namespace App\Http\Controllers;

use App\Models\TypeAbonnement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @package App\Http\Controllers
 *
 * Classe TypeAbonnementController
 * Contrôleur pour gérer les types d'abonnement via une API RESTful.
 *
 */
class TypeAbonnementController extends Controller
{
    /**
     * Liste tous les types d'abonnement.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $typesAbonnement = TypeAbonnement::all();
        return response()->json($typesAbonnement);
    }

    /**
     * Crée un nouveau type d'abonnement.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nom' => 'required|string|unique:type_abonnements|max:255',
            'montant' => 'required|numeric|min:0',
        ]);

        $typeAbonnement = TypeAbonnement::create($validated);
        return response()->json($typeAbonnement, 201);
    }

    /**
     * Affiche un type d'abonnement spécifique.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $typeAbonnement = TypeAbonnement::findOrFail($id);
        return response()->json($typeAbonnement);
    }

    /**
     * Met à jour un type d'abonnement spécifique.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $typeAbonnement = TypeAbonnement::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|unique:type_abonnements,nom,' . $typeAbonnement->id . '|max:255',
            'montant' => 'required|numeric|min:0',
        ]);

        $typeAbonnement->update($validated);
        return response()->json($typeAbonnement);
    }

    /**
     * Supprime un type d'abonnement spécifique.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $typeAbonnement = TypeAbonnement::findOrFail($id);
        $typeAbonnement->delete();

        return response()->json(null, 204);
    }


    function selectTypeAbonnement()
    {
        return view('typeAbonnements.select');
    }
}
