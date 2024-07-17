<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Liste tous les rôles.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $roles = Role::all();
        return response()->json($roles);
    }


    /**
     * Crée un nouveau rôle.
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

        $role = Role::create($validated);
        return response()->json($role, 201);
    }


    /**
     * Affiche un rôle spécifique.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    /**
     * Met à jour un rôle spécifique.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|unique:roles,name,' . $role->id . '|max:255',
            'description' => 'string',
        ]);

        $role->update($validated);
        return response()->json($role);
    }

    /**
     * Supprime un rôle spécifique.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(null, 204);
    }
}
