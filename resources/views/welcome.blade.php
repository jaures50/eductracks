@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center vh-100" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png'); animation: backgroundFade 3s ease-in-out infinite;">
    <div class="text-center p-5 rounded shadow-lg animate__animated animate__fadeIn" style="background-color: white; max-width: 500px; border-radius: 15px; animation: slideIn 1s ease-out;">
        <div class="mb-4">
            <img src="https://cdn-icons-png.flaticon.com/512/2920/2920256.png" alt="Login Icon" style="width: 80px; height: 80px; animation: rotateIcon 2s infinite alternate;">
        </div>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading" style="font-size: 2rem; font-weight: bold;">Connexion Requise</h4>
            <p style="font-size: 1.1rem;">Pour accéder à cette page, vous devez être connecté. Veuillez vous authentifier pour continuer.</p>
            <hr>
            <a href="{{ route('login') }}" class="btn btn-lg btn-primary btn-hover" style="border-radius: 50px; padding: 10px 30px; font-size: 1.2rem; transition: all 0.3s ease;">Se connecter</a>
        </div>
    </div>
</div>

<style>
    /* Animation de fond */
    @keyframes backgroundFade {
        0% { background-color: #f0f0f0; }
        50% { background-color: #e0e0e0; }
        100% { background-color: #f0f0f0; }
    }

    /* Rotation de l'icône */
    @keyframes rotateIcon {
        0% { transform: rotate(-30deg); }
        100% { transform: rotate(30deg); }
    }

    /* Apparition progressive de la carte */
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Effet hover sur le bouton */
    .btn-hover:hover {
        background-color: #0056b3;
        color: white;
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(0, 123, 255, 0.5);
        font-weight: bold;
    }
</style>

@endsection
