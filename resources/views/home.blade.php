<!-- resources/views/etudiants/index.blade.php -->
@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Liste des Étudiants</h1>
    <a href="{{ route('etudiants.create') }}" class="btn btn-primary">Ajouter un Étudiant</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Numéro d'Inscription</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->numero_inscription }}</td>
                <td>{{ $etudiant->email }}</td>
                <td>
                    <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" style="display:inline;">
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
