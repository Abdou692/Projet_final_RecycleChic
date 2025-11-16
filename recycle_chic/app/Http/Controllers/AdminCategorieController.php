<?php

// Définition du namespace pour le contrôleur des catégories admin
namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Importation du contrôleur de base Laravel
use App\Models\Categorie; // Importation du modèle Categorie
use Illuminate\Http\Request; // Importation de la classe Request pour gérer les requêtes HTTP

// Définition du contrôleur AdminCategorieController pour gérer les catégories en back-office
class AdminCategorieController extends Controller
{

    /**
     * Affiche la liste de toutes les catégories.
     */
    public function index()
    {
        // Récupération de toutes les catégories
        $categories = Categorie::all();

        // Retourne la vue des catégories avec la liste des catégories
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle catégorie.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Enregistre une nouvelle catégorie en base de données.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        // Création et enregistrement de la catégorie
        Categorie::create([
            'titre' => $request->titre,
        ]);

        // Redirection avec un message de succès
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    /**
     * Affiche le formulaire de modification d'une catégorie existante.
     */
    public function edit($id)
    {
        // Récupération de la catégorie à modifier
        $categorie = Categorie::findOrFail($id);

        // Retourne la vue d'édition avec la catégorie
        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Met à jour une catégorie existante.
     */
    public function update(Request $request, $id)
    {
        // Validation des données envoyées par le formulaire
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        // Récupération de la catégorie à modifier
        $categorie = Categorie::findOrFail($id);

        // Mise à jour des attributs et sauvegarde
        $categorie->update([
            'titre' => $validated['titre'],
        ]);

        // Redirection avec un message de succès
        return redirect()->route('admin.categories.index')->with('success', 'La catégorie a été mise à jour avec succès.');
    }

    /**
     * Supprime une catégorie de la base de données.
     */
    public function destroy($id)
    {
        // Récupération de la catégorie à supprimer
        $categorie = Categorie::findOrFail($id);

        // Suppression de la catégorie
        $categorie->delete();

        // Redirection avec un message de succès
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
