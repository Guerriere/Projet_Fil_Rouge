@extends('Dashboard.layouts.app')

@section('title', 'Rapports et statistiques')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Rapports et statistiques</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Rapports</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Filtres de date -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.reports') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="date_debut" class="form-label">Date de début</label>
                    <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ request('date_debut', $defaultStartDate) }}">
                </div>
                <div class="col-md-4">
                    <label for="date_fin" class="form-label">Date de fin</label>
                    <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ request('date_fin', $defaultEndDate) }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Appliquer</button>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="periodDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Périodes prédéfinies
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="periodDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.reports', ['period' => 'today']) }}">Aujourd'hui</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.reports', ['period' => 'yesterday']) }}">Hier</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.reports', ['period' => 'this_week']) }}">Cette semaine</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.reports', ['period' => 'last_week']) }}">Semaine dernière</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.reports', ['period' => 'this_month']) }}">Ce mois</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.reports', ['period' => 'last_month']) }}">Mois dernier</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.reports', ['period' => 'this_year']) }}">Cette année</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Résumé des statistiques -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">Réservations</h6>
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
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">Revenus</h6>
                            <h3 class="mb-0">{{ number_format($totalRevenue, 0, ',', ' ') }} FCFA</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">Nouveaux clients</h6>
                            <h3 class="mb-0">{{ $newUsers }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-user-plus fa-2x text-info"></i>
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
                            <h6 class="card-title text-white">Voyages</h6>
                            <h3 class="mb-0">{{ $totalVoyages }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-route fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphiques -->
    <div class="row mb-4">
        <!-- Graphique des réservations -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Évolution des réservations</h5>
                </div>
                <div class="card-body">
                    <canvas id="reservationsChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Graphique des revenus -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Évolution des revenus</h5>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques par destination et agence -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Top 10 des destinations</h5>
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
                    <h5 class="card-title mb-0">Top 10 des agences</h5>
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

    <!-- Statistiques des réservations par statut -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Réservations par statut</h5>
                </div>
                <div class="card-body">
                    <canvas id="reservationStatusChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Réservations par type de transport</h5>
                </div>
                <div class="card-body">
                    <canvas id="transportTypeChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Boutons d'exportation -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Exporter les rapports</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.reports.export', ['type' => 'reservations', 'format' => 'excel', 'date_debut' => request('date_debut', $defaultStartDate), 'date_fin' => request('date_fin', $defaultEndDate)]) }}" class="btn btn-outline-success w-100">
                                <i class="fas fa-file-excel me-2"></i> Rapport des réservations
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.reports.export', ['type' => 'revenue', 'format' => 'excel', 'date_debut' => request('date_debut', $defaultStartDate), 'date_fin' => request('date_fin', $defaultEndDate)]) }}" class="btn btn-outline-success w-100">
                                <i class="fas fa-file-excel me-2"></i> Rapport des revenus
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.reports.export', ['type' => 'users', 'format' => 'excel', 'date_debut' => request('date_debut', $defaultStartDate), 'date_fin' => request('date_fin', $defaultEndDate)]) }}" class="btn btn-outline-success w-100">
                                <i class="fas fa-file-excel me-2"></i> Rapport des utilisateurs
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.reports.export', ['type' => 'complete', 'format' => 'excel', 'date_debut' => request('date_debut', $defaultStartDate), 'date_fin' => request('date_fin', $defaultEndDate)]) }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-file-excel me-2"></i> Rapport complet
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

    // Graphique des revenus
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($revenueChartLabels) !!},
            datasets: [{
                label: 'Revenus (FCFA)',
                data: {!! json_encode($revenueChartData) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Graphique des réservations par statut
    const statusCtx = document.getElementById('reservationStatusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'pie',
        data: {
            labels: ['En attente', 'Confirmées', 'Annulées'],
            datasets: [{
                data: [{{ $pendingReservations }}, {{ $confirmedReservations }}, {{ $cancelledReservations }}],
                backgroundColor: [
                    'rgba(255, 193, 7, 0.7)',
                    'rgba(40, 167, 69, 0.7)',
                    'rgba(220, 53, 69, 0.7)'
                ],
                borderColor: [
                    'rgba(255, 193, 7, 1)',
                    'rgba(40, 167, 69, 1)',
                    'rgba(220, 53, 69, 1)'
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

    // Graphique des réservations par type de transport
    const transportCtx = document.getElementById('transportTypeChart').getContext('2d');
    const transportChart = new Chart(transportCtx, {
        type: 'pie',
        data: {
            labels: ['Bus', 'Train', 'Avion'],
            datasets: [{
                data: [{{ $busReservations }}, {{ $trainReservations }}, {{ $avionReservations }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 99, 132, 0.7)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
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
