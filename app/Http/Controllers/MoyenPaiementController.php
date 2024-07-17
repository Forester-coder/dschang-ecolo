<?php

namespace App\Http\Controllers;

use App\Models\MoyenPaiement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MoyenPaiementController extends Controller
{
    /**
     * Liste tous les types d'abonnements.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $moyenPaiement = MoyenPaiement::all();
        return response()->json($moyenPaiement);
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
            'nom' => 'required|string|unique:roles|max:255',
            'description' => 'string',
        ]);

        $role = MoyenPaiement::create($validated);
        return response()->json($role, 201);
    }


    /**
     * Affiche un type d'abonnement spécifique.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $role = MoyenPaiement::findOrFail($id);
        return response()->json($role);
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
        $moyenPaiement = MoyenPaiement::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|unique:moyen_paiements,nom,' . $moyenPaiement->id . '|max:255',
            'description' => 'string',
        ]);

        $moyenPaiement->update($validated);
        return response()->json($moyenPaiement);
    }

    /**
     * Supprime un type d'abonnement spécifique.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $role = MoyenPaiement::findOrFail($id);
        $role->delete();

        return response()->json(null, 204);
    }
}
