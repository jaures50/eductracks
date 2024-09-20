<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #1e1e1c;
            color: #fff;
            padding-top: 20px;
            transition: background-color 0.3s ease;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            display: block;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: white;
            transform: translateX(5px);
            box-shadow: 0px 5px 10px rgba(0, 123, 255, 0.3);
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .activete {
            background-color: #209ed9;
            color: white !important;
        }

        .bold {
            font-weight: bold;
            font-size: 20px;
        }

        label {
            font-weight: bold;
        }

        /* Animations */
        .sidebar a {
            position: relative;
        }

        .sidebar a::before {
            content: "";
            position: absolute;
            width: 5px;
            height: 100%;
            left: 0;
            top: 0;
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover::before {
            background-color: #007bff;
        }

        .navbar {
            background-color: #343a40;
            transition: background-color 0.5s ease;
        }

        .navbar a.navbar-brand {
            color: #fff;
            transition: color 0.3s ease;
        }

        .navbar a.navbar-brand:hover {
            color: #007bff;
        }

        .navbar-toggler {
            border-color: white;
        }

        .container {
            animation: fadeIn 1.2s ease-out;
        }

        /* Keyframes */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(70px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Effet hover sur les liens du sidebar */
        .sidebar a:hover {
            transform: scale(1.1);
        }

        /* Style des séparateurs */
        hr {
            border: 1px solid #007bff;
            width: 80%;
            margin-left: 15px;
        }
    </style>
</head>

<body>

    <div id="app" style="margin-top: -24px;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand bold" href="{{ url('/') }}">
                <img src="{{ asset('image/icon.png') }}" height="90px" alt="Description de l'image">

<!--                     {{ config('app.name', 'Laravel') }}
 -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link bold" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __("S'inscrire") }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle bold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-weight:bold" >
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item bold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Deconnexion') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Sidebar -->
    <div class="sidebar animate__animated animate__fadeInLeft">
        <h2 class="text-center">
            Tableau de bord

        </h2>

        <div class="pt-3">
            <hr>
            <a class="{{ Route::is('nbrtotal') ? 'activete' : '' }}" href="{{ route('nbrtotal') }}">Tableau de bord</a>
            <hr>
            <a class="{{ Route::is('formateurs.index') ? 'activete' : '' }}" href="{{ route('formateurs.index') }}">Liste des Formateurs</a>
            <a class="{{ Route::is('formateurs.create') ? 'activete' : '' }}" href="{{ route('formateurs.create') }}">Ajouter un Formateur</a>
            <hr>
            <a class="{{ Route::is('etudiants.index') ? 'activete' : '' }}" href="{{ route('etudiants.index') }}">Liste des Étudiants</a>
            <a class="{{ Route::is('etudiants.create') ? 'activete' : '' }}" href="{{ route('etudiants.create') }}">Ajouter un Étudiant</a>
            <hr>
            <a class="{{ Route::is('stages.index') ? 'activete' : '' }}" href="{{ route('stages.index') }}">Liste des étudiants en Stage</a>
            <a class="{{ Route::is('stages.create') ? 'activete' : '' }}" href="{{ route('stages.create') }}">Ajouter un Stage</a>
            <hr>
            <a class="{{ Route::is('lieux-stages.index') ? 'activete' : '' }}" href="{{ route('lieux-stages.index') }}">Liste des Lieux de Stage</a>
            <a class="{{ Route::is('lieux-stages.create') ? 'activete' : '' }}" href="{{ route('lieux-stages.create') }}">Ajouter un Lieu de Stage</a>
           <!--  <hr>
            <a class="{{ Route::is('nbrtotal') ? 'activete' : '' }}" href="{{ route('nbrtotal') }}">Total</a> -->
        </div>
    </div>

    <!-- Main Content -->
    <div class="container pt-3 main-content">
        <div class="row">
            <div class="col-md-12">
                <h2>Vue d'ensemble du tableau de bord</h2>
                <hr>
            </div>
        </div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>


    <!-- Footer -->
    <footer class="footer  text-light text-center py-3">
        <div class="container">
            <span>&copy; 2024 {{ config('app.name', 'Laravel') }}. Tous droits réservés.</span>
        </div>
    </footer>

    <!-- Custom CSS for Footer -->
    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #1e1e1c;
            color: #6c757d;
            font-size: 20px;
            font-weight: bold;
        }
    </style>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>