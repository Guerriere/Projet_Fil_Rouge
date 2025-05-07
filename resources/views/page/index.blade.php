<!-- filepath: /home/kali/Insclass/site/index.blade.php -->
<!DOCTYPE html>
<html lang="fr">

@include('includes.header')

<body>
    <!-- Navbar -->
    @include('includes.navbar')
    

    <!-- Hero Section -->
<!-- Hero Section -->
<!-- Hero Section -->
<div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Premier slide -->
            <div class="carousel-item active">
                <img src="{{ asset('images/hero2.jpg') }}" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Réservez vos voyages au cameroun </h4>
                        <h1 class="display-2 text-capitalize text-white mb-4">Explorez Le Cameroun Avec Les meilleures Offres</h1>
                        <p class="mb-5 fs-5">Decouvrez les offres des agences de voyages partenaire et reservez votre prochain voyage en toute simplicité .</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="{{ url('/agence') }}">voir les offres</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Deuxième slide -->
            <div class="carousel-item">
                <img src="{{ asset('images/hero1.jpg') }}" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Voyagez en toutes sérénité </h4>
                        <h1 class="display-2 text-capitalize text-white mb-4">Trouvez Votre Agence de Confiance </h1>
                        <p class="mb-5 fs-5">Profitez d'une expérience unique avec des agences fiables et des destinations variées.</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="{{ url('/agence') }}">Découvrir</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Troisième slide -->
            <div class="carousel-item">
                <img src="{{ asset('images/hero5.jpg') }}" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">VOYAGEZ AU CAMEROUN </h4>
                        <h1 class="display-2 text-capitalize text-white mb-4">Réservez Votre Billet En Quelques clics</h1>
                        <p class="mb-5 fs-5">Avec notre plateformes, réservez facilement vos billets pour toutes vos destinations au Cameroun.</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="{{ url('/agence') }}">Réserver mainteant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon btn bg-primary" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>

<!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                    <img src="{{ asset('images/agence.jpg') }}" class="img-fluid w-100 h-100" alt="À propos de nous">
                </div>
            </div>
            <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                <h5 class="section-about-title pe-3">À propos de nous</h5>
                <h1 class="mb-4">Bienvenue sur <span class="text-primary">TravelCam</span></h1>
                <p class="mb-4">TravelCam est une plateforme dédiée à la réservation de voyages au Cameroun. Nous connectons les agences locales avec les voyageurs pour offrir des solutions simples, rapides et fiables.</p>
                <p class="mb-4">Notre mission est de faciliter vos déplacements en vous proposant une large gamme d'offres adaptées à vos besoins, tout en vous garantissant une expérience de réservation fluide et sécurisée.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Réservation rapide et facile</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Agences locales fiables</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Offres adaptées à tous les budgets</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Support client 24/7</p>
                    </div>
                </div>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="{{ url('/about') }}">En savoir plus</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

    <!-- Section : Agences -->
<div class="container-fluid bg-light service py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Nos Agences Partenaires</h5>
            <h1 class="mb-0">Découvrez nos agences partenaires</h1>
        </div>
        
        <!-- Carousel des agences -->
        <div id="agencesCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @php $chunks = $latestAgencies->chunk(3); @endphp
                @foreach($chunks as $index => $chunk)
                    <button type="button" data-bs-target="#agencesCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            
            <div class="carousel-inner">
                @foreach($chunks as $index => $agencyChunk)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach($agencyChunk as $agency)
                                <div class="col-md-4">
                                    <div class="card h-100 shadow-sm agency-card">
                                        <div class="position-relative">
                                            @if($agency->agency_photo)
                                                <img src="{{ asset('storage/' . $agency->agency_photo) }}" class="card-img-top" alt="{{ $agency->agency_name }}" style="height: 200px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('images/default-agency.jpg') }}" class="card-img-top" alt="Agence par défaut" style="height: 200px; object-fit: cover;">
                                            @endif
                                            <div class="position-absolute top-0 end-0 p-2">
                                                @if($agency->agency_logo)
                                                    <img src="{{ asset('storage/' . $agency->agency_logo) }}" class="rounded-circle bg-white p-1" alt="Logo" style="width: 60px; height: 60px; object-fit: contain;">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $agency->agency_name }}</h5>
                                            <p class="card-text">
                                                <span class="badge bg-primary">{{ $agency->agency_type }}</span>
                                            </p>
                                            <a href="{{ url('/agence/' . $agency->id) }}" class="btn btn-outline-primary">Voir les offres</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#agencesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-primary rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#agencesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-primary rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ url('/agence') }}" class="btn btn-primary rounded-pill py-3 px-5">Voir toutes les agences</a>
        </div>
    </div>
