<!DOCTYPE html>
<html lang="fr">

@include('includes.header')

<style>
    .banner-agence-detail {
        background-size: cover;
        background-position: center;
        height: 400px;
        position: relative;
    }

    .banner-overlay {
        background: rgba(0, 0, 0, 0.6);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    .agency-logo {
        width: 120px;
        height: 120px;
        object-fit: contain;
        background: white;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .voyage-card {
        transition: all 0.3s ease;
    }
    
    .voyage-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .filter-card {
        border-left: 4px solid #13357B;
    }
    
    .filter-badge {
        position: absolute;
        top: -10px;
        left: 20px;
        background: #13357B;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    /* Styles pour la modal personnalisée */
    .custom-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1050;
        overflow-y: auto;
    }
    
    .custom-modal-dialog {
        position: relative;
        width: 500px;
        max-width: 90%;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    }
    
    .custom-modal-header {
        padding: 15px;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .custom-modal-title {
        margin: 0;
        font-size: 1.25rem;
    }
    
    .custom-modal-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0;
        margin-left: auto;
    }
    
    .custom-modal-body {
        padding: 15px;
    }
    
    .custom-modal-footer {
        padding: 15px;
        border-top: 1px solid #e9ecef;
        text-align: right;
    }
    
    body.modal-open {
        overflow: hidden;
    }
</style>

<body class="bg-light">
    <!-- Navbar -->
    @include('includes.navbar')

    <!-- Bannière de l'agence -->
    <div class="container-fluid position-relative banner-agence-detail" style="background-image: url('{{ $agence->agency_photo ? asset('storage/' . $agence->agency_photo) : asset('images/agence2.jpg') }}');">
        <!-- Superposition sombre -->
        <div class="banner-overlay"></div>
        
        <!-- Contenu centré -->
        <div class="container position-relative h-100">
            <div class="d-flex flex-column justify-content-center h-100">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center">
                        @if($agence->agency_logo)
                            <img src="{{ asset('storage/' . $agence->agency_logo) }}" class="agency-logo mb-3" alt="{{ $agence->agency_name }}">
                        @endif
                    </div>
                    <div class="col-md-10">
                        <h1 class="text-white display-4">{{ $agence->agency_name }}</h1>
                        <p class="text-white lead">
                            <span class="badge bg-primary me-2">{{ $agence->agency_type }}</span>
                            <i class="fas fa-phone me-2"></i> {{ $agence->phone_pro }} |
                            <i class="fas fa-envelope me-2"></i> {{ $agence->email_pro }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section de filtrage des voyages -->
    <div class="container py-5">
        <div class="card shadow-sm mb-5 position-relative filter-card">
            <span class="filter-badge">Filtrer les voyages</span>
            <div class="card-body pt-4">
                <form action="{{ route('agence.show', $agence->id) }}" method="GET" class="row g-3">
                    <!-- Date de départ -->
                    <div class="col-md-4 mb-3">
                        <label for="date_depart" class="form-label">Date de départ</label>
                        <input type="date" id="date_depart" name="date_depart" class="form-control" value="{{ $dateDepart ?? '' }}">
                    </div>
                    
                    <!-- Destination de départ -->
                    <div class="col-md-4 mb-3">
                        <label for="depart" class="form-label">Ville de départ</label>
                        <select id="depart" name="depart" class="form-select">
                            <option value="">Toutes les villes de départ</option>
                            @foreach($departsDisponibles as $depart)
                                <option value="{{ $depart->id }}" {{ (isset($departId) && $departId == $depart->id) ? 'selected' : '' }}>
                                    {{ $depart->ville }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Destination d'arrivée -->
                    <div class="col-md-4 mb-3">
                        <label for="arrive" class="form-label">Ville d'arrivée</label>
                        <select id="arrive" name="arrive" class="form-select">
                            <option value="">Toutes les villes d'arrivée</option>
                            @foreach($arrivesDisponibles as $arrive)
                                <option value="{{ $arrive->id }}" {{ (isset($arriveId) && $arriveId == $arrive->id) ? 'selected' : '' }}>
                                    {{ $arrive->ville }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Boutons -->
                    <div class="col-12 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i> Rechercher
                        </button>
                        
                        @if($dateDepart || $departId || $arriveId)
                            <a href="{{ route('agence.show', $agence->id) }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i> Réinitialiser les filtres
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Section des voyages -->
        <h2 class="mb-4">
            Voyages disponibles 
            @if($dateDepart || $departId || $arriveId)
                <span class="badge bg-primary">Filtrés</span>
            @endif
        </h2>
        
        <!-- Résumé des filtres appliqués -->
        @if($dateDepart || $departId || $arriveId)
            <div class="alert alert-info mb-4">
                <i class="fas fa-filter me-2"></i> Filtres appliqués:
                <ul class="mb-0 mt-2">
                    @if($dateDepart)
                        <li>Date de départ: {{ \Carbon\Carbon::parse($dateDepart)->format('d/m/Y') }}</li>
                    @endif
                    
                    @if($departId)
                        <li>Ville de départ: {{ $departsDisponibles->firstWhere('id', $departId)->ville }}</li>
                    @endif
                    
                    @if($arriveId)
                        <li>Ville d'arrivée: {{ $arrivesDisponibles->firstWhere('id', $arriveId)->ville }}</li>
                    @endif
                </ul>
            </div>
        @endif
        
        <div class="row g-4">
            @forelse($voyages as $voyage)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm voyage-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $voyage->destinationDepart->ville }} → {{ $voyage->destinationArrive->ville }}</h5>
                            <p class="card-text">
                                <i class="fas fa-calendar text-primary me-2"></i> {{ \Carbon\Carbon::parse($voyage->date_depart)->format('d/m/Y') }}
                            </p>
                            <p class="card-text">
                                <i class="fas fa-clock text-primary me-2"></i> {{ $voyage->heure_depart }}
                            </p>
                            <p class="card-text">
                                <i class="fas fa-money-bill-wave text-primary me-2"></i> {{ number_format($voyage->montant, 0, ',', ' ') }} FCFA
                            </p>
                            <p class="card-text">
                                <i class="fas fa-users text-primary me-2"></i> {{ $voyage->nbre_place }} places disponibles
                            </p>
                            
                            <!-- Bouton de réservation pour tous les utilisateurs -->
                            @if(Auth::check())
                                <!-- Bouton de réservation qui redirige vers la page de réservation -->
                                <a href="{{ route('client.reservations.add', ['voyage_id' => $voyage->id]) }}" class="btn btn-primary w-100">
                                    Réserver
                                </a>
                            @else
                                <!-- Bouton de connexion avec redirection vers la page de réservation après authentification -->
                                <a href="{{ route('login', ['intended_voyage_id' => $voyage->id]) }}" class="btn btn-primary w-100">
                                    Se connecter pour réserver
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        @if($dateDepart || $departId || $arriveId)
                            Aucun voyage ne correspond aux critères de recherche.
                            <div class="mt-3">
                                <a href="{{ route('agence.show', $agence->id) }}" class="btn btn-outline-primary">
                                    <i class="fas fa-undo me-2"></i> Voir tous les voyages
                                </a>
                            </div>
                        @else
                            Aucun voyage disponible pour cette agence actuellement.
                        @endif
                    </div>
                </div>
            @endforelse        </div>
    </div>

    <!-- Section des informations supplémentaires -->
    <div class="container pb-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> À propos de l'agence</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $agence->agency_name }} est une agence de transport spécialisée dans les voyages en {{ $agence->agency_type }}.</p>
                        <p>Nous proposons des trajets réguliers vers différentes destinations au Cameroun avec un service de qualité et des prix compétitifs.</p>
                        <p class="mb-0">Pour plus d'informations, n'hésitez pas à nous contacter directement.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-phone-alt me-2"></i> Contact</h5>
                    </div>
                    <div class="card-body">
                        <p><i class="fas fa-envelope text-primary me-2"></i> Email: {{ $agence->email_pro }}</p>
                        <p><i class="fas fa-phone text-primary me-2"></i> Téléphone: {{ $agence->phone_pro }}</p>
                        <p><i class="fas fa-clock text-primary me-2"></i> Horaires: Lundi au Samedi, 8h à 18h</p>
                        <p class="mb-0"><i class="fas fa-map-marker-alt text-primary me-2"></i> Adresse: {{ $agence->user->adresse }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('includes.footer')

    @include('includes.script')

    </body>

</html>