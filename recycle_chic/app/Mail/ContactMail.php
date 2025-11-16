<?php
namespace App\Mail; // Définition du namespace pour l'emplacement du fichier dans l'application Laravel.

use Illuminate\Mail\Mailable; // Importation de la classe Mailable qui permet de créer un e-mail.

class ContactMail extends Mailable // Définition de la classe ContactMail qui hérite de Mailable pour créer un e-mail de contact.
{
    // Propriété pour stocker les données nécessaires à l'e-mail, comme l'email et le message.
    public $data; 

    // Le constructeur prend les données du formulaire de contact en paramètre et les assigne à la propriété $data.
    public function __construct($data)
    {
        $this->data = $data; // Assignation des données à la propriété $data.
    }

    // La méthode build construit l'e-mail en spécifiant l'expéditeur, le sujet et la vue du contenu de l'e-mail.
    public function build()
    {
        return $this->from($this->data['email']) // L'adresse de l'expéditeur est définie avec l'email passé dans $data.
                    ->subject('Nouveau message de contact') // Le sujet de l'e-mail est défini ici.
                    ->view('emails.contact'); // La vue pour le corps de l'e-mail est 'emails.contact'.
    }
}
