<!-- resources/views/etudiants/create.blade.php -->

@extends('layouts.darsboard')

@section('content')
<div class="container pt-5">
    <h1>Ajouter un Étudiant</h1>

    <form action="{{ route('etudiants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div> <br>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div> <br>
        <div class="form-group">
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
        </div> <br>
        <div class="form-group">
            <label for="numero_inscription">Numéro d'Inscription</label>
            <input type="text" class="form-control" id="numero_inscription" name="numero_inscription" required>
        </div> <br>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div> <br>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone">
        </div> <br>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse">
        </div> <br>
        <div class="form-group">
            <label for="programme">Programme</label>
            <input type="text" class="form-control" id="programme" name="programme" required>
        </div> <br>
        <div class="form-group">
            <label for="annee_entree">Année d'Entrée</label>
            <input type="number" class="form-control" id="annee_entree" name="annee_entree" required>
        </div> <br>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div> <br>
        <button type="submit" class="btn btn-primary">Ajouter</button> <br> <br> <br>
    </form>
</div>
@endsection