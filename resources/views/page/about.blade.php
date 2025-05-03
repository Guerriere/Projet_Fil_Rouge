<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/page/about.blade.php -->
<!DOCTYPE html>
<html lang="fr">

@include('includes.header')

<style>
    .banner-apropos {
    background: url('../images/apropos2.jpg') no-repeat center center;
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
</style>

<body>
    <!-- Navbar -->
    @include('includes.navbar')

    <!-- Bannière À propos -->
<!-- Bannière À propos -->
<div class="container-fluid position-relative banner-apropos" >
    <!-- Superposition sombre -->
    <div class="banner-overlay" style="background: rgba(0, 0, 0, 0.5);"></div>
    
    <!-- Contenu centré -->
    <div class="text-center text-white position-relative d-flex flex-column justify-content-center align-items-center h-100">
        <h3 class="display-3 text-white mb-4">À propos de TravelCam</h3>
        
    </div>
</div>
<!-- Espacement entre les sections -->
<div class="py-5"></div>

    <!-- Section : Notre histoire -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('images/apropos.jpg') }}" alt="Notre histoire" class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                </div>
                <div class="col-lg-6">
                    <h2 class="text-primary mb-4">Notre histoire</h2>
                    <p>TravelCam a été fondée en 2023 par un groupe d'entrepreneurs camerounais passionnés par le voyage et la technologie. Notre objectif est de simplifier la réservation de voyages au Cameroun en connectant les voyageurs avec des agences locales fiables.</p>
                    <p>Depuis notre lancement, nous avons aidé des milliers de voyageurs à explorer le Cameroun en toute sérénité, en collaborant avec plus de 150 agences partenaires dans 30 villes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Espacement entre les sections -->
    <div class="py-5"></div>

    <!-- Section : Notre mission et vision -->
<section class="py-24 bg-light"> <!-- Augmenté le padding vertical -->
    <div class="container mx-auto pb-5 px-4">
        <div class="row g-5">
            <!-- Mission -->
            <div class="col-lg-6">
                <div class="bg-white p-5 rounded shadow h-100"> <!-- Ajouté h-100 pour aligner -->
                    <h3 class="text-primary mb-3">Notre mission</h3>
                    <p>Faciliter les déplacements  au Cameroun grâce à une plateforme intuitive et fiable.</p>
                    <ul class="list-unstyled mt-3">
                        <li><i class="fas fa-check text-primary me-2"></i> Connecter les voyageurs aux agences locales</li>
                        <li><i class="fas fa-check text-primary me-2"></i> Simplifier la réservation de voyages</li>
                        <li><i class="fas fa-check text-primary me-2"></i> Promouvoir le tourisme local</li>
                    </ul>
                </div>
            </div>
            <!-- Vision -->
            <div class="col-lg-6">
                <div class="bg-white p-5 rounded shadow h-100"> <!-- Ajouté h-100 pour aligner -->
                    <h3 class="text-primary mb-3">Notre vision</h3>
                    <p>Devenir la référence en matière de réservation de voyages au Cameroun et en Afrique centrale.</p>
                    <ul class="list-unstyled mt-3">
                        <li><i class="fas fa-check text-primary me-2"></i> Étendre notre réseau à toute l'Afrique centrale</li>
                        <li><i class="fas fa-check text-primary me-2"></i> Digitaliser l'industrie du voyage</li>
                        <li><i class="fas fa-check text-primary me-2"></i> Valoriser les services locaux</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Espacement entre les sections -->
    <div class="py-5"></div>

    <!-- Section : Nos valeurs -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-primary mb-5">Nos valeurs</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="p-5 bg-light rounded shadow h-100"> <!-- Uniformisé la taille -->
                        <i class="fas fa-handshake fa-3x text-primary mb-3"></i>
                        <h5>Transparence</h5>
                        <p>Nous garantissons des informations claires et fiables pour nos utilisateurs.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="p-5 bg-light rounded shadow h-100"> <!-- Uniformisé la taille -->
                        <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h5>Fiabilité</h5>
                        <p>Nos partenaires sont soigneusement sélectionnés pour garantir des services de qualité.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="p-5 bg-light rounded shadow h-100"> <!-- Uniformisé la taille -->
                        <i class="fas fa-universal-access fa-3x text-primary mb-3"></i>
                        <h5>Accessibilité</h5>
                        <p>Nous rendons nos services accessibles à tous, partout au Cameroun.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="p-5 bg-light rounded shadow h-100"> <!-- Uniformisé la taille -->
                        <i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i>
                        <h5>Promotion locale</h5>
                        <p>Nous valorisons le tourisme camerounais et les acteurs locaux.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Espacement entre les sections -->
    <div class="py-5"></div>

  <!-- Section : Notre équipe -->
