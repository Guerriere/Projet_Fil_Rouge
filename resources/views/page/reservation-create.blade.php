<!DOCTYPE html>
<html lang="fr">

@include('includes.header')

<style>
    .reservation-form {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    
    .voyage-details {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .price-tag {
        background-color: #13357B;
        color: white;
        padding: 10px 15px;
        border-radius: 30px;
        font-weight: bold;
        display: inline-block;
        margin-top: 10px;
    }
    
    .btn-rounded {
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: bold;
    }
</style>

<body class="bg-light">
    <!-- Navbar -->
    @include('includes.navbar')

    <!-- Contenu principal -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card reservation-form">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="fas fa-ticket-alt me-2"></i> Réservation de voyage</h3>
                    </div>
                    <div class="card-body p-4">
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

                        <!-- Détails du voyage -->
                        <div class="voyage-details">
                            <h4 class="mb-3">Détails du voyage</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Trajet:</strong> {{ $voyage->destinationDepart->ville }} → {{ $voyage->destinationArrive->ville }}</p>
                                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($voyage->date_depart)->format('d/m/Y') }}</p>
                                    <p><strong>Heure:</strong> {{ $voyage->heure_depart }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Agence:</strong> {{ $voyage->agence->agency_name }}</p>
                                    <p><strong>Places disponibles:</strong> {{ $voyage->nbre_place }}</p>
                                    <div class="price-tag">
                                        <i class="fas fa-tag me-2"></i> {{ number_format($voyage->montant, 0, ',', ' ') }} FCFA / place
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Formulaire de réservation -->
                        @if(Auth::check())
                            <!-- Formulaire pour utilisateur connecté -->
                            <form action="{{ route('reservation.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="voyage_id" value="{{ $voyage->id }}">
                                
                                <div class="mb-4">
                                    <label for="nombre_places" class="form-label">Nombre de places</label>
                                    <input type="number" class="form-control" id="nombre_places" name="nombre_places" min="1" max="{{ $voyage->nbre_place }}" value="1" required onchange="updateTotal()">
                                    @error('nombre_places')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">Prix total</label>
                                    <div class="form-control bg-light" id="prix_total">{{ number_format($voyage->montant, 0, ',', ' ') }} FCFA</div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">Informations du voyageur</label>
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <p class="mb-1"><strong>Nom:</strong> {{ Auth::user()->name }}</p>
                                            <p class="mb-1"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                            <p class="mb-1"><strong>Téléphone:</strong> {{ Auth::user()->telephone }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="conditions" name="conditions" required>
                                    <label class="form-check-label" for="conditions">
                                        J'accepte les <a href="#" data-bs-toggle="modal" data-bs-target="#conditionsModal">conditions générales de vente</a>
                                    </label>
                                    @error('conditions')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('agence.show', $voyage->agence->id) }}" class="btn btn-outline-secondary btn-rounded">
                                        <i class="fas fa-arrow-left me-2"></i> Retour
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-rounded">
                                        <i class="fas fa-check me-2"></i> Confirmer la réservation
                                    </button>
                                </div>
                            </form>
                        @else
                            <!-- Formulaire pour utilisateur non connecté -->
                            <form action="{{ route('reservation.store.guest') }}" method="POST">
                                @csrf
                                <input type="hidden" name="voyage_id" value="{{ $voyage->id }}">
                                
                                <div class="mb-4">
                                    <label for="nombre_places" class="form-label">Nombre de places</label>
                                    <input type="number" class="form-control" id="nombre_places" name="nombre_places" min="1" max="{{ $voyage->nbre_place }}" value="1" required onchange="updateTotal()">
                                    @error('nombre_places')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">Prix total</label>
                                    <div class="form-control bg-light" id="prix_total">{{ number_format($voyage->montant, 0, ',', ' ') }} FCFA</div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">Informations du voyageur</label>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="nom" class="form-label">Nom complet</label>
                                            <input type="text" class="form-control" id="nom" name="nom" required>
                                            @error('nom')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                            @error('email')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="telephone" class="form-label">Téléphone</label>
                                            <input type="text" class="form-control" id="telephone" name="telephone" required>
                                            @error('telephone')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="conditions" name="conditions" required>
                                    <label class="form-check-label" for="conditions">
                                        J'accepte les <a href="#" data-bs-toggle="modal" data-bs-target="#conditionsModal">conditions générales de vente</a>
                                    </label>
                                    @error('conditions')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('agence.show', $voyage->agence->id) }}" class="btn btn-outline-secondary btn-rounded">
                                        <i class="fas fa-arrow-left me-2"></i> Retour
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-rounded">
                                        <i class="fas fa-check me-2"></i> Confirmer la réservation
                                    </button>
                                </div>
                            </form>
                        @endif
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

    <!-- Footer -->
    @include('includes.footer')

    @include('includes.script')

    <script>
        function updateTotal() {
            const nombrePlaces = document.getElementById('nombre_places').value;
            const prixUnitaire = {{ $voyage->montant }};
            const total = nombrePlaces * prixUnitaire;
            document.getElementById('prix_total').textContent = total.toLocaleString('fr-FR') + ' FCFA';
        }
    </script>
</body>
</html>