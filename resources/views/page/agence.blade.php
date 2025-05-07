<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/page/agence.blade.php -->
<!DOCTYPE html>
<html lang="fr">

@include('includes.header')

<style>
    .banner-agence {
        background: url('../images/agence2.jpg') no-repeat center center;
        background-size: cover;
        height: 500px;
        position: relative;
    }

    .banner-overlay {
        background: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    .agency-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .agency-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .agency-img {
        height: 200px;
        object-fit: cover;
        transition: all 0.5s ease;
    }
    
    .agency-card:hover .agency-img {
        transform: scale(1.05);
    }
    
    .pagination {
        margin-bottom: 0;
    }
    
    .page-item.active .page-link {
        background-color: #13357B;
        border-color: #13357B;
    }
    
    .page-link {
        color: #13357B;
    }
    
    .page-link:hover {
        color: #0a1b3f;
    }
    
    .loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    
    .loading-spinner {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #13357B;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<body class="bg-light">
    <!-- Navbar -->
    @include('includes.navbar')

    <!-- Bannière Nos Agences -->
    <div class="container-fluid position-relative banner-agence">
        <!-- Superposition sombre -->
        <div class="banner-overlay" style="background: rgba(0, 0, 0, 0.5);"></div>
        
        <!-- Contenu centré -->
        <div class="text-center text-white position-relative d-flex flex-column justify-content-center align-items-center h-100">
            <h3 class="display-3 text-white mb-4">Nos agences</h3>
        </div>
    </div>

    <!-- Section : Filtres -->
    <div class="container py-5">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title mb-3">Rechercher une agence par destination</h5>
                <form action="{{ route('agence.index') }}" method="GET" class="row g-3">
                    <div class="col-md-8">
                        <input type="text" name="destination" id="destination-search" class="form-control" 
                               placeholder="Entrez une ville de destination..." 
                               value="{{ request('destination') }}"
                               list="destination-list">
                        <datalist id="destination-list">
                            @foreach($villes as $ville)
                                <option value="{{ $ville }}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search me-2"></i> Rechercher
                        </button>
                    </div>
                </form>
                @if(request('destination'))
                    <div class="mt-3">
                        <a href="{{ route('agence.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i> Effacer le filtre
                        </a>
                        <span class="ms-3 text-muted">
                            Résultats pour : <strong>{{ request('destination') }}</strong>
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Messages flash -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Liste des agences -->
        <div class="row g-4">
            @forelse($agences as $agence)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm agency-card">
                        <img src="{{ asset('storage/' . $agence->agency_photo) }}" class="card-img-top agency-img" alt="{{ $agence->agency_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $agence->agency_name }}</h5>
                            <p class="card-text">
                                <span class="badge bg-primary">{{ $agence->agency_type }}</span>
                            </p>
                            <p class="card-text">
                                <i class="fas fa-phone text-primary me-2"></i> {{ $agence->phone_pro }}
                            </p>
                            <p class="card-text">
                                <i class="fas fa-envelope text-primary me-2"></i> {{ $agence->email_pro }}
                            </p>
                            <a href="{{ route('agence.show', $agence->id) }}" class="btn btn-primary w-100">Voir les offres</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        @if(request('destination'))
                            Aucune agence trouvée pour la destination "{{ request('destination') }}".
                        @else
                            Aucune agence disponible pour le moment.
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $agences->appends(request()->query())->links() }}
        </div>
    </div>

    <!-- Footer -->
    @include('includes.footer')

    @include('includes.script')
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Afficher l'animation de chargement lors de la soumission du formulaire
        const searchForm = document.querySelector('form');
        searchForm.addEventListener('submit', function() {
            // Créer et afficher l'animation de chargement
            const loadingDiv = document.createElement('div');
            loadingDiv.className = 'loading';
            loadingDiv.innerHTML = '<div class="loading-spinner"></div>';
            document.body.appendChild(loadingDiv);
        });
        
        // Amélioration de l'input de recherche
        const searchInput = document.getElementById('destination-search');
        if (searchInput) {
            // Focus automatique sur le champ de recherche
            searchInput.focus();
            
            // Effacer le champ avec la touche Escape
            searchInput.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    this.value = '';
                }
            });
        }
    });
</script>