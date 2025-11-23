<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RecycleChic')</title>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    {{-- Icônes --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- CSS perso --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light rc-navbar">
        <div class="container">
            {{-- Logo + texte --}}
            <a class="navbar-brand d-flex align-items-center" href="{{ route('accueil') }}">

                <img src="{{ asset('images/produits/logo-recyclechic.png') }}"
                       alt="Logo RecycleChic"
     style="max-height: 56px; height: auto; width: auto; object-fit: contain; border-radius: 50%;">


                <span class="rc-brand-title ml-2 mb-0">
                    RecycleChic
                </span>
            </a>

            {{-- Bouton burger mobile --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#rcNavbar"
                    aria-controls="rcNavbar" aria-expanded="false" aria-label="Menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Liens + recherche --}}
            <div class="collapse navbar-collapse" id="rcNavbar">
                {{-- Liens de navigation --}}
                <ul class="navbar-nav ml-auto rc-nav-links">
                    <li class="nav-item {{ request()->routeIs('accueil') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
                    </li>

                    {{-- Menu déroulant Catégories --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categorieDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Catégories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="categorieDropdown">
                            @foreach(\App\Models\Categorie::all() as $categorie)
                                <a class="dropdown-item" href="{{ route('categorie.show', $categorie->id) }}">
                                    {{ $categorie->titre }}
                                </a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item {{ request()->routeIs('contact.show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact.show') }}">Contact</a>
                    </li>
                </ul>

                {{-- Barre de recherche --}}
                <form class="form-inline my-2 my-lg-0 rc-search" 
                      action="{{ route('produit.recherche') }}" method="GET">
                    <input class="form-control mr-sm-2 rc-search-input" 
                           type="search" name="query" placeholder="Rechercher un produit" aria-label="Rechercher">
                    <button class="btn rc-search-btn my-2 my-sm-0" type="submit">
                        Rechercher
                    </button>
                </form>
            </div>
        </div>
    </nav>
</header>

<main class="container mt-4">
    @yield('content')
</main>

<footer class="bg-light py-3 mt-4">
    <div class="container">
        <p class="text-center mb-0">&copy; {{ date('Y') }} RecycleChic. Tous droits réservés.</p>
    </div>
</footer>

{{-- JS Bootstrap --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
