@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Contactez-nous</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Sujet</label>
                        <select name="subject" id="subject" class="form-control" required>
                            <option value="info" {{ request('subject') == 'info' ? 'selected' : '' }}>Demande d'information</option>
                            <option value="reservation" {{ request('subject') == 'reservation' ? 'selected' : '' }}>Réservation d'un produit</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="5" required>{{ request('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>

            <div class="col-md-6">
                <h3>Nos coordonnées</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123, Rue des Développeurs, Paris</p>
                <p><i class="fas fa-phone"></i> +33 1 23 45 67 89</p>
                <p><i class="fas fa-envelope"></i> contact@monsite.com</p>

                <h3>Localisation</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5249.5724287136!2d2.4313545880603495!3d48.862286926526444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66d5d0ac4b287%3A0x92e6740958b13051!2s14%20Rue%20de%20la%20Beaune%2C%2093100%20Montreuil!5e0!3m2!1sfr!2sfr!4v1742823257918!5m2!1sfr!2sfr" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
        </div>
    </div>

    
@endsection
