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
    
    .step-indicator {
        position: relative;
        z-index: 1;
    }
    
    .progress-line {
        position: absolute;
        top: 20px;
        left: 0;
        height: 2px;
        background-color: #dee2e6;
        width: 100%;
        z-index: 0;
    }
    
    .progress-line-active {
        position: absolute;
        top: 20px;
        left: 0;
        height: 2px;
        background-color: #13357B;
        z-index: 0;
        transition: width 0.3s ease;
    }
    
    .circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin: 0 auto;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .step-label {
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .form-control, .form-select {
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        border: 1px solid #ced4da;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #13357B;
        box-shadow: 0 0 0 0.25rem rgba(19, 53, 123, 0.25);
    }
    
    .btn-primary {
        background-color: #13357B;
        border-color: #13357B;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #0d2a64;
        border-color: #0d2a64;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .card {
        border: none;
        border-radius: 1rem;
        overflow: hidden;
    }
    
    .card-body {
        padding: 2.5rem;
    }
    
    .toggle-password {
        cursor: pointer;
    }
    
    .step-content {
        transition: all 0.3s ease;
    }
    
    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #495057;
    }
    
    .text-danger {
        font-size: 0.85rem;
        margin-top: 0.25rem;
    }
    
    .form-check-input:checked {
        background-color: #13357B;
        border-color: #13357B;
    }
</style>

<!-- Navbar -->
@include('includes.navbar')

