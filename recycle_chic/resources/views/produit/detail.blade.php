@extends('layouts.app')

@section('title', $produit->titre)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/produits/' . $produit->image) }}" class="img-fluid" alt="{{ $produit->titre }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $produit->titre }}</h1>
            <p><strong>Description : </strong>{{ $produit->description }}</p>
            <p style="font-size: 36px;">{{ $produit->prix }} €</p>
            <a href="{{ route('contact.show', ['subject' => 'reservation', 'message' => 'Je souhaite réserver le produit : ' . $produit->titre]) }}" class="btn btn-warning">
                Réserver ce produit
            </a>
        </div>
    </div>

    <h2>Produits similaires</h2>
    <div class="row">
        @foreach($produits_similaires as $produit_similaire)
            <div class="col-md-3">
                <div class="card mb-3">
                   <img src="{{ asset('images/produits/' . $produit_similaire->image) }}" class="card-img-top" alt="{{ $produit_similaire->titre }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $produit_similaire->titre }}</h5>
                        <p class="card-text"><strong>{{ $produit_similaire->prix }} €</strong></p>
                        <a href="{{ route('produit.detail', $produit_similaire->id) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