<section class="py-16 bg-light my-5"> <!-- Ajouté my-5 pour espacement vertical -->
    <div class="container mx-auto pt-5 px-4">
        <h2 class="text-primary mb-5 text-center">Notre équipe</h2>
        <p class="mb-5 text-center">Une équipe passionnée dédiée à améliorer l'expérience de voyage au Cameroun.</p>
        <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#teamCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#teamCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#teamCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#teamCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>

            <!-- Carousel items -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row align-items-center p-4"> <!-- Ajouté p-4 pour espacement -->
                        <!-- Membre 1 -->
                        <div class="col-lg-6 text-center">
                            <img src="{{ asset('images/ceo.jpg') }}" alt="Jean-Paul Mbida" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px;">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-3"> <!-- Ajouté p-3 pour espacement intérieur -->
                                <h5>Jean-Paul Mbida</h5>
                                <p class="text-primary">CEO & Co-fondateur</p>
                                <p>Jean-Paul est un entrepreneur passionné par le voyage et la technologie. Il dirige TravelCam avec une vision claire : simplifier les déplacements au Cameroun.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row align-items-center p-4"> <!-- Ajouté p-4 pour espacement -->
                        <!-- Membre 2 -->
                        <div class="col-lg-6 text-center">
                            <img src="{{ asset('images/cto.jpg') }}" alt="Marie Ngoumou" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px;">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-3"> <!-- Ajouté p-3 pour espacement intérieur -->
                                <h5>Marie Ngoumou</h5>
                                <p class="text-primary">CTO & Co-fondatrice</p>
                                <p>Marie est experte en développement de plateformes numériques. Elle supervise la technologie derrière TravelCam pour offrir une expérience utilisateur fluide.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="row align-items-center p-4"> <!-- Ajouté p-4 pour espacement -->
                        <!-- Membre 3 -->
                        <div class="col-lg-6 text-center">
                            <img src="{{ asset('images/ctoo.jpg') }}" alt="Samuel Atangana" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px;">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-3"> <!-- Ajouté p-3 pour espacement intérieur -->
                                <h5>Samuel Atangana</h5>
                                <p class="text-primary">Directeur Marketing</p>
                                <p>Samuel est responsable de la stratégie marketing de TravelCam. Il travaille à promouvoir la plateforme auprès des voyageurs et des agences partenaires.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="carousel-item">
                    <div class="row align-items-center p-4"> <!-- Ajouté p-4 pour espacement -->
                        <!-- Membre 4 -->
                        <div class="col-lg-6 text-center">
                            <img src="{{ asset('images/directrice.jpg') }}" alt="Christine Ondoa" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px;">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-3"> <!-- Ajouté p-3 pour espacement intérieur -->
                                <h5>Christine Ondoa</h5>
                                <p class="text-primary">Directrice des Opérations</p>
                                <p>Christine gère les opérations quotidiennes de TravelCam. Elle veille à ce que chaque voyageur bénéficie d'un service de qualité.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-primary rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-primary rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
    </div>
</section>

<!-- Espacement entre les sections -->
<div class="py-5"></div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        @include('includes.footer')
    </footer>

    @include('includes.script')
</body>
</html>