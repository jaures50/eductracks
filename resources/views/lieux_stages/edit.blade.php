@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Modifier le Lieu de Stage</h1>

    <!-- Afficher les messages de succès ou d'erreur -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire pour éditer le lieu de stage -->
    <form action="{{ route('lieux_stages.update', $lieuStage->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $lieuStage->nom) }}" required>
        </div> <br>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse', $lieuStage->adresse) }}" required>
        </div> <br>

        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" value="{{ old('ville', $lieuStage->ville) }}" required>
        </div> <br>

        <div class="form-group">
            <label for="pays">Pays</label>
            <input type="text" class="form-control" id="pays" name="pays" value="{{ old('pays', $lieuStage->pays) }}" required>
        </div> <br>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $lieuStage->contact) }}">
        </div> <br>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('lieux_stages.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
