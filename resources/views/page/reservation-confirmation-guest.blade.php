<!DOCTYPE html>
<html lang="fr">

@include('includes.header')

<style>
    .confirmation-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    
    .confirmation-header {
        background-color: #28a745;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 20px;
        text-align: center;
    }
    
    .confirmation-icon {
        font-size: 3rem;
        margin-bottom: 15px;
    }
    
    .detail-section {
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
                <div class="card confirmation-card">
                    <div class="confirmation-header">
                        <i class="fas fa-check-circle confirmation-icon"></i>
                        <h2 class="mb-0">Réservation confirmée !</h2>
                        <p class="mb-0">Votre réservation a été enregistrée avec succès.</p>
                    </div>
                    <div class="card-body p-4">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Numéro de réservation -->
                        <div class="text-center mb-4">
                            <h4>Numéro de réservation: <span class="badge bg-primary">{{ $reservation->id }}</span></h4>
                            <p class="text-muted">Veuillez conserver ce numéro pour toute référence ultérieure.</p>
                        </div>

                        <!-- Détails du voyage -->
                        <div class="detail-section">
                            <h5 class="mb-3"><i class="fas fa-route me-2"></i> Détails du voyage</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Trajet:</strong> {{ $reservation->voyage->destinationDepart->ville }} → {{ $reservation->voyage->destinationArrive->ville }}</p>
                                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($reservation->voyage->date_depart)->format('d/m/Y') }}</p>
                                    <p><strong>Heure:</strong> {{ $reservation->voyage->heure_depart }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Agence:</strong> {{ $reservation->voyage->agence->agency_name }}</p>
                                    <p><strong>Nombre de places:</strong> {{ $reservation->nombre_places }}</p>
                                    <div class="price-tag">
                                        <i class="fas fa-tag me-2"></i> Total: {{ number_format($reservation->montant_total, 0, ',', ' ') }} FCFA
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informations du voyageur -->
                        <div class="detail-section">
                            <h5 class="mb-3"><i class="fas fa-user me-2"></i> Informations du voyageur</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nom:</strong> {{ $reservation->nom }}</p>
                                    <p><strong>Email:</strong> {{ $reservation->email }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Téléphone:</strong> {{ $reservation->telephone }}</p>
                                    <p><strong>Statut:</strong> <span class="badge bg-warning">{{ $reservation->statut }}</span></p>
                                </div>
                            </div>
                        </div>

                        <!-- Instructions -->
                        <div class="alert alert-info">
                            <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i> Instructions importantes</h5>
                            <p>Veuillez vous présenter au point de départ au moins 30 minutes avant l'heure de départ prévue.</p>
                            <p>N'oubliez pas de présenter votre numéro de réservation et une pièce d'identité valide.</p>
                            <p class="mb-0">Pour toute question ou modification, veuillez contacter l'agence directement au {{ $reservation->voyage->agence->phone_pro }}.</p>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ route('accueil') }}" class="btn btn-primary btn-rounded mx-2">
                                <i class="fas fa-home me-2"></i> Retour à l'accueil
                            </a>
                            <a href="javascript:window.print()" class="btn btn-outline-secondary btn-rounded mx-2">
                                <i class="fas fa-print me-2"></i> Imprimer
                            </a>
                        </div>
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