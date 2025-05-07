@extends('Dashboard.layouts.app')

@section('title', 'Détails de la Réservation')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Détails de la Réservation</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('client.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('client.reservations.list') }}">Mes Réservations</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Détails #{{ $reservation->id }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
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

    <div class="row mb-4">
        <div class="col-md-6">
            <a href="{{ route('client.reservations.list') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i> Retour à mes réservations
            </a>
        </div>
        <div class="col-md-6 text-md-end">
            <span class="badge rounded-pill status-{{ $reservation->statut }} status-badge">
                @if($reservation->statut == 'en_attente')
                    En attente
                @elseif($reservation->statut == 'confirmee')
                    Confirmée
                @elseif($reservation->statut == 'annulee')
                    Annulée
                @elseif($reservation->statut == 'terminee')
                    Terminée
                @endif
            </span>
        </div>
    </div>

    <div class="row">
        <!-- Détails du voyage -->
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm h-100 detail-card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-route me-2"></i> Détails du voyage</h5>
                </div>
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        {{ $reservation->voyage->destinationDepart->ville }} → {{ $reservation->voyage->destinationArrive->ville }}
                    </h4>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-2">
                                <i class="fas fa-calendar-day text-primary me-2"></i> 
                                <strong>Date de départ:</strong> 
                                {{ \Carbon\Carbon::parse($reservation->voyage->date_depart)->format('d/m/Y') }}
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-clock text-primary me-2"></i> 
                                <strong>Heure de départ:</strong> 
                                {{ $reservation->voyage->heure_depart }}
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-building text-primary me-2"></i> 
                                <strong>Agence:</strong> 
                                {{ $reservation->voyage->agence->agency_name }}
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-phone text-primary me-2"></i> 
                                <strong>Téléphone de l'agence:</strong> 
                                {{ $reservation->voyage->agence->phone_pro }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-2">
                                <i class="fas fa-users text-primary me-2"></i> 
                                <strong>Nombre de places:</strong> 
                                {{ $reservation->nombre_places }}
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-money-bill-wave text-primary me-2"></i> 
                                <strong>Prix unitaire:</strong> 
                                {{ number_format($reservation->voyage->montant, 0, ',', ' ') }} FCFA
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-money-check-alt text-primary me-2"></i> 
                                <strong>Montant total:</strong> 
                                {{ number_format($reservation->montant_total, 0, ',', ' ') }} FCFA
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-tag text-primary me-2"></i> 
                                <strong>Type de transport:</strong> 
                                {{ $reservation->voyage->agence->agency_type }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> 
                        <strong>Information importante:</strong> Veuillez vous présenter au moins 30 minutes avant l'heure de départ avec une pièce d'identité valide.
                    </div>
                    
                    @if($reservation->statut == 'en_attente' && \Carbon\Carbon::parse($reservation->voyage->date_depart)->isFuture())
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">
                                <i class="fas fa-times me-2"></i> Annuler cette réservation
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Informations de réservation -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 detail-card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> Informations de réservation</h5>
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <i class="fas fa-user text-primary me-2"></i> 
                        <strong>Nom:</strong> 
                        {{ $reservation->nom }}
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-envelope text-primary me-2"></i> 
                        <strong>Email:</strong> 
                        {{ $reservation->email }}
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-phone text-primary me-2"></i> 
                        <strong>Téléphone:</strong> 
                        {{ $reservation->telephone }}
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-calendar-check text-primary me-2"></i> 
                        <strong>Date de réservation:</strong> 
                        {{ $reservation->created_at->format('d/m/Y à H:i') }}
                    </p>
                    
                    <hr>
                    
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-outline-primary" onclick="window.print()">
                            <i class="fas fa-print me-2"></i> Imprimer cette réservation
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Autres informations -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow-sm detail-card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-map-marked-alt me-2"></i> Informations sur les destinations</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h5>Point de départ: {{ $reservation->voyage->destinationDepart->ville }}</h5>
                            <p>{{ $reservation->voyage->destinationDepart->description ?? 'Aucune description disponible.' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5>Destination: {{ $reservation->voyage->destinationArrive->ville }}</h5>
                            <p>{{ $reservation->voyage->destinationArrive->description ?? 'Aucune description disponible.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation d'annulation -->
    @if($reservation->statut == 'en_attente' && \Carbon\Carbon::parse($reservation->voyage->date_depart)->isFuture())
        <div class="modal fade" id="cancelModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirmer l'annulation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir annuler cette réservation ?</p>
                        <p><strong>Trajet:</strong> {{ $reservation->voyage->destinationDepart->ville }} → {{ $reservation->voyage->destinationArrive->ville }}</p>
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($reservation->voyage->date_depart)->format('d/m/Y') }} à {{ $reservation->voyage->heure_depart }}</p>
                        <p class="mb-0"><strong>Places:</strong> {{ $reservation->nombre_places }}</p>
                        
                        <div class="alert alert-warning mt-3">
                            <i class="fas fa-exclamation-triangle me-2"></i> Cette action est irréversible.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non, garder ma réservation</button>
                        <form action="{{ route('client.reservations.cancel', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Oui, annuler</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
    .status-badge {
        font-size: 1rem;
        padding: 0.5em 1em;
    }
    
    .status-en-attente {
        background-color: #ffc107;
        color: #212529;
    }
    
    .status-confirmee {
        background-color: #198754;
        color: white;
    }
    
    .status-annulee {
        background-color: #dc3545;
        color: white;
    }
    
    .status-terminee {
        background-color: #6c757d;
        color: white;
    }
    
    .detail-card {
        border-left: 4px solid #13357B;
    }
</style>
@endsection