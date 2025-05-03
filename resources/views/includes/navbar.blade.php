<!-- filepath: resources/views/includes/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{ url('/') }}" class="navbar-brand p-0">
        <h1 class="m-0"><i class="fa fa-map-marker-alt me-3"></i>TravelCam</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ url('/') }}" class="nav-item nav-link ">Home</a>
            <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
            <a href="{{ url('/agence') }}" class="nav-item nav-link">Nos Agences</a>
            <a href="{{ url('/services') }}" class="nav-item nav-link">Service</a>
            <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
        </div>
        <a href="{{ url('/register') }}" class="nav-item nav-link ">S'inscrire</a>
        <a href="{{ url('/login') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Se connecter</a>
    </div>
</nav>