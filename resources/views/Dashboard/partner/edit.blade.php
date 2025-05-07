<!DOCTYPE html>
<html lang="fr">
@include('includes.header')

<style>
    .banner-edit {
        background: url('../images/apropos2.jpg') no-repeat center center;
        background-size: cover;
        height: 300px;
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

<!-- Navbar -->
@include('includes.navbar')

<body class="bg-light">
    <!-- Section Hero -->
    <section class="hero banner-edit text-white py-5">
        <div class="container">
            <div class="banner-overlay"></div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4 font-weight-bold">Modifier vos informations</h1>
                    <p class="lead mt-3">Mettez à jour les informations de votre profil et de votre agence.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulaire d'édition -->
    <section class="py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center text-primary mb-4">Modifier vos informations</h2>

                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">Informations personnelles</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="agency-tab" data-bs-toggle="tab" data-bs-target="#agency" type="button" role="tab" aria-controls="agency" aria-selected="false">Informations de l'agence</button>
                        </li>
                    </ul>

                    <form method="POST" action="{{ route('partner.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="tab-content" id="myTabContent">
                            <!-- Onglet Informations personnelles -->
                            <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                <h3 class="text-primary mb-3">Informations personnelles</h3>
                                <div class="row">
                                    <!-- Nom -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label font-weight-bold">Nom <span class="text-danger">*</span></label>
                                        <input type="text" id="name" name="name" required class="form-control" value="{{ old('name', $user->name) }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label font-weight-bold">Adresse email <span class="text-danger">*</span></label>
                                        <input type="email" id="email" name="email" required class="form-control" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Téléphone -->
                                    <div class="col-md-6 mb-3">
                                        <label for="telephone" class="form-label font-weight-bold">Téléphone <span class="text-danger">*</span></label>
                                        <input type="text" id="telephone" name="telephone" required class="form-control" value="{{ old('telephone', $user->telephone) }}">
                                        @error('telephone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Adresse -->
                                    <div class="col-md-6 mb-3">
                                        <label for="adresse" class="form-label font-weight-bold">Adresse <span class="text-danger">*</span></label>
                                        <input type="text" id="adresse" name="adresse" required class="form-control" value="{{ old('adresse', $user->adresse) }}">
                                        @error('adresse')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Mot de passe -->
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label font-weight-bold">Nouveau mot de passe <small>(laisser vide pour conserver l'actuel)</small></label>
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" class="form-control">
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
                                        <label for="password_confirmation" class="form-label font-weight-bold">Confirmer le nouveau mot de passe</label>
                                        <div class="input-group">
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#password_confirmation">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Onglet Informations de l'agence -->
                            <div class="tab-pane fade" id="agency" role="tabpanel" aria-labelledby="agency-tab">
                                <h3 class="text-primary mb-3">Informations de l'agence</h3>
                                <div class="row">
                                    <!-- Email professionnel -->
                                    <div class="col-md-6 mb-3">
                                        <label for="email_pro" class="form-label">Email professionnel <span class="text-danger">*</span></label>
                                        <input type="email" id="email_pro" name="email_pro" required class="form-control" value="{{ old('email_pro', $agence->email_pro) }}">
                                        @error('email_pro')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Téléphone professionnel -->
                                    <div class="col-md-6 mb-3">
                                        <label for="phone_pro" class="form-label">Téléphone professionnel <span class="text-danger">*</span></label>
                                        <input type="tel" id="phone_pro" name="phone_pro" required class="form-control" value="{{ old('phone_pro', $agence->phone_pro) }}">
                                        @error('phone_pro')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Nom de l'agence -->
                                    <div class="col-md-6 mb-3">
                                        <label for="agency_name" class="form-label">Nom de l'agence <span class="text-danger">*</span></label>
                                        <input type="text" id="agency_name" name="agency_name" required class="form-control" value="{{ old('agency_name', $agence->agency_name) }}">
                                        @error('agency_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                     <!-- Type d'agence -->
                                     <div class="col-md-6 mb-3">
                                        <label for="agency_type" class="form-label">Type d'agence <span class="text-danger">*</span></label>
                                        <select id="agency_type" name="agency_type" required class="form-select">
                                            <option value="Bus" {{ old('agency_type', $agence->agency_type) == 'Bus' ? 'selected' : '' }}>Bus</option>
                                            <option value="Train" {{ old('agency_type', $agence->agency_type) == 'Train' ? 'selected' : '' }}>Train</option>
                                            <option value="Avion" {{ old('agency_type', $agence->agency_type) == 'Avion' ? 'selected' : '' }}>Avion</option>
                                        </select>
                                        @error('agency_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Photo actuelle de l'agence -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Photo actuelle de l'agence</label>
                                        @if($agence->agency_photo)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $agence->agency_photo) }}" alt="Photo de l'agence" class="img-thumbnail" style="max-height: 150px;">
                                            </div>
                                        @else
                                            <p class="text-muted">Aucune photo disponible</p>
                                        @endif
                                    </div>

                                    <!-- Logo actuel de l'agence -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Logo actuel de l'agence</label>
                                        @if($agence->agency_logo)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $agence->agency_logo) }}" alt="Logo de l'agence" class="img-thumbnail" style="max-height: 150px;">
                                            </div>
                                        @else
                                            <p class="text-muted">Aucun logo disponible</p>
                                        @endif
                                    </div>

                                    <!-- Nouvelle photo de l'agence -->
                                    <div class="col-md-6 mb-3">
                                        <label for="agency_photo" class="form-label">Nouvelle photo de l'agence</label>
                                        <input type="file" id="agency_photo" name="agency_photo" class="form-control" accept="image/*">
                                        <small class="text-muted">Laissez vide pour conserver la photo actuelle</small>
                                        @error('agency_photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Nouveau logo de l'agence -->
                                    <div class="col-md-6 mb-3">
                                        <label for="agency_logo" class="form-label">Nouveau logo de l'agence</label>
                                        <input type="file" id="agency_logo" name="agency_logo" class="form-control" accept="image/*">
                                        <small class="text-muted">Laissez vide pour conserver le logo actuel</small>
                                        @error('agency_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary px-5">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Activation des onglets Bootstrap
            var triggerTabList = [].slice.call(document.querySelectorAll('#myTab button'))
            triggerTabList.forEach(function (triggerEl) {
                var tabTrigger = new bootstrap.Tab(triggerEl)
                triggerEl.addEventListener('click', function (event) {
                    event.preventDefault()
                    tabTrigger.show()
                })
            })
            
            // Gestion des boutons pour afficher/masquer les mots de passe
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
</body>
</html>