@extends('Dashboard.layouts.app')

@section('title', 'Gestion des réservations')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Gestion des réservations</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Réservations</li>
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

    <!-- Statistiques des réservations -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">Total</h6>
                            <h3 class="mb-0">{{ $totalReservations }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-ticket-alt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">En attente</h6>
                            <h3 class="mb-0">{{ $pendingReservations }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-clock fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">Confirmées</h6>
                            <h3 class="mb-0">{{ $confirmedReservations }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-check fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">Annulées</h6>
                            <h3 class="mb-0">{{ $cancelledReservations }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-times fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carte principale -->
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Liste des réservations</h5>
            <div class="btn-group">
                <a href="{{ route('admin.reservations.export', ['format' => 'csv']) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-file-csv me-1"></i> CSV
                </a>
                <a href="{{ route('admin.reservations.export', ['format' => 'excel']) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-file-excel me-1"></i> Excel
                </a>
                <a href="{{ route('admin.reservations.export', ['format' => 'pdf']) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-file-pdf me-1"></i> PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Filtres -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <form action="{{ route('admin.reservations.list') }}" method="GET" class="row g-3">
                        <div class="col-md-3">
                            <input type="text" name="search" class="form-control" placeholder="Rechercher par ID, nom..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <select name="statut" class="form-select">
                                <option value="">Tous les statuts</option>
                                <option value="en_attente" {{ request('statut') == 'en_attente' ? 'selected' : '' }}>En attente</option>
                                <option value="confirmee" {{ request('statut') == 'confirmee' ? 'selected' : '' }}>Confirmée</option>
                                <option value="annulee" {{ request('statut') == 'annulee' ? 'selected' : '' }}>Annulée</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="date_debut" class="form-control" placeholder="Date début" value="{{ request('date_debut') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="date_fin" class="form-control" placeholder="Date fin" value="{{ request('date_fin') }}">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary me-2">Filtrer</button>
                            <a href="{{ route('admin.reservations.list') }}" class="btn btn-secondary">Réinitialiser</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tableau des réservations -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Trajet</th>
                            <th>Date</th>
                            <th>Places</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th>Date de réservation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>
                                    <div>{{ $reservation->nom }}</div>
                                    <div class="text-muted small">{{ $reservation->email }}</div>
                                </td>
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
                                <td>{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.reservations.show', $reservation->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal{{ $reservation->id }}" {{ $reservation->statut != 'en_attente' ? 'disabled' : '' }}>
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal{{ $reservation->id }}" {{ $reservation->statut != 'en_attente' ? 'disabled' : '' }}>
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Modal de confirmation -->
                                    <div class="modal fade" id="confirmModal{{ $reservation->id }}" tabindex="-1" aria-labelledby="confirmModalLabel{{ $reservation->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmModalLabel{{ $reservation->id }}">Confirmer la réservation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir confirmer la réservation #{{ $reservation->id }} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    <form action="{{ route('admin.reservations.confirm', $reservation->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success">Confirmer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Modal d'annulation -->
                                    <div class="modal fade" id="cancelModal{{ $reservation->id }}" tabindex="-1" aria-labelledby="cancelModalLabel{{ $reservation->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="cancelModalLabel{{ $reservation->id }}">Annuler la réservation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir annuler la réservation #{{ $reservation->id }} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    <form action="{{ route('admin.reservations.cancel', $reservation->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-danger">Annuler la réservation</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Aucune réservation trouvée</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $reservations->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
