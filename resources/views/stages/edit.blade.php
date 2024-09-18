@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Éditer le Stage</h1>

    <form action="{{ route('stages.update', $stage->id) }}" method="POST">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="etudiant_id">Étudiant</label>
            <select name="etudiant_id" id="etudiant_id" class="form-control">
                @foreach($etudiants as $etudiant)
                <option value="{{ $etudiant->id }}" {{ $etudiant->id == $stage->etudiant_id ? 'selected' : '' }}>
                    {{ $etudiant->nom }} {{ $etudiant->prenom }}
                </option>
                @endforeach
            </select>
        </div> <br>

        <div class="form-group">
            <label for="lieu_stage_id">Lieu de Stage</label>
            <select name="lieu_stage_id" id="lieu_stage_id" class="form-control">
                @foreach($lieux as $lieu)
                <option value="{{ $lieu->id }}" {{ $lieu->id == $stage->lieu_stage_id ? 'selected' : '' }}>
                    {{ $lieu->nom }}
                </option>
                @endforeach
            </select>
        </div> <br>

        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ $stage->date_debut }}">
        </div> <br>

        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ $stage->date_fin }}">
        </div> <br>

        <div class="form-group">
            <label for="evaluation">Évaluation</label>
            <textarea name="evaluation" id="evaluation" class="form-control">{{ $stage->evaluation }}</textarea>
        </div> <br>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection