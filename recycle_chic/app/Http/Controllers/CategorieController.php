<?php

// Déclaration du namespace pour organiser le contrôleur dans l'architecture MVC de Laravel
namespace App\Http\Controllers;

// Importation du modèle Categorie pour interagir avec la base de données
use App\Models\Categorie;
use Illuminate\Http\Request;

// Définition du contrôleur CategorieController qui gère l'affichage des produits d'une catégorie
class CategorieController extends Controller
{
    /**
     * Affiche les produits d'une catégorie spécifique.
     * Cette méthode récupère la catégorie et ses produits associés, puis les transmet à la vue.
     */
    public function show($id)
    {
        // Récupérer la catégorie par son ID ou générer une erreur 404 si elle n'existe pas
        $categorie = Categorie::findOrFail($id);

        // Récupérer tous les produits associés à cette catégorie via la relation définie dans le modèle Categorie
        $produits = $categorie->produits;

        // Retourner la vue 'categorie.show' en lui passant la catégorie et sa liste de produits
        return view('categorie.show', compact('categorie', 'produits'));
    }
}
