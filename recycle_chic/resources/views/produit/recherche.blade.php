@extends('layouts.app')

@section('title', 'Résultats de la recherche')

@section('content')
    <h1 class="mb-4">Résultats de la recherche</h1>

    @if(request()->query('query'))
        <h3 class="mb-4">Résultats pour : "{{ request()->query('query') }}"</h3>
    @endif

    @if($produits->isEmpty())
        <p>Aucun produit trouvé pour cette recherche.</p>
    @else
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
    @endif
@endsection