</div>

    <!-- Services Start -->
<div class="container-fluid bg-white service py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Nos Services</h5>
            <h1 class="mb-0">Ce que nous proposons</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                            <div class="service-content text-end">
                                <h5 class="mb-4">Réservation de Voyages</h5>
                                <p class="mb-0">Réservez vos voyages en toute simplicité grâce à notre plateforme intuitive et rapide.</p>
                            </div>
                            <div class="service-icon p-4">
                            <i class="fa fa-bus fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                            <div class="service-content text-end">
                                <h5 class="mb-4">Partenariats avec Agences</h5>
                                <p class="mb-0">Rejoignez notre réseau d'agences partenaires et bénéficiez d'une visibilité accrue et d'un accès à de nouveaux clients.</p>
                            </div>
                            <div class="service-icon p-4">
                            <i class="fa fa-handshake fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                            <div class="service-icon p-4">
                                <i class="fa fa-calendar-alt fa-4x text-primary"></i>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-4">Planification de Voyages</h5>
                                <p class="mb-0">Planifiez vos voyages à l'avance avec nos outils de gestion de réservations.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                            <div class="service-icon p-4">
                                <i class="fa fa-headset fa-4x text-primary"></i>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-4">Support Client 24/7</h5>
                                <p class="mb-0">Profitez d'une assistance client disponible à tout moment pour répondre à vos besoins.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="text-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="{{ url('/services') }}">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

<!-- Destination Start -->
<div class="container-fluid bg-light destination py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Destinations</h5>
            <h1 class="mb-0">Découvrez Nos Destinations Populaires</h1>
            <p class="mb-0">Explorez les meilleures destinations au Cameroun et réservez votre prochain voyage en toute simplicité.</p>
        </div>
        <div class="tab-class text-center">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @forelse($latestDestinations as $destination)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="destination-img">
                                    @if($destination->image_url)
                                        <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $destination->image_url) }}" alt="{{ $destination->ville }}" style="height: 250px; object-fit: cover;">
                                    @else
                                        <img class="img-fluid rounded w-100" src="{{ asset('images/default-destination.jpg') }}" alt="Destination par défaut" style="height: 250px; object-fit: cover;">
                                    @endif
                                    <div class="destination-overlay p-4">
                                        <a href="{{ url('/agence') }}" class="btn btn-primary text-white rounded-pill border py-2 px-3">Voir les agences</a>
                                        <h4 class="text-white mb-2 mt-3">{{ $destination->ville }}</h4>
                                        <a href="{{ url('/agence') }}" class="btn-hover text-white">Voir Plus <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p>Aucune destination disponible pour le moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <!-- Other tabs remain unchanged -->
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('/destinations') }}" class="btn btn-primary rounded-pill py-3 px-5">Voir toutes les destinations</a>
        </div>
    </div>
</div>
<!-- Destination End -->

   <!-- Témoignages Start -->
<div class="container-fluid testimonial py-5 bg-white">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Témoignages</h5>
            <h1 class="mb-0">Ce que disent nos clients</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
            <!-- Témoignage 1 -->
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-white rounded p-4">
                    <p class="text-center mb-5">"J'ai réservé mon voyage en quelques clics grâce à TravelCam. Service rapide et fiable, je recommande vivement !"</p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">Jean Dupont</h5>
                    <p class="mb-0">Yaoundé, Cameroun</p>
                    <div class="d-flex justify-content-center">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- Témoignage 2 -->
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-white rounded p-4">
                    <p class="text-center mb-5">"Les offres des agences sont variées et adaptées à tous les budgets. Une expérience sans stress !"</p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">Marie Claire</h5>
                    <p class="mb-0">Douala, Cameroun</p>
                    <div class="d-flex justify-content-center">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- Témoignage 3 -->
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-white rounded p-4">
                    <p class="text-center mb-5">"Grâce à TravelCam, j'ai pu explorer des destinations incroyables avec des guides professionnels."</p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">Paul Nguema</h5>
                    <p class="mb-0">Kribi, Cameroun</p>
                    <div class="d-flex justify-content-center">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Témoignages End -->

   <!-- Section Devenir Partenaire -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Devenir Partenaire</h5>
            <h1 class="mb-4">Pourquoi rejoindre TravelCam ?</h1>
            <p class="text-gray-600">Rejoignez notre réseau d'agences partenaires et bénéficiez d'une visibilité accrue, d'outils performants et d'un accès à des milliers de clients à travers le Cameroun.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="service-content-inner d-flex flex-column align-items-center bg-white border border-primary rounded p-4 text-center">
                    <div class="service-icon p-4">
                        <i class="fa fa-bullhorn fa-4x text-primary"></i>
                    </div>
                    <h5 class="mb-3">Visibilité accrue</h5>
                    <p class="mb-0">Exposez vos offres à un large public à travers tout le Cameroun.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-content-inner d-flex flex-column align-items-center bg-white border border-primary rounded p-4 text-center">
                    <div class="service-icon p-4">
                        <i class="fa fa-chart-line fa-4x text-primary"></i>
                    </div>
                    <h5 class="mb-3">Augmentez vos revenus</h5>
                    <p class="mb-0">Recevez plus de réservations et développez votre activité.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-content-inner d-flex flex-column align-items-center bg-white border border-primary rounded p-4 text-center">
                    <div class="service-icon p-4">
                        <i class="fa fa-cogs fa-4x text-primary"></i>
                    </div>
                    <h5 class="mb-3">Outils performants</h5>
                    <p class="mb-0">Gérez vos offres, vos réservations et vos clients facilement.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('register.partner') }}" class="btn btn-primary rounded-pill py-3 px-5">
                <i class="fas fa-handshake mr-2"></i> Devenir partenaire
            </a>
        </div>
    </div>
