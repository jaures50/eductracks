<!-- resources/views/etudiants/index.blade.php -->
@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Liste des Étudiants</h1>

    <a href="{{ route('etudiants.create') }}" class="btn btn-primary">Ajouter un Étudiant</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Numéro d'Inscription</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $index => $etudiant)

            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->numero_inscription }}</td>
                <td>{{ $etudiant->email }}</td>
                <td>
                    <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning">Modifier</a>
                   




                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Supprimer
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer <span>{{ $etudiant->nom }} {{ $etudiant->prenom }}</span> ? Cette action est irréversible </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection