@extends('Dashboard.layouts.app')

@section('title', 'Détails de l\'utilisateur')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Détails de l'utilisateur</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.users.list') }}">Utilisateurs</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Alertes -->
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
        <!-- Informations de l'utilisateur -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        @if($user->profile_photo_path)
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="{{ $user->name }}" class="rounded-circle" width="150" height="150">
                        @else
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px;">
                                <i class="fas fa-user fa-4x text-secondary"></i>
                            </div>
                        @endif
                    </div>
                    <h4>{{ $user->name }}</h4>
                    <p class="text-muted">
                        @if($user->role == 'admin')
                            <span class="badge bg-danger">Administrateur</span>
                        @elseif($user->role == 'partenaire')
                            <span class="badge bg-info">Partenaire</span>
                        @else
                            <span class="badge bg-success">Client</span>
                        @endif
                    </p>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i> {{ $user->email }}</p>
                    <p class="mb-1"><i class="fas fa-phone me-2"></i> {{ $user->telephone ?? 'Non renseigné' }}</p>
                    <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i> {{ $user->adresse ?? 'Non renseignée' }}</p>
                    <p class="mb-1"><i class="fas fa-calendar me-2"></i> Inscrit le {{ $user->created_at->format('d/m/Y') }}</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-1"></i> Modifier
                        </a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                            <i class="fas fa-trash me-1"></i> Supprimer
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Statistiques de l'utilisateur -->
            <div class="card mt-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Statistiques</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <h5>{{ $reservationsCount }}</h5>
                            <p class="text-muted mb-0">Réservations</p>
                        </div>
                        <div class="col-6 mb-3">
                            <h5>{{ number_format($totalSpent, 0, ',', ' ') }} FCFA</h5>
                            <p class="text-muted mb-0">Dépensés</p>
                        </div>
                        <div class="col-6">
                            <h5>{{ $lastLoginDate ? $lastLoginDate->format('d/m/Y') : 'Jamais' }}</h5>
                            <p class="text-muted mb-0">Dernière connexion</p>
                        </div>
                        <div class="col-6">
                            <h5>{{ $user->email_verified_at ? 'Oui' : 'Non' }}</h5>
                            <p class="text-muted mb-0">Email vérifié</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Actions supplémentaires -->
            <div class="card mt-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#sendEmailModal">
                            <i class="fas fa-envelope me-2"></i> Envoyer un email
                        </button>
                        
                        @if(!$user->email_verified_at)
                            <form action="{{ route('admin.users.verify-email', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-success w-100">
                                    <i class="fas fa-check-circle me-2"></i> Vérifier l'email
                                </button>
                            </form>
                        @endif
                        
                        <form action="{{ route('admin.users.reset-password', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-warning w-100">
                                <i class="fas fa-key me-2"></i> Réinitialiser le mot de passe
                            </button>
                        </form>
                        
                        @if($user->is_active)
                            <form action="{{ route('admin.users.deactivate', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100">
                                    <i class="fas fa-ban me-2"></i> Désactiver le compte
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.users.activate', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-success w-100">
                                    <i class="fas fa-check me-2"></i> Activer le compte
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Onglets d'informations -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <ul class="nav nav-tabs card-header-tabs" id="userTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="reservations-tab" data-bs-toggle="tab" data-bs-target="#reservations" type="button" role="tab" aria-controls="reservations" aria-selected="true">Réservations</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false">Activité</button>
                        </li>
                        @if($user->role == 'partenaire')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="agency-tab" data-bs-toggle="tab" data-bs-target="#agency" type="button" role="tab" aria-controls="agency" aria-selected="false">Agence</button>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="userTabsContent">
                        <!-- Onglet des réservations -->
                        <div class="tab-pane fade show active" id="reservations" role="tabpanel" aria-labelledby="reservations-tab">
                            @if($reservations->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Trajet</th>
                                                <th>Date</th>
                                                <th>Places</th>
                                                <th>Montant</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reservations as $reservation)
                                                <tr>
                                                    <td>{{ $reservation->id }}</td>
                                                    <td>{{ $reservation->voyage->destinationDepart->ville }} → {{ $reservation->voyage->destinationArrive->ville }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($reservation->voyage->date_depart)->format('d/m/Y') }}</td>
                                                    <td>{{ $reservation->nombre_places }}</td>
                                                    <td>{{ number_format($reservation->montant_total, 0, ',', ' ') }} FCFA</td>
                                                    <td>
                                                        @if($reservation->statut == 'en_attente')
                                                            <span class="badge bg-warning">En attente</span>
                                                        @elseif($reservation->statut == 'confirmee')
                                                            <span class="badge bg-success">Confirmée</span>
                                                        @elseif($reservation->statut == 'annulee')
                                                            <span class="badge bg-danger">Annulée</span>
                                                        @else
                                                            <span class="badge bg-secondary">{{ $reservation->statut }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.reservations.show', $reservation->id) }}" class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $reservations->links() }}
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-ticket-alt fa-3x text-muted mb-3"></i>
                                    <p>Cet utilisateur n'a pas encore effectué de réservation.</p>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Onglet de l'activité -->
                        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                            @if($activities->count() > 0)
                                <div class="timeline">
                                    @foreach($activities as $activity)
                                        <div class="timeline-item">
                                            <div class="timeline-badge {{ $activity->type == 'login' ? 'bg-success' : ($activity->type == 'reservation' ? 'bg-primary' : 'bg-info') }}">
                                                <i class="fas {{ $activity->type == 'login' ? 'fa-sign-in-alt' : ($activity->type == 'reservation' ? 'fa-ticket-alt' : 'fa-user-edit') }}"></i>
                                            </div>
                                            <div class="timeline-content">
                                                <h6 class="mb-1">{{ $activity->description }}</h6>
                                                <p class="text-muted mb-0">
                                                    <small><i class="fas fa-clock me-1"></i> {{ $activity->created_at->format('d/m/Y H:i') }}</small>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $activities->links() }}
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-history fa-3x text-muted mb-3"></i>
                                    <p>Aucune activité enregistrée pour cet utilisateur.</p>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Onglet de l'agence (pour les partenaires) -->
                        @if($user->role == 'partenaire')
                            <div class="tab-pane fade" id="agency" role="tabpanel" aria-labelledby="agency-tab">
                                @if($agency)
                                    <div class="row mb-4">
                                        <div class="col-md-4 text-center">
                                            @if($agency->agency_logo)
                                                <img src="{{ asset('storage/' . $agency->agency_logo) }}" alt="{{ $agency->agency_name }}" class="img-fluid mb-3" style="max-height: 150px;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                                                    <i class="fas fa-building fa-4x text-secondary"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <h4>{{ $agency->agency_name }}</h4>
                                            <p class="mb-2">
                                                <span class="badge bg-primary">{{ $agency->agency_type }}</span>
                                            </p>
                                            <p class="mb-1"><i class="fas fa-envelope me-2"></i> {{ $agency->email_pro }}</p>
                                            <p class="mb-1"><i class="fas fa-phone me-2"></i> {{ $agency->phone_pro }}</p>
                                            <p class="mb-3"><i class="fas fa-map-marker-alt me-2"></i> {{ $user->adresse }}</p>
                                            
                                            <a href="{{ route('admin.partners.show', $agency->id) }}" class="btn btn-primary">
                                                <i class="fas fa-eye me-1"></i> Voir les détails de l'agence
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <h5 class="mt-4 mb-3">Statistiques de l'agence</h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <div class="card bg-light">
                                                <div class="card-body text-center">
                                                    <h3 class="mb-0">{{ $agencyStats['voyages_count'] }}</h3>
                                                    <p class="text-muted mb-0">Voyages</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card bg-light">
                                                <div class="card-body text-center">
                                                    <h3 class="mb-0">{{ $agencyStats['reservations_count'] }}</h3>
                                                    <p class="text-muted mb-0">Réservations</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card bg-light">
                                                <div class="card-body text-center">
                                                    <h3 class="mb-0">{{ number_format($agencyStats['revenue'], 0, ',', ' ') }} FCFA</h3>
                                                    <p class="text-muted mb-0">Revenus</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <h5 class="mt-4 mb-3">Derniers voyages</h5>
                                    @if($agencyVoyages->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Trajet</th>
                                                        <th>Date</th>
                                                        <th>Prix</th>
                                                        <th>Places</th>
                                                        <th>Statut</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($agencyVoyages as $voyage)
                                                        <tr>
                                                            <td>{{ $voyage->destinationDepart->ville }} → {{ $voyage->destinationArrive->ville }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($voyage->date_depart)->format('d/m/Y') }}</td>
                                                            <td>{{ number_format($voyage->montant, 0, ',', ' ') }} FCFA</td>
                                                            <td>{{ $voyage->nbre_place }}</td>
                                                            <td>
                                                                @if($voyage->statut == 'actif')
                                                                    <span class="badge bg-success">Actif</span>
                                                                @else
                                                                    <span class="badge bg-danger">Inactif</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="text-center py-4">
                                            <i class="fas fa-route fa-3x text-muted mb-3"></i>
                                            <p>Cette agence n'a pas encore créé de voyage.</p>
                                        </div>
                                    @endif
                                @else
                                    <div class="text-center py-4">
                                        <i class="fas fa-building fa-3x text-muted mb-3"></i>
                                        <p>Cet utilisateur n'a pas encore créé d'agence.</p>
                                        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus me-1"></i> Créer une agence pour ce partenaire
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de suppression -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer l'utilisateur <strong>{{ $user->name }}</strong> ?</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Cette action est irréversible et supprimera toutes les données associées à cet utilisateur.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal d'envoi d'email -->
    <div class="modal fade" id="sendEmailModal" tabindex="-1" aria-labelledby="sendEmailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendEmailModalLabel">Envoyer un email à {{ $user->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.users.send-email', $user->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email_subject" class="form-label">Sujet</label>
                            <input type="text" class="form-control" id="email_subject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_message" class="form-label">Message</label>
                            <textarea class="form-control" id="email_message" name="message" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
