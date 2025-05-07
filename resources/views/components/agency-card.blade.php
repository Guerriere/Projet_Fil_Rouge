<div class="card h-100 shadow-sm agency-card">
    <img src="{{ asset('storage/' . $agency->agency_photo) }}" class="card-img-top agency-img" alt="{{ $agency->agency_name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $agency->agency_name }}</h5>
        <p class="card-text">
            <span class="badge bg-primary">{{ $agency->agency_type }}</span>
        </p>
        <p class="card-text">
            <i class="fas fa-phone text-primary me-2"></i> {{ $agency->phone_pro }}
        </p>
        <p class="card-text">
            <i class="fas fa-envelope text-primary me-2"></i> {{ $agency->email_pro }}
        </p>
        <a href="{{ route('agence.show', $agency->id) }}" class="btn btn-primary w-100">Voir les offres</a>
    </div>
</div>