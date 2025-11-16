@extends('layouts.admin')

@section('title', 'Modifier le produit')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier le produit</h1>

    <form action="{{ route('admin.produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre', $produit->titre) }}" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" id="prix" name="prix" class="form-control" value="{{ old('prix', $produit->prix) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $produit->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select id="categorie_id" name="categorie_id" class="form-control" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control">
            @if($produit->image)
                <p>Image actuelle :</p>
                <img src="{{ Storage::url($produit->image) }}" alt="Image produit" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour le produit</button>
    </form>
</div>
@endsection
