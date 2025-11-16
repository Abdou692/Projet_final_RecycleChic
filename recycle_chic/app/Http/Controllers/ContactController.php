<?php

// Déclaration du namespace pour organiser le contrôleur dans l'architecture MVC de Laravel
namespace App\Http\Controllers;

// Importation des classes nécessaires pour gérer les requêtes et l'envoi d'e-mails
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

// Définition du contrôleur ContactController qui gère l'affichage et l'envoi du formulaire de contact
class ContactController extends Controller
{
    /**
     * Affiche la page du formulaire de contact.
     * Cette méthode renvoie simplement la vue du formulaire de contact.
     */
    public function show()
    {
        // Retourne la vue 'contact.blade.php'
        return view('contact');
    }

    /**
     * Gère l'envoi du formulaire de contact après validation des données saisies.
     * Un e-mail est envoyé à l'administrateur avec les informations fournies par l'utilisateur.
     */
    public function send(Request $request)
    {
        // Validation des données du formulaire avec des règles strictes
        $request->validate([
            'name' => 'required', // Le nom est obligatoire
            'email' => 'required|email', // L'email est obligatoire et doit être valide
            'message' => 'required|string', // Le message est obligatoire et doit être une chaîne de caractères
            'subject' => 'required|string', // Le sujet est obligatoire et doit être une chaîne de caractères
        ]);

        // Envoi de l'email à l'adresse de destination
        // 'Mail::to()' définit le destinataire et 'send()' envoie l'email en utilisant la classe ContactMail
        Mail::to('zakariae.kassimi@gmail.com')->send(new ContactMail($request->all()));

        // Redirection vers la page précédente avec un message de succès
        return back()->with('success', 'Votre message a bien été envoyé.');
    }
}



/*
php artisan make:mail ContactMail
*/