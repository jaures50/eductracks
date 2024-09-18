@extends('layouts.darsboard')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-info text-white text-center py-4">
                    <h2 class="mb-0">Détails de l'Étudiant</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center align-self-center">
                            @if($etudiant->photo)
                            <img src="{{ asset('storage/photos/' . $etudiant->photo) }}" width="150px" class="rounded-circle img-fluid mb-3 shadow-sm" alt="Photo de l'Étudiant">
                            @else
                            <img src="{{ asset('images/default_student.png') }}" width="150px" class="rounded-circle img-fluid mb-3 shadow-sm" alt="Photo par défaut">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4 class="text-primary mb-3"><strong>Nom & Prénom :</strong> {{ $etudiant->nom }} {{ $etudiant->prenom }}</h4>
                            <p><strong>Date de Naissance :</strong> {{ $etudiant->date_naissance }}</p>
                            <p><strong>Numéro d'Inscription :</strong> {{ $etudiant->numero_inscription }}</p>
                            <p><strong>Email :</strong> {{ $etudiant->email }}</p>
                            <p><strong>Téléphone :</strong> {{ $etudiant->telephone }}</p>
                            <p><strong>Adresse :</strong> {{ $etudiant->adresse }}</p>
                            <p><strong>Programme :</strong> {{ $etudiant->programme }}</p>
                            <p><strong>Année d'Entrée :</strong> {{ $etudiant->annee_entree }}</p>

                            @if($stage && $stage->lieuStage && $stage->lieuStage->nom)
                            <p><strong>Lieux de stage : </strong> {{ $stage->lieuStage->nom }}</p>
                            @else
                            <p><strong>Lieux de stage : </strong> Aucun</p>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card-footer text-center py-3">
                    <a href="{{ route('etudiants.index') }}" class="btn btn-outline-info">Retour à la Liste</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection