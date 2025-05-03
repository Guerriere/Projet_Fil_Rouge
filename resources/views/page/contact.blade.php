<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/page/contact.blade.php -->
<!DOCTYPE html>
<html lang="fr">

@include('includes.header')

<style>
    .banner-apropos {
    background: url('../images/services.jpg') no-repeat center center;
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

    <!-- Bannière Contact -->
    <div class="container-fluid position-relative banner-apropos">
        <div class="banner-overlay"></div>
        <div class="text-center text-white position-relative d-flex flex-column justify-content-center align-items-center h-100">
            <h3 class="display-3 text-white mb-4">Contactez-nous</h3>
        </div>
    </div>

    <!-- Section : Contact -->
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Contactez-nous</h5>
                <h1 class="mb-0">Nous sommes là pour vous aider</h1>
            </div>
            <div class="row g-5 align-items-center">
                <!-- Informations de contact -->
                <div class="col-lg-4">
                    <div class="bg-white rounded p-4">
                        <div class="text-center mb-4">
                            <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                            <h4 class="text-primary">Adresse</h4>
                            <p class="mb-0">123 Rue des Voyages, Douala, Cameroun</p>
                        </div>
                        <div class="text-center mb-4">
                            <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                            <h4 class="text-primary">Téléphone</h4>
                            <p class="mb-0">+237 123 456 789</p>
                            <p class="mb-0">+237 987 654 321</p>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                            <h4 class="text-primary">Email</h4>
                            <p class="mb-0">contact@travelcam.com</p>
                            <p class="mb-0">support@travelcam.com</p>
                        </div>
                    </div>
                </div>

                <!-- Formulaire de contact -->
                <div class="col-lg-8">
                    <h3 class="mb-2">Envoyez-nous un message</h3>
                    <p class="mb-4">Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter via le formulaire ci-dessous. Nous vous répondrons dans les plus brefs délais.</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="name" placeholder="Votre nom">
                                    <label for="name">Votre nom</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0" id="email" placeholder="Votre email">
                                    <label for="email">Votre email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="subject" placeholder="Sujet">
                                    <label for="subject">Sujet</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0" placeholder="Laissez votre message ici" id="message" style="height: 160px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Envoyer le message</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Carte Google Maps -->
                <div class="col-12">
                    <div class="rounded">
                        <iframe class="rounded w-100" 
                            style="height: 450px;" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.5123456789!2d9.7085!3d4.0511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610d123456789%3A0xabcdef123456789!2sDouala%2C%20Cameroun!5e0!3m2!1sfr!2sfr!4v1694259649153!5m2!1sfr!2sfr" 
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

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