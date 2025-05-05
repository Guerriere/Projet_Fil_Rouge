<!DOCTYPE html>
<html lang="fr">
@include('includes.header') <!-- Inclusion du header -->

<body class="bg-light">
    <!-- Navbar -->
    @include('includes.navbar') <!-- Inclusion de la navbar -->

    <!-- Section Hero -->
    <section class="hero bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4 font-weight-bold">Devenez Partenaire de TravelCam</h1>
                    <p class="lead mt-3">Rejoignez notre réseau et développez votre activité avec nous. Inscrivez votre agence dès aujourd'hui et accédez à de nouvelles opportunités.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/hero-partner.jpg') }}" alt="Partenaire TravelCam" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Formulaire multi-étapes -->
    <section class="py-5">
        <div class="container">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center text-primary mb-4">Inscription Agence Partenaire</h2>

                    <!-- Indicateur de progression -->
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <div class="d-flex justify-content-between w-75 position-relative">
                            <div class="step-indicator text-center">
                                <div class="circle bg-primary text-white">1</div>
                                <span class="step-label d-block mt-2 text-primary">Étape 1</span>
                            </div>
                            <div class="step-indicator text-center">
                                <div class="circle bg-secondary text-white">2</div>
                                <span class="step-label d-block mt-2 text-secondary">Étape 2</span>
                            </div>
                            <div class="step-indicator text-center">
                                <div class="circle bg-secondary text-white">3</div>
                                <span class="step-label d-block mt-2 text-secondary">Étape 3</span>
                            </div>
                            <div class="step-indicator text-center">
                                <div class="circle bg-secondary text-white">4</div>
                                <span class="step-label d-block mt-2 text-secondary">Étape 4</span>
                            </div>
                        </div>
                    </div>

                    <form id="partner-form" method="POST" action="{{ route('register.partner') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Étape 1 -->
                        <div class="step-content">
                            <h3 class="text-primary mb-3">Informations personnelles</h3>
                            <div class="row">
                                <!-- Nom -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label font-weight-bold">Nom <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" required class="form-control" placeholder="Entrez votre nom" style="font-size: 0.9rem;" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label font-weight-bold">Adresse email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email" required class="form-control" placeholder="Entrez votre adresse email" style="font-size: 0.9rem;" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Téléphone -->
                                <div class="col-md-6 mb-3">
                                    <label for="telephone" class="form-label font-weight-bold">Téléphone <span class="text-danger">*</span></label>
                                    <input type="text" id="telephone" name="telephone" required class="form-control" placeholder="Entrez votre téléphone" style="font-size: 0.9rem;" value="{{ old('telephone') }}">
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Adresse -->
                                <div class="col-md-6 mb-3">
                                    <label for="adresse" class="form-label font-weight-bold">Adresse <span class="text-danger">*</span></label>
                                    <input type="text" id="adresse" name="adresse" required class="form-control" placeholder="Entrez votre adresse" style="font-size: 0.9rem;" value="{{ old('adresse') }}">
                                    @error('adresse')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Mot de passe -->
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label font-weight-bold">Mot de passe <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" required class="form-control" placeholder="Entrez votre mot de passe" style="font-size: 0.9rem;">
                                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Confirmation du mot de passe -->
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label font-weight-bold">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control" placeholder="Confirmez votre mot de passe" style="font-size: 0.9rem;">
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
                            <h3 class="text-primary mb-3">Informations d'identification</h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email_pro" class="form-label">Email professionnel *</label>
                                    <input type="email" id="email_pro" name="email_pro" required class="form-control" placeholder="Entrez votre email professionnel">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_pro" class="form-label">Téléphone professionnel *</label>
                                    <input type="tel" id="phone_pro" name="phone_pro" required class="form-control" placeholder="Entrez votre téléphone professionnel">
                                </div>
                            </div>
                        </div>

                        <!-- Étape 3 -->
                        <div class="step-content d-none">
                            <h3 class="text-primary mb-3">Informations sur l'agence</h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="agency_name" class="form-label">Nom de l'agence *</label>
                                    <input type="text" id="agency_name" name="agency_name" required class="form-control" placeholder="Entrez le nom de l'agence">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="agency_type" class="form-label">Type d'agence *</label>
                                    <select id="agency_type" name="agency_type" required class="form-select">
                                        <option value="" disabled selected>Sélectionnez le type d'agence</option>
                                        <option value="Bus">Bus</option>
                                        <option value="Train">Train</option>
                                        <option value="Avion">Avion</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 4 -->
                        <div class="step-content d-none">
                            <h3 class="text-primary mb-3">Conditions</h3>
                            <p>En vous inscrivant, vous acceptez nos <a href="#" class="text-primary">termes et conditions</a>.</p>
                            <div class="form-check">
                                <input type="checkbox" id="accept_conditions" name="accept_conditions" value="1" class="form-check-input" required>
                                <label for="accept_conditions" class="form-check-label">
                                    J'accepte les termes et conditions
                                </label>
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary prev-step d-none">Précédent</button>
                            <button type="button" class="btn btn-primary next-step">Suivant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('includes.footer') <!-- Inclusion du footer -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.step-content');
            const nextButton = document.querySelector('.next-step');
            const prevButton = document.querySelector('.prev-step');
            const indicators = document.querySelectorAll('.step-indicator .circle');
            const labels = document.querySelectorAll('.step-indicator .step-label');
            let currentStep = 0;

            function updateSteps() {
                steps.forEach((step, index) => {
                    step.classList.toggle('d-none', index !== currentStep);
                    indicators[index].classList.toggle('bg-primary', index === currentStep);
                    indicators[index].classList.toggle('bg-secondary', index !== currentStep);
                    labels[index].classList.toggle('text-primary', index === currentStep);
                    labels[index].classList.toggle('text-secondary', index !== currentStep);
                });
                prevButton.classList.toggle('d-none', currentStep === 0);
                nextButton.textContent = currentStep === steps.length - 1 ? 'Soumettre' : 'Suivant';
            }

            nextButton.addEventListener('click', () => {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    updateSteps();
                } else {
                    document.getElementById('partner-form').submit();
                }
            });

            prevButton.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    updateSteps();
                }
            });

            updateSteps();
        });

        document.addEventListener('DOMContentLoaded', function () {
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
        });
    </script>

    <style>
        .circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</body>
</html>