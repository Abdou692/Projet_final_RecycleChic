<?php

// Définition du namespace pour le contrôleur d'authentification admin
namespace App\Http\Controllers;

use Illuminate\Http\Request; // Importation de la classe Request pour gérer les requêtes HTTP
use Illuminate\Support\Facades\Auth; // Importation de la classe Auth pour l'authentification
use App\Models\Admin; // Importation du modèle Admin

class AdminAuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion pour l'administrateur.
     */
    public function showLoginForm()
    {
        return view('admin.login'); // Retourne la vue de connexion admin
    }

    /**
     * Gère la tentative de connexion de l'administrateur.
     */
   public function login(Request $request)
{
    // 1. Validation
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // 2. Tentative de connexion
    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Connexion réussie.');
    }

    // 3. Si échec
    return back()
        ->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])
        ->onlyInput('email');
}


    /**
     * Déconnecte l'administrateur et le redirige vers la page de connexion.
     */
    public function logout()
    {
        Auth::guard('admin')->logout(); // Déconnexion de l'administrateur
        return redirect()->route('admin.login')->with('success', 'Déconnexion réussie.');
    }
}