</div>

<!-- Bouton flottant -->
<a href="{{ route('register.partner') }}" class="btn btn-primary rounded-pill btn-lg position-fixed" style="bottom: 20px; right: 20px; z-index: 1000;">
<i class="fas fa-handshake"> Devenir partenaire</i>
</a>


    
    <!-- Statistiques Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Statistiques</h5>
            <h1 class="mb-0">Nos Réalisations en Chiffres</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="p-4">
                    <i class="fa fa-handshake fa-4x text-primary mb-3"></i>
                    <h2 class="text-primary mb-2">150+</h2>
                    <p class="text-muted mb-0">Agences Partenaires</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="p-4">
                    <i class="fa fa-ticket-alt fa-4x text-primary mb-3"></i>
                    <h2 class="text-primary mb-2">20,000+</h2>
                    <p class="text-muted mb-0">Réservations Effectuées</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="p-4">
                    <i class="fa fa-smile fa-4x text-primary mb-3"></i>
                    <h2 class="text-primary mb-2">12,000+</h2>
                    <p class="text-muted mb-0">Clients Satisfaits</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="p-4">
                    <i class="fa fa-map-marker-alt fa-4x text-primary mb-3"></i>
                    <h2 class="text-primary mb-2">30+</h2>
                    <p class="text-muted mb-0">Villes Couvertes</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Statistiques End -->

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        @include('includes.footer')
    </footer>


    <!-- Scripts -->
    @include('includes.script')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialisation du carousel avec options
        var agencesCarousel = new bootstrap.Carousel(document.getElementById('agencesCarousel'), {
            interval: 5000,  // Temps entre les slides en millisecondes
            wrap: true,      // Boucle infinie
            keyboard: true   // Contrôle avec le clavier
        });
        
        // Pause au survol (optionnel)
        document.getElementById('agencesCarousel').addEventListener('mouseenter', function() {
            agencesCarousel.pause();
        });
        
        document.getElementById('agencesCarousel').addEventListener('mouseleave', function() {
            agencesCarousel.cycle();
        });
    });
</script>
<style>
    /* Styles existants */
    .agency-card {
        transition: transform 0.3s ease;
        overflow: hidden;
        margin: 0 10px;
    }
    
    .agency-card:hover {
        transform: translateY(-10px);
    }
    
    /* Nouveaux styles pour le carousel */
    #agencesCarousel {
        padding-bottom: 50px;
    }
    
    #agencesCarousel .carousel-indicators {
        bottom: 0;
    }
    
    #agencesCarousel .carousel-indicators button {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: #ccc;
        margin: 0 5px;
    }
    
    #agencesCarousel .carousel-indicators button.active {
        background-color: #13357B;
    }
    
    #agencesCarousel .carousel-control-prev,
    #agencesCarousel .carousel-control-next {
        width: 40px;
        height: 40px;
        top: 50%;
        transform: translateY(-50%);
        opacity: 1;
    }
    
    #agencesCarousel .carousel-control-prev {
        left: -50px;
    }
    
    #agencesCarousel .carousel-control-next {
        right: -50px;
    }
    
    #agencesCarousel .carousel-control-prev-icon,
    #agencesCarousel .carousel-control-next-icon {
        width: 30px;
        height: 30px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        #agencesCarousel .carousel-control-prev {
            left: 0;
        }
        
        #agencesCarousel .carousel-control-next {
            right: 0;
        }
    }
</style>
</body>

</html>