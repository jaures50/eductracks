<!-- resources/views/formateurs/edit.blade.php -->

@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Modifier le Formateur</h1>

    <form action="{{ route('formateurs.update', $formateur->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $formateur->nom }}" required>
        </div> <br>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $formateur->prenom }}" required>
        </div> <br>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $formateur->email }}" required>
        </div> <br>

        <div class="form-group">
            <label for="telephone">Téléphone :</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $formateur->telephone }}">
        </div> <br>

        <div class="form-group">
            <label for="specialite">Spécialité :</label>
            <input type="text" class="form-control" id="specialite" name="specialite" value="{{ $formateur->specialite }}" required>
        </div> <br>

        <div class="form-group">
            <label for="photo">Photo :</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if($formateur->photo)
                <img src="{{ asset('storage/formateurs/' . $formateur->photo) }}" alt="Photo" width="100">
            @endif
        </div> <br>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
