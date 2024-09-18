@extends('layouts.darsboard')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="display-4 mb-4">Détails du Formateur</h1>
    </div>

    <div class="card mb-4 border-light shadow-sm rounded-lg overflow-hidden">
        <div class="row g-0">
            <div class="col-md-5 bg-light d-flex align-items-center justify-content-center">
                @if($formateur->photo)
                    <img src="{{ asset('storage/' . $formateur->photo) }}" alt="Photo du Formateur" class="img-fluid rounded-circle" style="width: 250px; height: 250px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default-avatar.png') }}" alt="Photo par défaut" class="img-fluid rounded-circle" style="width: 250px; height: 250px; object-fit: cover;">
                @endif
            </div>
            <div class="col-md-7">
                <div class="card-body p-4">
                    <h3 class="card-title text-dark">{{ $formateur->nom }} {{ $formateur->prenom }}</h3>
                    <p class="card-text mb-2"><strong>Email :</strong> {{ $formateur->email }}</p>
                    <p class="card-text mb-2"><strong>Téléphone :</strong> {{ $formateur->telephone }}</p>
                    <p class="card-text mb-2"><strong>Spécialité :</strong> {{ $formateur->specialite }}</p>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <!-- Boutons d'action désactivés -->
                        <!-- <a href="{{ route('formateurs.edit', $formateur->id) }}" class="btn btn-outline-warning me-2">Modifier</a>
                        <form action="{{ route('formateurs.destroy', $formateur->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce formateur ?');">Supprimer</button>
                        </form> -->
                        <a href="{{ route('formateurs.index') }}" class="btn btn-outline-primary">Retour à la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
