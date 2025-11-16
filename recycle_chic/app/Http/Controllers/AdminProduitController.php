<?php

// Déclaration du namespace pour organiser le contrôleur
namespace App\Http\Controllers;

// Importation des classes nécessaires
use Illuminate\Support\Facades\Storage;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

// Définition du contrôleur AdminProduitController pour gérer les produits dans l'administration
class AdminProduitController extends Controller
{
    /**
     * Affiche la liste des produits disponibles.
     */
    public function index()
    {
        // Récupération de tous les produits
        $produits = Produit::all();

        // Retourne la vue de la liste des produits
        return view('admin.produits.index', compact('produits'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau produit.
     */
    public function create()
    {
        // Récupération de toutes les catégories pour le formulaire
        $categories = Categorie::all();

        // Retourne la vue de création avec la liste des catégories
        return view('admin.produits.create', compact('categories'));
    }

    /**
     * Enregistre un nouveau produit dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des champs du formulaire
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048', // Vérification du type d'image
        ]);

        // Vérifie si une image a été envoyée
        if ($request->hasFile('image')) {
            // Stocke l'image dans le dossier 'images' du stockage public
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Création et enregistrement du produit
        Produit::create([
            'titre' => $validated['titre'],
            'prix' => $validated['prix'],
            'categorie_id' => $validated['categorie_id'],
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
        ]);

        // Redirection avec message de succès
        return redirect()->route('admin.produits.index')->with('success', 'Le produit a été ajouté avec succès.');
    }

    /**
     * Affiche le formulaire de modification d'un produit existant.
     */
    public function edit($id)
    {
        // Récupération du produit par son ID
        $produit = Produit::findOrFail($id);

        // Récupération des catégories pour la sélection
        $categories = Categorie::all();

        // Retourne la vue d'édition avec le produit et les catégories
        return view('admin.produits.edit', compact('produit', 'categories'));
    }

    /**
     * Met à jour un produit existant dans la base de données.
     */
    public function update(Request $request, $id)
    {
        // Validation des champs du formulaire
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,svg|max:2048',
        ]);

        // Récupération du produit à modifier
        $produit = Produit::findOrFail($id);

        // Gestion de l'upload de la nouvelle image
        if ($request->hasFile('image')) {
            // Suppression de l'ancienne image si elle existe
            if ($produit->image) {
                Storage::delete($produit->image);
            }
            // Stockage de la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $produit->image;
        }

        // Mise à jour des informations du produit
        $produit->update([
            'titre' => $validated['titre'],
            'prix' => $validated['prix'],
            'categorie_id' => $validated['categorie_id'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        // Redirection avec message de succès
        return redirect()->route('admin.produits.index')->with('success', 'Le produit a été mis à jour avec succès.');
    }

    /**
     * Supprime un produit de la base de données.
     */
    public function destroy($id)
    {
        // Récupération du produit à supprimer
        $produit = Produit::findOrFail($id);

        // Suppression du produit
        $produit->delete();

        // Redirection avec message de succès
        return redirect()->route('admin.produits.index')->with('success', 'Le produit a été supprimé avec succès.');
    }
}
