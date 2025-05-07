<!DOCTYPE html>
<html lang="fr">
@include('includes.header')

<style>
    .profile-header {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../images/apropos2.jpg');
        background-size: cover;
        background-position: center;
        padding: 100px 0;
        color: white;
    }
    
    .profile-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid white;
    }
    
    .agency-card {
        transition: transform 0.3s;
    }
    
    .agency-card:hover {
        transform: translateY(-5px);
    }
</style>

<!-- Navbar -->
@include('includes.navbar')

<body class="bg-light">
    <!-- En-tête du profil -->
    <section class="profile-header">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="display-4">{{ $user->name }}</h1>
                    <p class="lead">Partenaire TravelCam</p>
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="{{ route('partner.edit') }}" class="btn btn-outline-light">
                            <i class="fas fa-edit"></i> Modifier le profil
                        </a>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                            <i class="fas fa-trash"></i> Supprimer le compte
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Informations du profil -->
    <section class="py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <!-- Informations personnelles -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0"><i class="fas fa-user me-2"></i> Informations personnelles</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-user me-2 text-primary"></i> Nom</span>
                                    <span class="fw-bold">{{ $user->name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-envelope me-2 text-primary"></i> Email</span>
                                    <span class="fw-bold">{{ $user->email }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-phone me-2 text-primary"></i> Téléphone</span>
                                    <span class="fw-bold">{{ $user->telephone }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-map-marker-alt me-2 text-primary"></i> Adresse</span>
                                    <span class="fw-bold">{{ $user->adresse }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-calendar-alt me-2 text-primary"></i> Membre depuis</span>
                                    <span class="fw-bold">{{ $user->created_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Informations de l'agence -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0"><i class="fas fa-building me-2"></i> Informations de l'agence</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-building me-2 text-primary"></i> Nom de l'agence</span>
                                    <span class="fw-bold">{{ $agence->agency_name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-tag me-2 text-primary"></i> Type d'agence</span>
                                    <span class="badge bg-primary">{{ $agence->agency_type }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-envelope me-2 text-primary"></i> Email professionnel</span>
                                    <span class="fw-bold">{{ $agence->email_pro }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-phone me-2 text-primary"></i> Téléphone professionnel</span>
                                    <span class="fw-bold">{{ $agence->phone_pro }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Photos de l'agence -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100 agency-card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0"><i class="fas fa-image me-2"></i> Photo de l'agence</h4>
                        </div>
                        <div class="card-body text-center">
                            @if($agence->agency_photo)
                                <img src="{{ asset('storage/' . $agence->agency_photo) }}" alt="Photo de l'agence" class="img-fluid rounded" style="max-height: 300px;">
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i> Aucune photo d'agence disponible
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Logo de l'agence -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100 agency-card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0"><i class="fas fa-image me-2"></i> Logo de l'agence</h4>
                        </div>
                        <div class="card-body text-center">
                            @if($agence->agency_logo)
                                <img src="{{ asset('storage/' . $agence->agency_logo) }}" alt="Logo de l'agence" class="img-fluid rounded" style="max-height: 300px;">
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i> Aucun logo d'agence disponible
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3">Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible et entraînera la suppression de toutes vos données, y compris les informations de votre agence.</p>
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i> Pour confirmer, veuillez entrer votre mot de passe.
                    </div>
                    
                    <form id="delete-account-form" action="{{ route('partner.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" form="delete-account-form" class="btn btn-danger">Supprimer définitivement</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('includes.footer')
</body>
</html>