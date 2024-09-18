@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Ajouter un Stage</h1>

    <form action="{{ route('stages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="etudiant_id">Étudiant</label>
            <select name="etudiant_id" id="etudiant_id" class="form-control">
                @foreach($etudiants as $etudiant)
                <option value="{{ $etudiant->id }}">{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                @endforeach
            </select>
        </div> <br>

        <div class="form-group">
            <label for="lieu_stage_id">Lieu de Stage</label>
            <select name="lieu_stage_id" id="lieu_stage_id" class="form-control">
                @foreach($lieux as $lieu)
                <option value="{{ $lieu->id }}">{{ $lieu->nom }}</option>
                @endforeach
            </select>
        </div> <br>

        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control">
        </div> <br>

        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control">
        </div> <br>

        <div class="form-group">
            <label for="evaluation">Observation par rappot aux évaluation</label>
            <textarea name="evaluation" id="evaluation" class="form-control"  >Ex: Bien, Passable, ... </textarea>
        </div> <br>

        <div class="form-group">
            <label for="formateur_id">Formateur</label>
            <select name="formateur_id" id="formateur_id" class="form-control">
                @foreach($formateurs as $formateur)
                <option value="{{ $formateur->id }}">{{ $formateur->nom }} {{ $formateur->prenom }}</option>
                @endforeach
            </select>
        </div> <br>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection