<?php

// Définition du namespace pour l'emplacement du modèle dans l'application Laravel.
namespace App\Models;

// Importation du trait HasFactory qui permet de générer des usines pour ce modèle (facilite la création de données factices).
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Importation de la classe Model pour interagir avec la base de données.
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model // La classe Categorie étend le modèle Eloquent, permettant d'interagir avec la table 'categories'.
{
    // Utilisation du trait HasFactory pour pouvoir générer des usines liées à ce modèle (utile pour les tests ou les seeders).
    use HasFactory;

    // Définition des champs qui peuvent être remplis via des requêtes.
    protected $fillable = ['titre'];

    // Définition de la relation entre la catégorie et les produits.
    public function produits()
    {
        // La catégorie peut avoir plusieurs produits associés, c'est une relation "un à plusieurs".
        return $this->hasMany(Produit::class);
    }
}
