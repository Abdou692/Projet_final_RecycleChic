<?php

// Définition du namespace pour l'emplacement du modèle dans l'application Laravel.
namespace App\Models;

// Importation du trait HasFactory qui permet de générer des usines pour ce modèle (facilite la création de données factices).
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Importation de la classe Model pour interagir avec la base de données.
use Illuminate\Database\Eloquent\Model;

class Produit extends Model // La classe Produit étend le modèle Eloquent, permettant d'interagir avec la table 'produits'.
{
    // Utilisation du trait HasFactory pour pouvoir générer des usines liées à ce modèle (utile pour les tests ou les seeders).
    use HasFactory;

    // Définition des champs qui peuvent être remplis via des requêtes en masse (mass assignment). 
    // Ici, les champs 'titre', 'prix', 'description', 'image' et 'categorie_id' peuvent être remplis de manière sécurisée.
    protected $fillable = ['titre', 'prix', 'description', 'image', 'categorie_id'];

    // Définition de la relation entre le produit et la catégorie.
    public function categorie()
    {
        // Chaque produit appartient à une catégorie, c'est une relation "appartient à" (belongTo).
        return $this->belongsTo(Categorie::class);
    }
}
