@extends('layouts.admin')

@section('title', 'Modifier une catégorie')

@section('content')
    <div class="container">
        <h1>Modifier la catégorie</h1>

        <form action="{{ route('admin.categories.update', $categorie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titre" class="form-label">Nom de la catégorie</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $categorie->titre) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour la catégorie</button>
        </form>
    </div>

</form>
@endsection
