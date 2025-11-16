@extends('layouts.app')

@section('title', 'Catégorie - ' . $categorie->titre)

@section('content')
    <h1>Produits dans la catégorie : {{ $categorie->titre }}</h1>
    <div class="row">
        @foreach($produits as $produit)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ Storage::url($produit->image) }}" class="card-img-top" alt="{{ $produit->titre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->titre }}</h5>
                        <p class="card-text"><strong>{{ $produit->prix }} €</strong></p>
                        <a href="{{ route('produit.detail', $produit->id) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
