<!-- resources/views/formateurs/index.blade.php -->

@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Liste des Formateurs</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('formateurs.create') }}" class="btn btn-primary mb-3">Ajouter un Formateur</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formateurs as $index => $formateur)

            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $formateur->nom }}</td>
                <td>{{ $formateur->prenom }}</td>
                <td>{{ $formateur->email }}</td>
                <td>{{ $formateur->telephone }}</td>
                <td>
                    @if($formateur->photo)
                    <img src="{{ asset('storage/' . $formateur->photo) }}" alt="Photo" width="50">
                    @else
                    N/A
                    @endif
                </td>
                <td>
                    <a href="{{ route('formateurs.show', $formateur->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('formateurs.edit', $formateur->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('formateurs.destroy', $formateur->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce formateur ?');">Supprimer</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

</div>
@endsection