<body class="bg-light">
    <!-- Section Hero -->
    <section class="hero banner-apropos text-white py-5">
        <div class="container">
            <div class="banner-overlay"></div>
            <div class="row align-items-center position-relative" style="z-index: 1;">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Devenez Partenaire de TravelCam</h1>
                    <p class="lead mb-4">Rejoignez notre réseau d'agences de voyage et développez votre activité avec nous. Inscrivez votre agence dès aujourd'hui et accédez à de nouvelles opportunités commerciales.</p>
                    <div class="d-flex gap-3">
                        <a href="#partner-form" class="btn btn-primary btn-lg rounded-pill">
                            <i class="fas fa-user-plus me-2"></i> S'inscrire maintenant
                        </a>
                        <a href="{{ url('/about') }}" class="btn btn-outline-light btn-lg rounded-pill">
                            <i class="fas fa-info-circle me-2"></i> En savoir plus
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="text-center">
                        <img src="{{ asset('images/partner-illustration.png') }}" alt="Partenariat" class="img-fluid" style="max-height: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Avantages -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pourquoi devenir partenaire ?</h2>
                <p class="text-muted">Découvrez les avantages de rejoindre notre réseau d'agences</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-globe fa-2x"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Visibilité accrue</h4>
                            <p class="text-muted mb-0">Exposez vos offres à un large public à travers tout le Cameroun et augmentez votre visibilité en ligne.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-chart-line fa-2x"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Augmentez vos revenus</h4>
                            <p class="text-muted mb-0">Recevez plus de réservations et développez votre activité grâce à notre plateforme de mise en relation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-tools fa-2x"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Outils performants</h4>
                            <p class="text-muted mb-0">Gérez facilement vos offres, vos réservations et vos clients grâce à notre tableau de bord intuitif.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulaire multi-étapes -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center text-primary fw-bold mb-4">Inscription Agence Partenaire</h2>

                    <!-- Indicateur de progression -->
                    <div class="d-flex justify-content-center align-items-center mb-5">
                        <div class="d-flex justify-content-between w-75 position-relative">
                            <div class="progress-line"></div>
                            <div class="progress-line-active" id="progress-active"></div>
                            
                            <div class="step-indicator text-center">
                                <div class="circle bg-primary text-white">1</div>
                                <span class="step-label d-block mt-2 text-primary">Informations personnelles</span>
                            </div>
                            <div class="step-indicator text-center">
                                <div class="circle bg-secondary text-white">2</div>
                                <span class="step-label d-block mt-2 text-secondary">Informations professionnelles</span>
                            </div>
                            <div class="step-indicator text-center">
                                <div class="circle bg-secondary text-white">3</div>
                                <span class="step-label d-block mt-2 text-secondary">Informations de l'agence</span>
                            </div>
                            <div class="step-indicator text-center">
                                <div class="circle bg-secondary text-white">4</div>
                                <span class="step-label d-block mt-2 text-secondary">Conditions</span>
                            </div>
                        </div>
                    </div>

                    <form id="partner-form" method="POST" action="{{ route('register.partner') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Étape 1 -->
                        <div class="step-content">
                            <h3 class="text-primary mb-4 fw-bold">Informations personnelles</h3>
                            <p class="text-muted mb-4">Veuillez fournir vos informations personnelles pour créer votre compte.</p>
                            
                            <div class="row">
                                <!-- Nom -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nom complet <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                        <input type="text" id="name" name="name" required class="form-control" placeholder="Entrez votre nom complet" value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Adresse email <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                        <input type="email" id="email" name="email" required class="form-control" placeholder="Entrez votre adresse email" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Téléphone -->
                                <div class="col-md-6 mb-3">
                                    <label for="telephone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                                        <input type="text" id="telephone" name="telephone" required class="form-control" placeholder="Entrez votre numéro de téléphone" value="{{ old('telephone') }}">
                                    </div>
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Adresse -->
                                <div class="col-md-6 mb-3">
                                    <label for="adresse" class="form-label">Adresse <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" id="adresse" name="adresse" required class="form-control" placeholder="Entrez votre adresse" value="{{ old('adresse') }}">
                                    </div>
                                    @error('adresse')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Mot de passe -->
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                        <input type="password" id="password" name="password" required class="form-control" placeholder="Créez un mot de passe sécurisé">
                                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <small class="text-muted">Le mot de passe doit contenir au moins 8 caractères</small>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Confirmation du mot de passe -->
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                        <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control" placeholder="Confirmez votre mot de passe">
                                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#password_confirmation">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Étape 2 -->
                        <div class="step-content d-none">
                            <h3 class="text-primary mb-4 fw-bold">Informations professionnelles</h3>
                            <p class="text-muted mb-4">Veuillez fournir vos informations professionnelles pour la communication avec les clients.</p>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email_pro" class="form-label">Email professionnel <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                        <input type="email" id="email_pro" name="email_pro" required class="form-control" placeholder="Entrez votre email professionnel" value="{{ old('email_pro') }}">
                                    </div>
                                    <small class="text-muted">Cet email sera visible par les clients</small>
                                    @error('email_pro')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_pro" class="form-label">Téléphone professionnel <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                                        <input type="tel" id="phone_pro" name="phone_pro" required class="form-control" placeholder="Entrez votre téléphone professionnel" value="{{ old('phone_pro') }}">
                                    </div>
                                    <small class="text-muted">Ce numéro sera visible par les clients</small>
                                    @error('phone_pro')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Étape 3 -->
                        <div class="step-content d-none">
                            <h3 class="text-primary mb-4 fw-bold">Informations sur l'agence</h3>
                            <p class="text-muted mb-4">Veuillez fournir les informations concernant votre agence de voyage.</p>
                            
                            <div class="row">
                                <!-- Nom de l'agence -->
                                <div class="col-md-6 mb-3">
                                    <label for="agency_name" class="form-label">Nom de l'agence <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-building"></i></span>
                                        <input type="text" id="agency_name" name="agency_name" required class="form-control" placeholder="Entrez le nom de votre agence" value="{{ old('agency_name') }}">
                                    </div>
                                    @error('agency_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Type d'agence -->
                                <div class="col-md-6 mb-3">
                                    <label for="agency_type" class="form-label">Type d'agence <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-tag"></i></span>
                                        <select id="agency_type" name="agency_type" required class="form-select">
                                            <option value="" disabled selected>Sélectionnez le type d'agence</option>
                                            <option value="Bus" {{ old('agency_type') == 'Bus' ? 'selected' : '' }}>Bus</option>
                                            <option value="Train" {{ old('agency_type') == 'Train' ? 'selected' : '' }}>Train</option>
                                            <option value="Avion" {{ old('agency_type') == 'Avion' ? 'selected' : '' }}>Avion</option>
                                        </select>
                                    </div>
                                    @error('agency_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Photo de l'agence -->
                                <div class="col-md-6 mb-4">
                                    <label for="agency_photo" class="form-label">Photo de l'agence <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-image"></i></span>
                                        <input type="file" id="agency_photo" name="agency_photo" required class="form-control" accept="image/*">
                                    </div>
                                    <small class="text-muted">Format recommandé: JPG, PNG - Max 2MB</small>
                                    <div class="mt-2" id="agency_photo_preview"></div>
                                    @error('agency_photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Logo de l'agence -->
                                <div class="col-md-6 mb-4">
                                    <label for="agency_logo" class="form-label">Logo de l'agence <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-image"></i></span>
                                        <input type="file" id="agency_logo" name="agency_logo" required class="form-control" accept="image/*">
                                    </div>
                                    <small class="text-muted">Format recommandé: JPG, PNG - Max 2MB</small>
                                    <div class="mt-2" id="agency_logo_preview"></div>
                                    @error('agency_logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Étape 4 -->
                        <div class="step-content d-none">
                            <h3 class="text-primary mb-4 fw-bold">Conditions d'utilisation</h3>
                            <div class="card border mb-4">
                                <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                                    <h5 class="card-title">Termes et conditions pour les partenaires TravelCam</h5>
                                    <p>En vous inscrivant en tant que partenaire sur TravelCam, vous acceptez les conditions suivantes :</p>
                                    
                                    <h6 class="mt-4">1. Inscription et compte</h6>
                                    <p>Vous devez fournir des informations exactes et complètes lors de votre inscription. Vous êtes responsable de la confidentialité de votre compte et de toutes les activités qui s'y déroulent.</p>
                                    
                                    <h6 class="mt-4">2. Services proposés</h6>
                                    <p>En tant que partenaire, vous vous engagez à fournir des services de transport de qualité, conformes aux descriptions que vous publiez sur la plateforme.</p>
                                    
                                    <h6 class="mt-4">3. Tarification et paiements</h6>
                                    <p>Vous êtes responsable de définir vos propres tarifs. TravelCam prélève une commission sur chaque réservation effectuée via la plateforme.</p>
                                    
                                    <h6 class="mt-4">4. Annulations et remboursements</h6>
                                    <p>Vous devez respecter la politique d'annulation et de remboursement définie par TravelCam.</p>
                                    
                                    <h6 class="mt-4">5. Responsabilités</h6>
                                    <p>Vous êtes entièrement responsable des services que vous proposez et de la sécurité de vos clients pendant le transport.</p>
                                </div>
                            </div>
                            
                            <div class="form-check mb-4">
                                <input type="checkbox" id="accept_conditions" name="accept_conditions" value="1" class="form-check-input" required>
                                <label for="accept_conditions" class="form-check-label">
                                    J'ai lu et j'accepte les <a href="#" class="text-primary">termes et conditions</a> de TravelCam
                                </label>
                                @error('accept_conditions')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-check mb-4">
                                <input type="checkbox" id="accept_marketing" name="accept_marketing" value="1" class="form-check-input">
                                <label for="accept_marketing" class="form-check-label">
                                    J'accepte de recevoir des informations marketing et des mises à jour de TravelCam
                                </label>
                            </div>
                        </div>

                        <!-- Boutons de navigation -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary prev-step d-none">
                                <i class="fas fa-arrow-left me-2"></i> Précédent
                            </button>
                            <button type="button" class="btn btn-primary next-step">
                                Suivant <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Section FAQ -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Questions fréquentes</h2>
                <p class="text-muted">Tout ce que vous devez savoir sur le partenariat avec TravelCam</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border mb-3 rounded">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Comment fonctionne le partenariat avec TravelCam ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Une fois inscrit et validé, vous pourrez publier vos offres de voyage sur notre plateforme. Les clients pourront réserver directement via TravelCam, et vous recevrez une notification pour chaque réservation. Vous gérez vos disponibilités et vos tarifs depuis votre tableau de bord partenaire.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border mb-3 rounded">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Quels sont les frais associés au partenariat ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    TravelCam prélève une commission de 10% sur chaque réservation effectuée via la plateforme. L'inscription en tant que partenaire est gratuite, et il n'y a pas de frais mensuels ou annuels.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border mb-3 rounded">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Combien de temps prend la validation de mon compte partenaire ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    La validation de votre compte partenaire prend généralement entre 24 et 48 heures ouvrables. Notre équipe vérifie les informations fournies pour s'assurer de la qualité des services proposés sur notre plateforme.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border mb-3 rounded">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Comment puis-je gérer mes réservations ?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Vous disposez d'un tableau de bord partenaire complet qui vous permet de gérer vos offres, vos réservations, vos disponibilités et vos paiements. Vous recevez également des notifications par email pour chaque nouvelle réservation.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('includes.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.step-content');
            const nextButton = document.querySelector('.next-step');
            const prevButton = document.querySelector('.prev-step');
            const indicators = document.querySelectorAll('.step-indicator .circle');
            const labels = document.querySelectorAll('.step-indicator .step-label');
            const progressActive = document.getElementById('progress-active');
            let currentStep = 0;

            function updateSteps() {
                steps.forEach((step, index) => {
                    step.classList.toggle('d-none', index !== currentStep);
                });
                
                indicators.forEach((indicator, index) => {
                    if (index < currentStep) {
                        // Étapes terminées
                        indicator.classList.remove('bg-secondary');
                        indicator.classList.add('bg-success');
                        indicator.innerHTML = '<i class="fas fa-check"></i>';
                    } else if (index === currentStep) {
                        // Étape actuelle
                        indicator.classList.remove('bg-secondary', 'bg-success');
                        indicator.classList.add('bg-primary');
                        indicator.innerHTML = (index + 1).toString();
                    } else {
                        // Étapes à venir
                        indicator.classList.remove('bg-primary', 'bg-success');
                        indicator.classList.add('bg-secondary');
                        indicator.innerHTML = (index + 1).toString();
                    }
                });
                
                labels.forEach((label, index) => {
                    label.classList.toggle('text-primary', index === currentStep);
                    label.classList.toggle('text-success', index < currentStep);
                    label.classList.toggle('text-secondary', index > currentStep);
                });
                
                prevButton.classList.toggle('d-none', currentStep === 0);
                
                if (currentStep === steps.length - 1) {
                    nextButton.textContent = 'Soumettre';
                    nextButton.innerHTML = 'Soumettre <i class="fas fa-check ms-2"></i>';
                    nextButton.classList.remove('btn-primary');
                    nextButton.classList.add('btn-success');
                } else {
                    nextButton.innerHTML = 'Suivant <i class="fas fa-arrow-right ms-2"></i>';
                    nextButton.classList.remove('btn-success');
                    nextButton.classList.add('btn-primary');
                }
                
                // Mise à jour de la barre de progression
                const progressWidth = (currentStep / (steps.length - 1)) * 100;
                progressActive.style.width = `${progressWidth}%`;
            }

            nextButton.addEventListener('click', () => {
                if (currentStep < steps.length - 1) {
                    // Validation basique des champs requis de l'étape actuelle
                    const currentStepElement = steps[currentStep];
                    const requiredFields = currentStepElement.querySelectorAll('input[required], select[required]');
                    let isValid = true;
                    
                    requiredFields.forEach(field => {
                        if (!field.value) {
                            isValid = false;
                            field.classList.add('is-invalid');
                        } else {
                            field.classList.remove('is-invalid');
                        }
                    });
                    
                    if (isValid) {
                        currentStep++;
                        updateSteps();
                        window.scrollTo({top: 0, behavior: 'smooth'});
                    } else {
                        // Afficher un message d'erreur
                        alert('Veuillez remplir tous les champs obligatoires avant de continuer.');
                    }
                } else {
                    // Vérifier si la case des conditions est cochée
                    const acceptConditions = document.getElementById('accept_conditions');
                    if (acceptConditions.checked) {
                        document.getElementById('partner-form').submit();
                    } else {
                        alert('Vous devez accepter les termes et conditions pour continuer.');
                        acceptConditions.classList.add('is-invalid');
                    }
                }
            });

            prevButton.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    updateSteps();
                    window.scrollTo({top: 0, behavior: 'smooth'});
                }
            });

            // Prévisualisation des images
            document.getElementById('agency_photo').addEventListener('change', function(e) {
                const preview = document.getElementById('agency_photo_preview');
                preview.innerHTML = '';
                
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-thumbnail', 'mt-2');
                        img.style.maxHeight = '150px';
                        preview.appendChild(img);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
            
            document.getElementById('agency_logo').addEventListener('change', function(e) {
                const preview = document.getElementById('agency_logo_preview');
                preview.innerHTML = '';
                
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-thumbnail', 'mt-2');
                        img.style.maxHeight = '150px';
                        preview.appendChild(img);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Gestion de l'affichage/masquage des mots de passe
            const togglePasswordButtons = document.querySelectorAll('.toggle-password');
            togglePasswordButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const targetInput = document.querySelector(this.getAttribute('data-target'));
                    const icon = this.querySelector('i');

                    if (targetInput.type === 'password') {
                        targetInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        targetInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });

            updateSteps();
        });
    </script>
</body>
</html>