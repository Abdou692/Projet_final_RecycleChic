<?php

namespace App\Models; 

use Illuminate\Foundation\Auth\User as Authenticatable; // C'est ce qui permet l'authentification de l'utilisateur dans Laravel. 
use Illuminate\Database\Eloquent\Model; // Importation de la classe Model pour interagir avec la base de données.

class Admin extends Authenticatable // La classe Admin hérite de Authenticatable pour gérer l'authentification des administrateurs.
{
    protected $fillable = ['email', 'password']; // Définition des champs qui peuvent être remplis de manière sécurisée via des requêtes en masse (mass assignment).
    // Ici, 'email' et 'password' peuvent être remplis, ce qui signifie qu'ils peuvent être utilisés pour la création ou la mise à jour d'un administrateur dans la base de données.

    // Pas besoin de redéfinir la méthode getAuthPassword(), car Authenticatable le fait déjà.
    // La méthode getAuthPassword() permet de récupérer le mot de passe de l'utilisateur pour l'authentification. Elle est déjà définie dans Authenticatable.
}


/*
//Tinker : l'interface de ligne de commande interactive de Laravel.
php artisan tinker


//Dans Tinker, insère un administrateur en utilisant le modèle Admin :

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

Admin::create([
    'email' => 'admin@zak.com',
    'password' => Hash::make('abc'),
]);
*/



