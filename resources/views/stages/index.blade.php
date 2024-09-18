@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Liste des étudians en Stages</h1>
    <a href="{{ route('stages.create') }}" class="btn btn-primary mb-3">Ajouter un Stage</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Étudiant</th>
                <th>Lieu de Stage</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Évaluation</th>
                <th>Formateur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($stages as $index => $stage)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $stage->etudiant->nom }} {{ $stage->etudiant->prenom }}</td>
                <td>{{ $stage->lieuStage->nom }}</td>
                <td>{{ $stage->date_debut }}</td>
                <td>{{ $stage->date_fin }}</td>
                <td>{{ $stage->evaluation }}</td>
                <td>{{ $stage->formateur->nom  }} {{ $stage->formateur->prenom }}</td>

                <td>
                    <a href="{{ route('stages.edit', $stage->id) }}" class="btn btn-warning">Modifier</a>
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
                                    Êtes-vous sûr de vouloir supprimer <span>{{ $stage->etudiant->nom }} {{ $stage->etudiant->prenom }}</span> ? Cette action est irréversible </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('stages.destroy', $stage->id) }}" method="POST" style="display:inline-block;">
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

    <!-- Button trigger modal -->


    <!-- Modal -->

</div>
@endsection