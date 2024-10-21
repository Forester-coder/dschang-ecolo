<?php

namespace App\Http\Controllers;

use App\Models\Quartier;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    // Affiche la liste des utilisateurs avec recherche
    public function index(Request $request)
    {
        $query = User::with(['role', 'quartier']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('tel', 'like', "%{$search}%");
        }

        $users = $query->get();
        return view('users.index', compact('users'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $roles = Role::all();
        $quartiers = Quartier::all();
        return view('users.create', compact('roles', 'quartiers'));
    }

    // Enregistre un nouvel utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'tel' => 'required|integer',
            'role_id' => 'nullable|exists:roles,id',
            'quartier_id' => 'nullable|exists:quartiers,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tel' => $request->tel,
            'role_id' => $request->role_id,
            'quartier_id' => $request->quartier_id,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Affiche un utilisateur spécifique
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Affiche le formulaire d'édition
    public function edit(User $user)
    {
        $roles = Role::all();
        $quartiers = Quartier::all();
        return view('users.edit', compact('user', 'roles', 'quartiers'));
    }

    // Met à jour un utilisateur
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'tel' => 'required|integer',
            'role_id' => 'nullable|exists:roles,id',
            'quartier_id' => 'nullable|exists:quartiers,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'role_id' => $request->role_id,
            'quartier_id' => $request->quartier_id,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Supprime un utilisateur
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
