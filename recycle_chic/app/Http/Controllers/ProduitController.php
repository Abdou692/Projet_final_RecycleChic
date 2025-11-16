<?php

// Déclaration du namespace pour organiser le code et respecter l'architecture MVC de Laravel
namespace App\Http\Controllers;

// Importation des classes nécessaires pour interagir avec les modèles et les requêtes HTTP
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

// Définition du contrôleur ProduitController, qui hérite de la classe de base Controller
class ProduitController extends Controller
{
    /**
     * Affiche les 12 derniers produits ajoutés à la base de données.
     * Cette méthode est utilisée pour la page d'accueil du site.
     */
    public function index()
    {
        // Récupération des 12 derniers produits ajoutés en base de données
        // 'latest()' trie par date de création du plus récent au plus ancien
        // 'take(12)' limite la requête aux 12 premiers résultats
        $produits = Produit::latest()->take(12)->get();
    
        // Retourne la vue 'accueil' et passe la liste des produits à la vue via la variable 'produits'
        return view('accueil', compact('produits'));
    }

    /**
     * Affiche les détails d'un produit spécifique.
     * En plus des informations du produit, cette méthode récupère aussi des produits similaires.
     */
    public function show($id)
    {
        // Recherche du produit par son identifiant
        // 'findOrFail()' lève automatiquement une erreur 404 si le produit n'est pas trouvé
        $produit = Produit::findOrFail($id);

        // Récupération de 4 produits similaires appartenant à la même catégorie
        // Le produit actuel est exclu des résultats grâce à 'where('id', '!=', $produit->id)'
        $produits_similaires = Produit::where('categorie_id', $produit->categorie_id)
                                      ->where('id', '!=', $produit->id)
                                      ->take(4) // Limite à 4 produits
                                      ->get();

        // Retourne la vue 'produit.detail' avec les détails du produit et les produits similaires
        return view('produit.detail', compact('produit', 'produits_similaires'));
    }

    /**
     * Effectue une recherche parmi les produits en fonction d'un mot-clé saisi par l'utilisateur.
     * La recherche est effectuée dans le titre et la description des produits.
     */
    public function recherche(Request $request)
    {
        // Récupère le terme de recherche envoyé via le champ name = 'query' du formulaire
        $query = $request->input('query');
        
        // Effectue une recherche des produits contenant le mot-clé dans le titre ou la description
        // L'opérateur SQL 'LIKE' permet d'effectuer une recherche approximative
        $produits = Produit::where('titre', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();
    
        // Retourne la vue 'produit.recherche' avec les résultats de la recherche
        return view('produit.recherche', compact('produits'));
    }
}
