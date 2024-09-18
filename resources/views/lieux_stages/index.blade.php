@extends('layouts.darsboard')
<style>
    table {
        table-layout: fixed;
        /* Fixe la largeur des colonnes */
        width: 100%;
    }

    th,
    td {
        text-align: left;
        overflow: hidden;
        /* Cache le texte qui dépasse */
        text-overflow: ellipsis;
        /* Affiche des points de suspension pour le texte trop long */
        white-space: nowrap;
        /* Évite le retour à la ligne du texte */
    }

    td {
        max-width: 150px;
        /* Définit une largeur maximale pour les colonnes */
    }
</style>
@section('content')
<div class="container">
    <h1>Liste des lieux de stage</h1>
    <a href="{{ route('lieux_stages.create') }}" class="btn btn-primary mb-3">Ajouter un lieu de stage</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                
                <th>#</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($lieux_stages as $index => $lieu)
        <tr>
            
            <td>{{ $index +1  }}</td> <!-- Numérotation automatique -->
                <td>{{ $lieu->nom }}</td>
                <td>{{ $lieu->adresse }}</td>
                <td>{{ $lieu->ville }}</td>
                <td>{{ $lieu->pays }}</td>
                <td>{{ $lieu->contact }}</td>
                <td>
                    <a href="{{ route('lieux_stages.edit', $lieu->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $lieu->id }}">
                        Supprimer
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{ $lieu->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $lieu->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $lieu->id }}">Confirmation de suppression</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer le lieu de stage <br> <strong>{{ $lieu->nom }}</strong> ? <br> Cette action est irréversible.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                                    <form action="{{ route('lieux_stages.destroy', $lieu->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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