@extends('Dashboard.layouts.app')

@section('title', 'Tableau de Bord Client')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard Client</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard Client</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Messages de notification -->
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

    <div class="card-group">
        <!-- Total Réservations -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-ticket-alt font-20 text-primary"></i>
                        <p class="font-16 m-b-5">Total Réservations</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $totalReservations }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Réservations en cours -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-clock font-20 text-success"></i>
                        <p class="font-16 m-b-5">Réservations en cours</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $reservationsEnCours }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Réservations terminées -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-check-circle font-20 text-info"></i>
                        <p class="font-16 m-b-5">Réservations terminées</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $reservationsTerminees }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Montant total -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-money-bill-wave font-20 text-warning"></i>
                        <p class="font-16 m-b-5">Montant total</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ number_format($montantTotal, 0, ',', ' ') }} FCFA</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-bolt me-2"></i> Actions rapides</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('agence.index') }}" class="btn btn-outline-primary w-100 py-3">
                                <i class="fas fa-plus-circle me-2"></i> Nouvelle réservation
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('client.reservations.list') }}" class="btn btn-outline-primary w-100 py-3">
                                <i class="fas fa-list me-2"></i> Mes réservations
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('client.profile') }}" class="btn btn-outline-primary w-100 py-3">
                                <i class="fas fa-user me-2"></i> Mon profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dernières réservations -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-history me-2"></i> Dernières réservations</h5>
                </div>
                <div class="card-body">
                    @if($reservations->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Départ</th>
                                        <th>Arrivée</th>
                                        <th>Date</th>
                                        <th>Statut</th>
                                        <th>Montant</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations as $reservation)
                                        <tr>
                                            <td>{{ $reservation->id }}</td>
                                            <td>{{ $reservation->voyage->destinationDepart->ville }}</td>
                                            <td>{{ $reservation->voyage->destinationArrive->ville }}</td>
                                            <td>{{ \Carbon\Carbon::parse($reservation->voyage->date_depart)->format('d/m/Y') }}</td>
                                            <td>
                                                @if($reservation->statut == 'en_attente')
                                                    <span class="badge bg-warning">En attente</span>
                                                @elseif($reservation->statut == 'confirmee')
                                                    <span class="badge bg-success">Confirmée</span>
                                                @elseif($reservation->statut == 'en_cours')
                                                    <span class="badge bg-info">En cours</span>
                                                @elseif($reservation->statut == 'terminee')
                                                    <span class="badge bg-secondary">Terminée</span>
                                                @elseif($reservation->statut == 'annulee')
                                                    <span class="badge bg-danger">Annulée</span>
                                                @endif
                                            </td>
                                            <td>{{ number_format($reservation->montant_total, 0, ',', ' ') }} FCFA</td>
                                            <td>
                                                <a href="{{ route('client.reservations.show', $reservation->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('client.reservations.list') }}" class="btn btn-outline-primary">
                                Voir toutes mes réservations
                            </a>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Vous n'avez pas encore de réservations. 
                            <a href="{{ route('client.reservations.add') }}" class="alert-link">Réservez votre premier voyage</a>.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection