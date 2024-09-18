<!-- resources/views/etudiants/edit.blade.php -->
@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Modifier l'Étudiant</h1>

    <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudiant->nom }}" required>
        </div> <br>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $etudiant->prenom }}" required>
        </div> <br>
        <div class="form-group">
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ $etudiant->date_naissance }}" required>
        </div> <br>
        <div class="form-group">
            <label for="numero_inscription">Numéro d'Inscription</label>
            <input type="text" class="form-control" id="numero_inscription" name="numero_inscription" value="{{ $etudiant->numero_inscription }}" required>
        </div> <br>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $etudiant->email }}" required>
        </div> <br>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $etudiant->telephone }}">
        </div> <br>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $etudiant->adresse }}">
        </div> <br>
        <div class="form-group">
            <label for="programme">Programme</label>
            <input type="text" class="form-control" id="programme" name="programme" value="{{ $etudiant->programme }}" required>
        </div> <br>
        <div class="form-group">
            <label for="annee_entree">Année d'Entrée</label>
            <input type="number" class="form-control" id="annee_entree" name="annee_entree" value="{{ $etudiant->annee_entree }}" required>
        </div> <br>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if($etudiant->photo)
                <img src="{{ asset('storage/photos/' . $etudiant->photo) }}" alt="Photo de l'Étudiant" width="250px" class="img-fluid mt-2">
            @endif
        </div> <br>
        <button type="submit" class="btn btn-primary">Modifier</button> <br> <br> <br>
    </form>
</div>
@endsection
