@extends('Dashboard.layouts.app')

@section('title', 'Réserver un voyage')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Réserver un voyage</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('client.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Réserver un voyage</li>
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
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-ticket-alt me-2"></i> Formulaire de réservation</h5>
                </div>
                <div class="card-body">
                    <div class="reservation-details mb-4">
                        <h6 class="fw-bold">Détails du voyage</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-1"><strong>Trajet:</strong> {{ $voyage->destinationDepart->ville }} → {{ $voyage->destinationArrive->ville }}</p>
                                        <p class="mb-1"><strong>Date:</strong> {{ \Carbon\Carbon::parse($voyage->date_depart)->format('d/m/Y') }}</p>
                                        <p class="mb-1"><strong>Heure:</strong> {{ $voyage->heure_depart }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-1"><strong>Prix unitaire:</strong> {{ number_format($voyage->montant, 0, ',', ' ') }} FCFA</p>
                                        <p class="mb-1"><strong>Places disponibles:</strong> {{ $voyage->nbre_place }}</p>
                                        <p class="mb-1"><strong>Agence:</strong> {{ $voyage->agence->agency_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="voyage_id" value="{{ $voyage->id }}">
                        
                        <div class="mb-3">
                            <label for="nombre_places" class="form-label">Nombre de places</label>
                            <input type="number" class="form-control" id="nombre_places" name="nombre_places" min="1" max="{{ $voyage->nbre_place }}" value="1" required onchange="updateTotal()">
                            @error('nombre_places')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="prix_total" class="form-label">Prix total</label>
                            <div class="form-control bg-light" id="prix_total">{{ number_format($voyage->montant, 0, ',', ' ') }} FCFA</div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Informations du voyageur</label>
                            <div class="card bg-light">
                                <div class="card-body">
                                    <p class="mb-1"><strong>Nom:</strong> {{ Auth::user()->name }}</p>
                                    <p class="mb-1"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                    <p class="mb-1"><strong>Téléphone:</strong> {{ Auth::user()->telephone }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="conditions" name="conditions" required>
                            <label class="form-check-label" for="conditions">
                                J'accepte les <a href="#" data-bs-toggle="modal" data-bs-target="#conditionsModal">conditions générales de vente</a>
                            </label>
                            @error('conditions')
                                <span class="text-danger d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('agence.show', $voyage->agence->id) }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Retour
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check me-2"></i> Confirmer la réservation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal des conditions générales -->
<div class="modal fade" id="conditionsModal" tabindex="-1" aria-labelledby="conditionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="conditionsModalLabel">Conditions générales de vente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>1. Réservation et paiement</h6>
                <p>La réservation est confirmée après paiement intégral du montant. Le paiement s'effectue en ligne ou directement auprès de l'agence.</p>
                
                <h6>2. Annulation et remboursement</h6>
                <p>Toute annulation doit être effectuée au moins 24 heures avant le départ pour être éligible à un remboursement partiel. Les annulations effectuées moins de 24 heures avant le départ ne sont pas remboursables.</p>
                
                <h6>3. Modification de réservation</h6>
                <p>Les modifications de réservation sont possibles sous réserve de disponibilité et peuvent entraîner des frais supplémentaires.</p>
                
                <h6>4. Bagages</h6>
                <p>Chaque voyageur a droit à un bagage standard dont le poids et les dimensions sont définis par l'agence de transport. Tout bagage supplémentaire peut être soumis à des frais additionnels.</p>
                
                <h6>5. Responsabilités</h6>
                <p>TravelCam agit en tant qu'intermédiaire entre les voyageurs et les agences de transport. La responsabilité du transport incombe à l'agence concernée.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    function updateTotal() {
        const nombrePlaces = document.getElementById('nombre_places').value;
        const prixUnitaire = {{ $voyage->montant }};
        const total = nombrePlaces * prixUnitaire;
        document.getElementById('prix_total').textContent = total.toLocaleString('fr-FR') + ' FCFA';
    }
</script>
@endsection
