<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Partenaire - TravelCam</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-LZ0pDyjz.css') }}">
</head>
<body class="bg-gray-50">
    <!-- En-tête -->
    <header class="bg-primary py-12 text-white text-center">
        <h1 class="text-4xl font-bold">Devenez agence partenaire de TravelCam</h1>
        <p class="text-xl mt-2">Rejoignez notre réseau et développez votre activité au Cameroun</p>
    </header>

    <!-- Formulaire multi-étapes -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-center mb-8">Inscription Agence Partenaire</h2>

                <!-- Indicateur de progression -->
                <div class="flex items-center justify-between mb-8">
                    <div class="w-full h-1 bg-gray-200 absolute"></div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center">1</div>
                        <span class="text-sm mt-2">Identification</span>
                    </div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">2</div>
                        <span class="text-sm mt-2">Infos agence</span>
                    </div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">3</div>
                        <span class="text-sm mt-2">Localisation</span>
                    </div>
                </div>

                <form id="partner-form" method="POST" action="{{ route('register.agency') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Étape 1 -->
                    <div class="step-content">
                        <h3 class="text-xl font-semibold mb-4">Informations d'identification</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email professionnel *</label>
                                <input type="email" id="email" name="email" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone *</label>
                                <input type="tel" id="phone" name="phone" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            </div>
                        </div>
                    </div>

                    <!-- Étape 2 -->
                    <div class="step-content hidden">
                        <h3 class="text-xl font-semibold mb-4">Informations sur l'agence</h3>
                        <div>
                            <label for="agency_name" class="block text-sm font-medium text-gray-700">Nom de l'agence *</label>
                            <input type="text" id="agency_name" name="agency_name" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                        </div>
                    </div>

                    <!-- Étape 3 -->
                    <div class="step-content hidden">
                        <h3 class="text-xl font-semibold mb-4">Localisation</h3>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">Ville *</label>
                            <select id="city" name="city" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                                <option value="" disabled selected>Sélectionnez une ville</option>
                                <option value="yaounde">Yaoundé</option>
                                <option value="douala">Douala</option>
                            </select>
                        </div>
                    </div>

                    <!-- Boutons de navigation -->
                    <div class="flex justify-between mt-8">
                        <button type="button" class="prev-step hidden bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Précédent</button>
                        <button type="button" class="next-step bg-primary text-white px-4 py-2 rounded-md">Suivant</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.step-content');
            const nextButton = document.querySelector('.next-step');
            const prevButton = document.querySelector('.prev-step');
            let currentStep = 0;

            function updateSteps() {
                steps.forEach((step, index) => {
                    step.classList.toggle('hidden', index !== currentStep);
                });
                prevButton.classList.toggle('hidden', currentStep === 0);
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
    </script>
</body>
</html>