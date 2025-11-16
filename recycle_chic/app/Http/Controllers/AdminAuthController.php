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
        // Validation des entrées du formulaire
        $request->validate([
            'email' => 'required|email', // L'email doit être valide
            'password' => 'required', // Le mot de passe est obligatoire
        ]);

        // Recherche de l'administrateur dans la base de données
        $admin = Admin::where('email', $request->email)->first();

        // Vérification des informations d'identification et tentative de connexion
        if ($admin && Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Connexion réussie, redirection vers le tableau de bord ou les catégories
            return redirect()->route('admin.categories.index')->with('success', 'Connexion réussie.');
        }

        // Si l'authentification échoue, renvoyer un message d'erreur
        return back();
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
