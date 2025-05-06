<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/Dashboard/partner/dashboard.blade.php -->
@extends('administration.layouts.app')

@section('title', 'Tableau de Bord Partenaire')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard Partenaire</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard Partenaire</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card-group">
        <!-- Total Réservations -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-calendar-check font-20 text-primary"></i>
                        <p class="font-16 m-b-5">Total Réservations</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $totalReservations }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenus Totaux -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-euro-sign font-20 text-success"></i>
                        <p class="font-16 m-b-5">Revenus Totaux</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $totalRevenus }} €</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Actifs -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-luggage-cart font-20 text-info"></i>
                        <p class="font-16 m-b-5">Services Actifs</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $servicesActifs }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Réservations en Attente -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-clock font-20 text-warning"></i>
                        <p class="font-16 m-b-5">Réservations en Attente</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $reservationsEnAttente }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection