@extends('Dashboard.layouts.app')

@section('title', 'Mon Profil')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Mon Profil</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('client.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mon Profil</li>
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
                <div class="card-footer">
                    <a href="{{ route('client.profile.edit') }}" class="btn btn-primary w-100">
                        <i class="fas fa-edit me-2"></i> Modifier mes informations
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-chart-bar me-2"></i> Mes statistiques</h4>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="text-center p-3 border rounded">
                                <i class="fas fa-ticket-alt fa-2x text-primary mb-2"></i>
                                <h5>Réservations</h5>
                                <h3 class="mb-0">{{ $user->reservations->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 border rounded">
                                <i class="fas fa-star fa-2x text-primary mb-2"></i>
                                <h5>Avis</h5>
                                <h3 class="mb-0">{{ $user->avis->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 border rounded">
                                <i class="fas fa-map-marker-alt fa-2x text-primary mb-2"></i>
                                <h5>Destinations</h5>
                                <h3 class="mb-0">{{ $user->reservations->unique('voyage.destination_arrive_id')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 border rounded">
                                <i class="fas fa-building fa-2x text-primary mb-2"></i>
                                <h5>Agences</h5>
                                <h3 class="mb-0">{{ $user->reservations->unique('voyage.agence_id')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions rapides -->
        <div class="col-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-bolt me-2"></i> Actions rapides</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('client.reservations.add') }}" class="btn btn-outline-primary w-100 py-3">
                                <i class="fas fa-plus-circle me-2"></i> Nouvelle réservation
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('client.reservations.list') }}" class="btn btn-outline-primary w-100 py-3">
                                <i class="fas fa-list me-2"></i> Mes réservations
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('client.dashboard') }}" class="btn btn-outline-primary w-100 py-3">
                                <i class="fas fa-tachometer-alt me-2"></i> Tableau de bord
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection