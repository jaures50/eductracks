@extends('layouts.darsboard')

@section('content')
<div class="container">
    <h1>Ajouter un lieu de stage</h1>
    <form action="{{ route('lieux_stages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'entreprise</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div> <br>
        
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
        </div> <br>
        
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" required>
        </div> <br>
        
        <div class="mb-3">
            <label for="pays" class="form-label">Pays</label>
            <input type="text" class="form-control" id="pays" name="pays" required>
        </div> <br>
        
        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact">
        </div> <br>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
