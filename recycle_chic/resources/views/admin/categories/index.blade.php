@extends('layouts.admin')

@section('title', 'Gestion des Catégories')

@section('content')
<div class="container">
    <h1 class="mb-4">Gestion des Catégories</h1>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titre</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
            <tr>
                <td>{{ $categorie->id }}</td>
                <td>{{ $categorie->titre }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
