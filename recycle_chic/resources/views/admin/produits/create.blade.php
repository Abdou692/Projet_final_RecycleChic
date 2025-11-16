@extends('layouts.admin')

@section('title', 'Ajouter un produit')

@section('content')
<div class="container">
    <h1 class="mb-4">Ajouter un produit</h1>

    <form action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" id="titre" name="titre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" step="any" id="prix" name="prix" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select id="categorie_id" name="categorie_id" class="form-control" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter le produit</button>
    </form>
</div>
@endsection
