<div class="reservation-details mb-4">
    <h6 class="fw-bold">Détails du voyage</h6>
    <div class="card bg-light">
        <div class="card-body">
            <p class="mb-1"><strong>Trajet:</strong> {{ $voyage->destinationDepart->ville }} → {{ $voyage->destinationArrive->ville }}</p>
            <p class="mb-1"><strong>Date:</strong> {{ \Carbon\Carbon::parse($voyage->date_depart)->format('d/m/Y') }}</p>
            <p class="mb-1"><strong>Heure:</strong> {{ $voyage->heure_depart }}</p>
            <p class="mb-1"><strong>Prix:</strong> {{ number_format($voyage->montant, 0, ',', ' ') }} FCFA</p>
            <p class="mb-0"><strong>Places disponibles:</strong> {{ $voyage->nbre_place }}</p>
        </div>
    </div>
</div>

<form action="{{ route('reservation.store') }}" method="POST">
    @csrf
    <input type="hidden" name="voyage_id" value="{{ $voyage->id }}">
    
    <div class="mb-3">
        <label for="nombre_places{{ $voyage->id }}" class="form-label">Nombre de places</label>
        <input type="number" class="form-control" id="nombre_places{{ $voyage->id }}" name="nombre_places" min="1" max="{{ $voyage->nbre_place }}" value="1" required>
    </div>
    
    <div class="mb-3">
        <label for="nom{{ $voyage->id }}" class="form-label">Nom complet</label>
        <input type="text" class="form-control" id="nom{{ $voyage->id }}" name="nom" required>
    </div>
    
    <div class="mb-3">
        <label for="email{{ $voyage->id }}" class="form-label">Email</label>
        <input type="email" class="form-control" id="email{{ $voyage->id }}" name="email" required>
    </div>
    
    <div class="mb-3">
        <label for="telephone{{ $voyage->id }}" class="form-label">Téléphone</label>
        <input type="tel" class="form-control" id="telephone{{ $voyage->id }}" name="telephone" required>
    </div>
    
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="conditions{{ $voyage->id }}" name="conditions" required>
        <label class="form-check-label" for="conditions{{ $voyage->id }}">
            J'accepte les conditions générales de vente
        </label>
    </div>
    
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Confirmer la réservation</button>
    </div>
</form>