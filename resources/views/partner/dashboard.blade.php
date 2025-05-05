<!-- resources/views/partner/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord partenaire</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                    <i class="ti-menu ti-close"></i>
                </a>
                <div class="navbar-brand">
                    <a href="{{ route('home') }}" class="logo">
                        <b class="logo-icon">
                            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="dark-logo" />
                        </b>
                    </a>
                </div>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav float-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('assets/images/users/2.jpg') }}" alt="user" class="rounded-circle" width="40">
                            <span class="m-l-5 font-medium d-none d-sm-inline-block">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="mdi mdi-settings m-r-5 m-l-5"></i> Paramètres</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-power m-r-5 m-l-5"></i> Déconnexion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Contenu principal -->
    <div class="container-fluid mt-4">
        <div class="card-group">
            <!-- Informations personnelles -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <i class="fas fa-user font-20 text-primary"></i>
                            <p class="font-16 m-b-5">Nom</p>
                        </div>
                        <div class="ml-auto">
                            <h4 class="font-light text-right">{{ Auth::user()->name }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <i class="fas fa-envelope font-20 text-success"></i>
                            <p class="font-16 m-b-5">Email</p>
                        </div>
                        <div class="ml-auto">
                            <h4 class="font-light text-right">{{ Auth::user()->email }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Téléphone -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <i class="fas fa-phone font-20 text-info"></i>
                            <p class="font-16 m-b-5">Téléphone</p>
                        </div>
                        <div class="ml-auto">
                            <h4 class="font-light text-right">{{ Auth::user()->telephone }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-group mt-4">
            <!-- Nom de l'agence -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <i class="fas fa-building font-20 text-warning"></i>
                            <p class="font-16 m-b-5">Nom de l'agence</p>
                        </div>
                        <div class="ml-auto">
                            <h4 class="font-light text-right">{{ $agence->agency_name }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email professionnel -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <i class="fas fa-envelope font-20 text-danger"></i>
                            <p class="font-16 m-b-5">Email professionnel</p>
                        </div>
                        <div class="ml-auto">
                            <h4 class="font-light text-right">{{ $agence->email_pro }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Téléphone professionnel -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <i class="fas fa-phone font-20 text-success"></i>
                            <p class="font-16 m-b-5">Téléphone professionnel</p>
                        </div>
                        <div class="ml-auto">
                            <h4 class="font-light text-right">{{ $agence->phone_pro }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>