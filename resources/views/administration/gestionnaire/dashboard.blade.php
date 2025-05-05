@extends('administration.layouts.app')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
        <!-- Total Utilisateurs -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-users font-20 text-primary"></i>
                        <p class="font-16 m-b-5">Total Utilisateurs</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $totalUsers }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Partenaires -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-handshake font-20 text-success"></i>
                        <p class="font-16 m-b-5">Total Partenaires</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $totalPartners }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Clients -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-user font-20 text-info"></i>
                        <p class="font-16 m-b-5">Total Clients</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $totalClients }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Partenaires en attente -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-clock font-20 text-warning"></i>
                        <p class="font-16 m-b-5">Partenaires en attente</p>
                    </div>
                    <div class="ml-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-group mt-4">
        <!-- Total Destinations -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-map-marker-alt font-20 text-info"></i>
                        <p class="font-16 m-b-5">Total Destinations</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $totalDestinations }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Destinations Actives -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-check-circle font-20 text-warning"></i>
                        <p class="font-16 m-b-5">Destinations Actives</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $destinationsActives }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Vols -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-plane font-20 text-success"></i>
                        <p class="font-16 m-b-5">Total Vols</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $totalVols }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vols Planifiés -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="fas fa-calendar-check font-20 text-danger"></i>
                        <p class="font-16 m-b-5">Vols Planifiés</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $volsPlanifies }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
