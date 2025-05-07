@extends('Dashboard.layouts.app')

@section('title', 'Confirmation de Réservation')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
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
                        <li class="breadcrumb-item active" aria-current="page">Confirmation</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="fas fa-check-circle me-2"></i> Réservation confirmée</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-check-circle text-success fa-5x mb-3"></i>
                        <h2 class="mb-3">Votre réservation a été confirmée avec succès!</h2>
                        <p class="lead">Numéro de réservation: <strong>{{ $reservation->id }}</strong></p>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Détails du voyage</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong><i class="fas fa-map-marker-alt text-primary me-2"></i> Départ:</strong> {{ $reservation->voyage->destinationDepart->ville }}</p>
                                    <p><strong><i class="fas fa-map-marker-alt text-danger me-2"></i> Arrivée:</strong> {{ $reservation->voyage->destinationArrive->ville }}</p>
                                    <p><strong><i class="fas fa-calendar-alt text-primary me-2"></i> Date:</strong> {{ \Carbon\Carbon::parse($reservation->voyage->date_depart)->format('d/m/Y') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong><i class="fas fa-clock text-primary me-2"></i> Heure:</strong> {{ $reservation->voyage->heure_depart }}</p>
                                    <p><strong><i class="fas fa-users text-primary me-2"></i> Nombre de places:</strong> {{ $reservation->nombre_places }}</p>
                                    <p><strong><i class="fas fa-money-bill-wave text-primary me-2"></i> Montant total:</strong> {{ number_format($reservation->montant_total, 0, ',', ' ') }} FCFA</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Informations de l'agence</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong><i class="fas fa-building text-primary me-2"></i> Agence:</strong> {{ $reservation->voyage->agence->agency_name }}</p>
                                    <p><strong><i class="fas fa-phone text-primary me-2"></i> Téléphone:</strong> {{ $reservation->voyage->agence->phone_pro }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong><i class="fas fa-envelope text-primary me-2"></i> Email:</strong> {{ $reservation->voyage->agence->email_pro }}</p>
                                    <p><strong><i class="fas fa-tag text-primary me-2"></i> Type:</strong> {{ $reservation->voyage->agence->agency_type }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Un email de confirmation a été envoyé à votre adresse email. Veuillez présenter votre numéro de réservation lors de votre voyage.
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('client.reservations.list') }}" class="btn btn-primary me-2">
                            <i class="fas fa-list me-2"></i> Voir mes réservations
                        </a>
                        <a href="{{ route('client.dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-tachometer-alt me-2"></i> Retour au tableau de bord
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection