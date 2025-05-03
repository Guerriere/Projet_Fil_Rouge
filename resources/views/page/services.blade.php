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

    <!-- Bannière Services -->
    <div class="container-fluid position-relative banner-apropos">
        <div class="banner-overlay"></div>
        <div class="text-center text-white position-relative d-flex flex-column justify-content-center align-items-center h-100 ">
            <h3 class="display-3 text-white mb-4">Nos Services</h3>
        </div>
    </div>

    <!-- Section : Nos Services -->
    <div class="container-fluid bg-light service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Services</h5>
                <h1 class="mb-0">Ce que nous offrons</h1>
            </div>
            <div class="row g-4">
                <!-- Service 1 -->
                <div class="col-lg-6">
                    <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                        <div class="service-content text-end">
                            <h5 class="mb-4">Réservation de Voyages</h5>
                            <p class="mb-0">Simplifiez vos déplacements grâce à notre plateforme intuitive qui connecte les voyageurs aux agences locales fiables.</p>
                        </div>
                        <div class="service-icon p-4">
                            <i class="fa fa-bus fa-4x text-primary"></i>
                        </div>
                    </div>
                </div>
                <!-- Service 2 -->
                <div class="col-lg-6">
                    <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                        <div class="service-icon p-4">
                            <i class="fa fa-map fa-4x text-primary"></i>
                        </div>
                        <div class="service-content">
                            <h5 class="mb-4">Guides Touristiques</h5>
                            <p class="mb-0">Explorez les merveilles du Cameroun avec nos guides expérimentés qui vous accompagnent tout au long de votre voyage.</p>
                        </div>
                    </div>
                </div>
                <!-- Service 3 -->
                <div class="col-lg-6">
                    <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                        <div class="service-content text-end">
                            <h5 class="mb-4">Organisation de Voyages de Groupe</h5>
                            <p class="mb-0">Planifiez vos voyages en groupe avec nos services personnalisés pour les familles, amis ou entreprises.</p>
                        </div>
                        <div class="service-icon p-4">
                            <i class="fa fa-users fa-4x text-primary"></i>
                        </div>
                    </div>
                </div>
                <!-- Service 4 -->
                <div class="col-lg-6">
                    <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                        <div class="service-icon p-4">
                            <i class="fa fa-calendar fa-4x text-primary"></i>
                        </div>
                        <div class="service-content">
                            <h5 class="mb-4">Organisation d'Événements</h5>
                            <p class="mb-0">Confiez-nous la gestion de vos événements pour une expérience inoubliable, qu'il s'agisse de mariages, conférences ou séminaires.</p>
                        </div>
                    </div>
                </div>
                <!-- Service 5 -->
                <div class="col-lg-6">
                    <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                        <div class="service-content text-end">
                            <h5 class="mb-4">Support Client 24/7</h5>
                            <p class="mb-0">Notre équipe est disponible à tout moment pour répondre à vos questions et résoudre vos problèmes.</p>
                        </div>
                        <div class="service-icon p-4">
                            <i class="fa fa-headset fa-4x text-primary"></i>
                        </div>
                    </div>
                </div>
                <!-- Service 6 -->
                <div class="col-lg-6">
                    <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                        <div class="service-icon p-4">
                            <i class="fa fa-handshake fa-4x text-primary"></i>
                        </div>
                        <div class="service-content">
                            <h5 class="mb-4">Partenariats avec Agences</h5>
                            <p class="mb-0">Rejoignez notre réseau d'agences partenaires et bénéficiez d'une visibilité accrue et d'un accès à de nouveaux clients.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Testimonial Start -->
<div class="container-fluid bg-white testimonial py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Témoignages</h5>
            <h1 class="mb-0">Ce que disent nos clients</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <p class="text-center mb-5">"TravelCam a rendu mes voyages beaucoup plus simples. J'ai pu réserver mes billets en quelques clics et profiter d'un service client exceptionnel."</p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">Marie T.</h5>
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
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <p class="text-center mb-5">"Grâce à TravelCam, j'ai découvert des agences fiables pour mes voyages à travers le Cameroun. Je recommande vivement cette plateforme."</p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">Jean P.</h5>
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
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <p class="text-center mb-5">"Une expérience incroyable ! Les offres proposées par TravelCam sont variées et adaptées à tous les budgets."</p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">Fatou N.</h5>
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
            <div class="testimonial-item text-center rounded pb-4">
                <div class="testimonial-comment bg-light rounded p-4">
                    <p class="text-center mb-5">"Je suis impressionné par la simplicité d'utilisation de TravelCam. Réserver un voyage n'a jamais été aussi facile."</p>
                </div>
                <div class="testimonial-img p-1">
                    <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle" alt="Image">
                </div>
                <div style="margin-top: -35px;">
                    <h5 class="mb-0">Paul K.</h5>
                    <p class="mb-0">Bafoussam, Cameroun</p>
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
<!-- Testimonial End -->
    <!-- Section : Newsletter -->
    <div class="container-fluid subscribe py-5">
        <div class="container text-center py-5">
            <div class="mx-auto text-center" style="max-width: 900px;">
                <h5 class="subscribe-title px-3">Abonnez-vous</h5>
                <h1 class="text-white mb-4">Notre Newsletter</h1>
                <p class="text-white mb-5">Recevez les dernières nouvelles et offres exclusives directement dans votre boîte mail.</p>
                <div class="position-relative mx-auto">
                    <input class="form-control border-primary rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Votre email">
                    <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">S'abonner</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('includes.footer')

    @include('includes.script')
</body>

</html>