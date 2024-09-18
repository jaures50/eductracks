<!-- resources/views/formateurs/create.blade.php -->

@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Ajouter un Formateur</h1>

    <form action="{{ route('formateurs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div> <br>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div> <br>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div> <br>

        <div class="form-group">
            <label for="telephone">Téléphone :</label>
            <input type="text" class="form-control" id="telephone" name="telephone">
        </div> <br>

        <div class="form-group">
            <label for="specialite">Spécialité :</label>
            <input type="text" class="form-control" id="specialite" name="specialite" required>
        </div> <br>

        <div class="form-group">
            <label for="photo">Photo :</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div> <br>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
