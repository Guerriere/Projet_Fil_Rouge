@extends('Dashboard.layouts.app')

@section('title', 'Mes Réservations')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Mes Réservations</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('client.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mes Réservations</li>
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

    <!-- Section des réservations -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i> Liste de mes réservations</h5>
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
                                <th>Heure</th>
                                <th>Places</th>
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
                                    <td>{{ $reservation->voyage->heure_depart }}</td>
                                    <td>{{ $reservation->nombre_places }}</td>
                                    <td>
                                        @if($reservation->statut == 'en_attente')
                                            <span class="badge bg-warning status-en-attente">En attente</span>
                                        @elseif($reservation->statut == 'confirmee')
                                            <span class="badge bg-success status-confirmee">Confirmée</span>
                                        @elseif($reservation->statut == 'en_cours')
                                            <span class="badge bg-info">En cours</span>
                                        @elseif($reservation->statut == 'terminee')
                                            <span class="badge bg-secondary status-terminee">Terminée</span>
                                        @elseif($reservation->statut == 'annulee')
                                            <span class="badge bg-danger status-annulee">Annulée</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($reservation->montant_total, 0, ',', ' ') }} FCFA</td>
                                    <td>
                                        <a href="{{ route('client.reservations.show', $reservation->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($reservation->statut == 'en_attente')
                                            <form action="{{ route('client.reservations.cancel', $reservation->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation?')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        @endif
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
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Vous n'avez pas encore de réservations. 
                    <a href="{{ route('client.reservations.add') }}" class="alert-link">Réservez votre premier voyage</a>.
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .status-badge {
        font-size: 0.8rem;
        padding: 0.35em 0.65em;
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
</style>
@endsection