@extends('Dashboard.layouts.app')

@section('title', 'Tableau de bord administrateur')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tableau de bord administrateur</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Vue d'ensemble</li>
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

    <!-- Cartes de statistiques -->
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-white">Utilisateurs</h5>
                            <h2 class="mb-0">{{ $totalUsers }}</h2>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-white-50">{{ $newUsersThisMonth }} nouveaux ce mois</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-white">Réservations</h5>
                            <h2 class="mb-0">{{ $totalReservations }}</h2>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-ticket-alt fa-2x text-success"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-white-50">{{ $newReservationsThisMonth }} nouvelles ce mois</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-white">Partenaires</h5>
                            <h2 class="mb-0">{{ $totalPartners }}</h2>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-handshake fa-2x text-info"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-white-50">{{ $newPartnersThisMonth }} nouveaux ce mois</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-white">Revenus</h5>
                            <h2 class="mb-0">{{ number_format($totalRevenue, 0, ',', ' ') }} FCFA</h2>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-money-bill-wave fa-2x text-warning"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-white-50">{{ number_format($revenueThisMonth, 0, ',', ' ') }} FCFA ce mois</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphiques et statistiques -->
    <div class="row mt-4">
        <!-- Graphique des réservations -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Évolution des réservations</h5>
                </div>
                <div class="card-body">
                    <canvas id="reservationsChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Répartition des utilisateurs -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Répartition des utilisateurs</h5>
                </div>
                <div class="card-body">
                    <canvas id="usersPieChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques des voyages -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Top 5 des destinations</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Destination</th>
                                    <th>Réservations</th>
                                    <th>Revenus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topDestinations as $destination)
                                <tr>
                                    <td>{{ $destination->ville }}</td>
                                    <td>{{ $destination->reservations_count }}</td>
                                    <td>{{ number_format($destination->revenue, 0, ',', ' ') }} FCFA</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Top 5 des agences</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Agence</th>
                                    <th>Voyages</th>
                                    <th>Revenus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topAgencies as $agency)
                                <tr>
                                    <td>{{ $agency->agency_name }}</td>
                                    <td>{{ $agency->voyages_count }}</td>
                                    <td>{{ number_format($agency->revenue, 0, ',', ' ') }} FCFA</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dernières activités -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Dernières réservations</h5>
                    <a href="{{ route('admin.reservations.list') }}" class="btn btn-sm btn-primary">Voir tout</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client</th>
                                    <th>Trajet</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latestReservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->id }}</td>
                                    <td>{{ $reservation->nom }}</td>
                                    <td>{{ $reservation->voyage->destinationDepart->ville }} → {{ $reservation->voyage->destinationArrive->ville }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservation->voyage->date_depart)->format('d/m/Y') }}</td>
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Nouveaux utilisateurs</h5>
                    <a href="{{ route('admin.users.list') }}" class="btn btn-sm btn-primary">Voir tout</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Date d'inscription</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latestUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role == 'admin')
                                            <span class="badge bg-danger">Admin</span>
                                        @elseif($user->role == 'partenaire')
                                            <span class="badge bg-info">Partenaire</span>
                                        @else
                                            <span class="badge bg-success">Client</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Accès rapides -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Accès rapides</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.users.list') }}" class="btn btn-outline-primary w-100 p-3">
                                <i class="fas fa-users fa-2x mb-2"></i>
                                <div>Gestion des utilisateurs</div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.partners.list') }}" class="btn btn-outline-info w-100 p-3">
                                <i class="fas fa-handshake fa-2x mb-2"></i>
                                <div>Gestion des partenaires</div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.reservations.list') }}" class="btn btn-outline-success w-100 p-3">
                                <i class="fas fa-ticket-alt fa-2x mb-2"></i>
                                <div>Gestion des réservations</div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.payments.list') }}" class="btn btn-outline-warning w-100 p-3">
                                <i class="fas fa-money-bill-wave fa-2x mb-2"></i>
                                <div>Gestion des paiements</div>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.voyages.list') }}" class="btn btn-outline-secondary w-100 p-3">
                                <i class="fas fa-route fa-2x mb-2"></i>
                                <div>Gestion des voyages</div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.destinations.list') }}" class="btn btn-outline-dark w-100 p-3">
                                <i class="fas fa-map-marker-alt fa-2x mb-2"></i>
                                <div>Gestion des destinations</div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.reports') }}" class="btn btn-outline-danger w-100 p-3">
                                <i class="fas fa-chart-bar fa-2x mb-2"></i>
                                <div>Rapports et statistiques</div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.settings') }}" class="btn btn-outline-dark w-100 p-3">
                                <i class="fas fa-cog fa-2x mb-2"></i>
                                <div>Paramètres du site</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts pour les graphiques -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Graphique des réservations
    const reservationsCtx = document.getElementById('reservationsChart').getContext('2d');
    const reservationsChart = new Chart(reservationsCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($reservationChartLabels) !!},
            datasets: [{
                label: 'Réservations',
                data: {!! json_encode($reservationChartData) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });

    // Graphique de répartition des utilisateurs
    const usersCtx = document.getElementById('usersPieChart').getContext('2d');
    const usersPieChart = new Chart(usersCtx, {
        type: 'pie',
        data: {
            labels: ['Clients', 'Partenaires', 'Administrateurs'],
            datasets: [{
                data: [{{ $clientsCount }}, {{ $partnersCount }}, {{ $adminsCount }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 99, 132, 0.7)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endsection
