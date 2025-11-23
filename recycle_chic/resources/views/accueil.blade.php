@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="text-center mb-5">
        <h1 class="mb-2">Les derniers produits</h1>
    </div>

    <div class="row">
        @forelse($produits as $produit)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/produits/' . $produit->image) }}"
                         class="card-img-top"
                         alt="{{ $produit->titre }}">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $produit->titre }}</h5>
                        <p class="card-text font-weight-bold mb-2">{{ number_format($produit->prix, 2, ',', ' ') }} €</p>
                        <p class="card-text text-muted flex-grow-1">
                            {{ Str::limit($produit->description, 80) }}
                        </p>
                        <a href="{{ route('produit.detail', $produit->id) }}" class="btn btn-primary mt-2">
                            Voir le produit
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>Aucun produit disponible pour le moment.</p>
            </div>
        @endforelse
    </div>
@endsection
