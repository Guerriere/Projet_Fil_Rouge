<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelCam - Devenir Agence Partenaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#00703c',  // Vert camerounais
                        'secondary': '#fcd116', // Jaune camerounais
                        'accent': '#ce1126',    // Rouge camerounais
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold text-primary">
                        <span class="text-primary">Travel</span><span class="text-accent">Cam</span>
                    </a>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="{{ url('/') }}" class="text-primary hover:text-primary">Accueil</a>
                    <a href="{{ url('/apropos') }}" class="text-gray-700 hover:text-primary">A Propos </a>
                    <a href="{{ url('/agence') }}" class="text-gray-700 hover:text-primary"> Nos Agences</a>
                    <a href="{{ url('/services') }}" class="text-gray-700 hover:text-primary">Services</a>
                    <a href="{{ url('/contact') }}" class="text-gray-700 hover:text-primary">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="hover:text-primary" class="bg-white text-primary border border-primary hover:bg-primary hover:text-white px-4 py-2 rounded-md transition">Se connecter</a>
                    <a href="{{ route('register') }}" class="hover:text-primary" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-green-700 transition">S'inscrire</a>
                    
                </div>
                <div class="md:hidden flex items-center">
                    <button class="text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- En-tête de la page -->
    <header class="bg-primary py-12 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4">Devenez agence partenaire de TravelCam</h1>
                <p class="text-xl">Rejoignez notre réseau d'agences et développez votre activité au Cameroun</p>
            </div>
        </div>
    </header>

    <!-- Formulaire d'inscription étape par étape -->
    <section id="inscription" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold mb-8 text-center">Inscription Agence Partenaire</h2>
                
                <!-- Indicateur de progression -->
                <div class="mb-12">
                    <div class="flex items-center justify-between relative mb-2">
                        <div class="w-full absolute h-1 bg-gray-200"></div>
                        
                        <!-- Étape 1 -->
                        <div class="step-indicator relative z-10 flex flex-col items-center" data-step="1">
                            <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-semibold step-circle">1</div>
                            <div class="text-sm font-medium mt-2 step-label">Identification</div>
                        </div>
                        
                        <!-- Étape 2 -->
                        <div class="step-indicator relative z-10 flex flex-col items-center" data-step="2">
                            <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold step-circle">2</div>
                            <div class="text-sm font-medium mt-2 step-label">Infos agence</div>
                        </div>
                        
                        <!-- Étape 3 -->
                        <div class="step-indicator relative z-10 flex flex-col items-center" data-step="3">
                            <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold step-circle">3</div>
                            <div class="text-sm font-medium mt-2 step-label">Localisation</div>
                        </div>
                        
                        <!-- Étape 4 -->
                        <div class="step-indicator relative z-10 flex flex-col items-center" data-step="4">
                            <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold step-circle">4</div>
                            <div class="text-sm font-medium mt-2 step-label">Infos compl.</div>
                        </div>
                        
                        <!-- Étape 5 -->
                        <div class="step-indicator relative z-10 flex flex-col items-center" data-step="5">
                            <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold step-circle">5</div>
                            <div class="text-sm font-medium mt-2 step-label">Médias</div>
                        </div>
                        
                        <!-- Étape 6 -->
                        <div class="step-indicator relative z-10 flex flex-col items-center" data-step="6">
                            <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold step-circle">6</div>
                            <div class="text-sm font-medium mt-2 step-label">Services</div>
                        </div>
                        
                        <!-- Étape 7 -->
                        <div class="step-indicator relative z-10 flex flex-col items-center" data-step="7">
                            <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold step-circle">7</div>
                            <div class="text-sm font-medium mt-2 step-label">Validation</div>
                        </div>
                    </div>
                    <div class="progress-status text-center mt-4 text-gray-600">
                        Étape 1 sur 7 : Informations d'identification
                    </div>
                </div>
                
                <form method="POST" action="{{ route('/devenir-partenaire') }}">
                    <!-- Étape 1: Informations d'identification -->
                    <div class="step-content" data-step="1">
                        <h3 class="text-xl font-semibold mb-6 text-primary border-b pb-2">Informations d'identification</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-gray-700 mb-2">Email professionnel *</label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div>
                                <label for="phone" class="block text-gray-700 mb-2">Téléphone *</label>
                                <input type="tel" id="phone" name="phone" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div>
                                <label for="password" class="block text-gray-700 mb-2">Mot de passe *</label>
                                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                                <p class="text-xs text-gray-500 mt-1">8 caractères minimum, avec au moins une majuscule et un chiffre</p>
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-gray-700 mb-2">Confirmation du mot de passe *</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Étape 2: Informations sur l'agence -->
                    <div class="step-content hidden" data-step="2">
                        <h3 class="text-xl font-semibold mb-6 text-primary border-b pb-2">Informations sur l'agence</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="agency_name" class="block text-gray-700 mb-2">Nom de l'agence *</label>
                                <input type="text" id="agency_name" name="agency_name" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div>
                                <label for="agency_type" class="block text-gray-700 mb-2">Type d'agence *</label>
                                <select id="agency_type" name="agency_type" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option value="" disabled selected>Sélectionnez un type</option>
                                    <option value="transport">Agence de transport</option>
                                    <option value="hotel">Agence d'hébergement</option>
                                    <option value="tourism">Agence touristique</option>
                                    <option value="multi">Services multiples</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label for="description" class="block text-gray-700 mb-2">Description de l'agence *</label>
                                <textarea id="description" name="description" rows="4" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Décrivez votre agence, vos services et votre spécialité en quelques lignes..."></textarea>
                                <p class="text-sm text-gray-500 mt-1">Maximum 150 caractères. Cette description sera visible sur votre profil.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Étape 3: Localisation -->
                    <div class="step-content hidden" data-step="3">
                        <h3 class="text-xl font-semibold mb-6 text-primary border-b pb-2">Localisation</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="city" class="block text-gray-700 mb-2">Ville *</label>
                                <select id="city" name="city" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option value="" disabled selected>Sélectionnez une ville</option>
                                    <option value="yaounde">Yaoundé</option>
                                    <option value="douala">Douala</option>
                                    <option value="kribi">Kribi</option>
                                    <option value="limbe">Limbé</option>
                                    <option value="bafoussam">Bafoussam</option>
                                    <option value="garoua">Garoua</option>
                                    <option value="maroua">Maroua</option>
                                    <option value="buea">Buea</option>
                                    <option value="bamenda">Bamenda</option>
                                    <option value="ngaoundere">Ngaoundéré</option>
                                    <option value="ebolowa">Ebolowa</option>
                                    <option value="bertoua">Bertoua</option>
                                </select>
                            </div>
                            <div>
                                <label for="district" class="block text-gray-700 mb-2">Quartier *</label>
                                <input type="text" id="district" name="district" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div class="md:col-span-2">
                                <label for="address" class="block text-gray-700 mb-2">Adresse complète *</label>
                                <input type="text" id="address" name="address" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div class="md:col-span-2 mt-4 bg-blue-50 p-4 rounded-md">
                                <h4 class="font-semibold text-blue-700 mb-2">Régions desservies</h4>
                                <p class="text-gray-600 mb-4 text-sm">Sélectionnez les régions où vous proposez vos services :</p>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="region_centre" name="regions[]" value="centre" class="w-5 h-5 text-primary">
                                        <label for="region_centre" class="ml-2 text-gray-700">Centre</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="region_littoral" name="regions[]" value="littoral" class="w-5 h-5 text-primary">
                                        <label for="region_littoral" class="ml-2 text-gray-700">Littoral</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="region_ouest" name="regions[]" value="ouest" class="w-5 h-5 text-primary">
                                        <label for="region_ouest" class="ml-2 text-gray-700">Ouest</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="region_sud" name="regions[]" value="sud" class="w-5 h-5 text-primary">
                                        <label for="region_sud" class="ml-2 text-gray-700">Sud</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="region_nordouest" name="regions[]" value="nordouest" class="w-5 h-5 text-primary">
                                        <label for="region_nordouest" class="ml-2 text-gray-700">Nord-Ouest</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="region_sudouest" name="regions[]" value="sudouest" class="w-5 h-5 text-primary">
                                        <label for="region_sudouest" class="ml-2 text-gray-700">Sud-Ouest</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="region_adamaoua" name="regions[]" value="adamaoua" class="w-5 h-5 text-primary">
                                        <label for="region_adamaoua" class="ml-2 text-gray-700">Adamaoua</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="region_nord" name="regions[]" value="nord" class="w-5 h-5 text-primary">
                                        <label for="region_nord" class="ml-2 text-gray-700">Nord</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="region_extremenord" name="regions[]" value="extremenord" class="w-5 h-5 text-primary">
                                        <label for="region_extremenord" class="ml-2 text-gray-700">Extrême-Nord</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="region_est" name="regions[]" value="est" class="w-5 h-5 text-primary">
                                        <label for="region_est" class="ml-2 text-gray-700">Est</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Étape 4: Informations complémentaires -->
                    <div class="step-content hidden" data-step="4">
                        <h3 class="text-xl font-semibold mb-6 text-primary border-b pb-2">Informations complémentaires</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="website" class="block text-gray-700 mb-2">Site web</label>
                                <input type="url" id="website" name="website" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" placeholder="https://www.votresite.com">
                            </div>
                            <div>
                                <label for="founding_year" class="block text-gray-700 mb-2">Année de fondation</label>
                                <input type="number" id="founding_year" name="founding_year" min="1900" max="2025" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div>
                                <label for="license_number" class="block text-gray-700 mb-2">Numéro de licence *</label>
                                <input type="text" id="license_number" name="license_number" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div>
                                <label for="employees" class="block text-gray-700 mb-2">Nombre d'employés</label>
                                <select id="employees" name="employees" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option value="" disabled selected>Sélectionnez</option>
                                    <option value="1-5">1-5 employés</option>
                                    <option value="6-20">6-20 employés</option>
                                    <option value="21-50">21-50 employés</option>
                                    <option value="50+">Plus de 50 employés</option>
                                </select>
                            </div>
                            <div class="md:col-span-2 mt-4">
                                <h4 class="font-semibold text-gray-700 mb-3">Réseaux sociaux</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="facebook" class="block text-gray-700 mb-2">
                                            <i class="fab fa-facebook text-blue-600 mr-2"></i> Facebook
                                        </label>
                                        <input type="url" id="facebook" name="facebook" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" placeholder="https://www.facebook.com/votreagence">
                                    </div>
                                    <div>
                                        <label for="instagram" class="block text-gray-700 mb-2">
                                            <i class="fab fa-instagram text-pink-600 mr-2"></i> Instagram
                                        </label>
                                        <input type="url" id="instagram" name="instagram" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" placeholder="https://www.instagram.com/votreagence">
                                    </div>
                                    <div>
                                        <label for="twitter" class="block text-gray-700 mb-2">
                                            <i class="fab fa-twitter text-blue-400 mr-2"></i> Twitter
                                        </label>
                                        <input type="url" id="twitter" name="twitter" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" placeholder="https://www.twitter.com/votreagence">
                                    </div>
                                    <div>
                                        <label for="linkedin" class="block text-gray-700 mb-2">
                                            <i class="fab fa-linkedin text-blue-800 mr-2"></i> LinkedIn
                                        </label>
                                        <input type="url" id="linkedin" name="linkedin" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" placeholder="https://www.linkedin.com/company/votreagence">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Étape 5: Logo et images -->
                    <div class="step-content hidden" data-step="5">
                        <h3 class="text-xl font-semibold mb-6 text-primary border-b pb-2">Logo et images</h3>
                        <div class="space-y-8">
                            <div>
                                <label for="logo" class="block text-gray-700 mb-4">Logo de l'agence *</label>
                                <div class="flex items-center space-x-4">
                                    <div class="w-24 h-24 border-2 border-dashed border-gray-300 flex items-center justify-center rounded-lg bg-gray-50">
                                        <i class="fas fa-image text-gray-400 text-3xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <input type="file" id="logo" name="logo" accept="image/*" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-green-700">
                                        <p class="text-xs text-gray-500 mt-1">Format JPG ou PNG, taille maximale 2MB</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label for="gallery" class="block text-gray-700 mb-4">Photos de l'agence (max 3)</label>
                                <div class="flex flex-col space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center h-40 bg-gray-50">
                                            <i class="fas fa-plus-circle text-gray-400 text-3xl mb-2"></i>
                                            <span class="text-sm text-gray-500">Photo 1</span>
                                        </div>
                                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center h-40 bg-gray-50">
                                            <i class="fas fa-plus-circle text-gray-400 text-3xl mb-2"></i>
                                            <span class="text-sm text-gray-500">Photo 2</span>
                                        </div>
                                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center h-40 bg-gray-50">
                                            <i class="fas fa-plus-circle text-gray-400 text-3xl mb-2"></i>
                                            <span class="text-sm text-gray-500">Photo 3</span>
                                        </div>
                                    </div>
                                    <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-green-700">
                                    <p class="text-xs text-gray-500">Format JPG ou PNG, taille maximale 2MB par image</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Étape 6: Services proposés -->
                    <div class="step-content hidden" data-step="6">
                        <h3 class="text-xl font-semibold mb-6 text-primary border-b pb-2">Services proposés</h3>
                        <p class="text-gray-600 mb-6">Sélectionnez les services que votre agence propose :</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <div class="flex items-center">
                                <input type="checkbox" id="service_bus" name="services[]" value="bus" class="w-5 h-5 text-primary">
                                <label for="service_bus" class="ml-2 text-gray-700">Transport par bus</label>
                            </div>
                             <div class="flex items-center">
                                <input type="checkbox" id="service_train" name="services[]" value="train" class="w-5 h-5 text-primary">
                                <label for="service_train" class="ml-2 text-gray-700">Transport par train</label>
                             </div>
                             <div class="flex items-center">
                                <input type="checkbox" id="service_flight" name="services[]" value="flight" class="w-5 h-5 text-primary">
                                <label for="service_flight" class="ml-2 text-gray-700">Billetterie avion</label>
                             </div>
                             <div class="flex items-center">
                                <input type="checkbox" id="service_hotel" name="services[]" value="hotel" class="w-5 h-5 text-primary">
                                <label for="service_hotel" class="ml-2 text-gray-700">Réservation d'hôtels</label>
                             </div>
                             <div class="flex items-center">
                                <input type="checkbox" id="service_car" name="services[]" value="car" class="w-5 h-5 text-primary">
                                <label for="service_car" class="ml-2 text-gray-700">Location de voitures</label>
                             </div>
                             <div class="flex items-center">
                                <input type="checkbox" id="service_excursion" name="services[]" value="excursion" class="w-5 h-5 text-primary">
                                <label for="service_excursion" class="ml-2 text-gray-700">Excursions et circuits</label>
                             </div>
                             <div class="flex items-center">
                                <input type="checkbox" id="service_visa" name="services[]" value="visa" class="w-5 h-5 text-primary">
                                <label for="service_visa" class="ml-2 text-gray-700">Assistance visa</label>
                             </div>
                             <div class="flex items-center">
                                <input type="checkbox" id="service_insurance" name="services[]" value="insurance" class="w-5 h-5 text-primary">
                                <label for="service_insurance" class="ml-2 text-gray-700">Assurance voyage</label>
                             </div>
                             <div class="flex items-center">
                                <input type="checkbox" id="service_package" name="services[]" value="package" class="w-5 h-5 text-primary">
                                <label for="service_package" class="ml-2 text-gray-700">Packages touristiques</label>
                             </div>
                        </div>
                    </div>
                            
                    <div class="step-content hidden" data-step="7">
                        <h3 class="text-xl font-semibold mb-6 text-primary border-b pb-2">Validation et soumission</h3>
                        <p class="text-gray-600 mb-8">Veuillez vérifier attentivement les informations que vous avez fournies avant de soumettre votre candidature. Une fois soumise, notre équipe examinera votre demande et vous contactera dans les plus brefs délais.</p>
                        <div class="mb-6">
                            <div class="flex items-center">
                                <input type="checkbox" id="terms_validation" name="terms_validation" required class="w-5 h-5 text-primary">
                                <label for="terms_validation" class="ml-2 text-gray-700">J'accepte les <a href="{{ route('agency.politique') }}" class="text-primary hover:underline">termes et conditions</a> et la <a href="#" class="text-primary hover:underline">politique de confidentialité</a>.</label>
                            </div>
                        </div>
                        <button type="submit" class="w-full py-3 px-4 bg-secondary text-gray-800 rounded-md font-semibold hover:bg-yellow-400 transition">Soumettre ma candidature</button>
                    </div>
                    
                    <div class="flex justify-between mt-8">
                        <button type="button" class="prev-step py-2 px-4 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition hidden">Précédent</button>
                        <button type="button" class="next-step py-2 px-4 bg-primary text-white rounded-md hover:bg-green-700 transition">Suivant</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

     <!-- Avantages -->
     <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-10">Les avantages de devenir partenaire</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <div class="text-center p-6 rounded-lg shadow-md border border-gray-100 hover:shadow-lg transition">
                        <div class="inline-block p-4 bg-green-50 rounded-full mb-4">
                            <i class="fas fa-users text-3xl text-primary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Visibilité accrue</h3>
                        <p class="text-gray-600">Accédez à une clientèle plus large et augmentez votre notoriété sur tout le territoire.</p>
                    </div>
                    
                    <div class="text-center p-6 rounded-lg shadow-md border border-gray-100 hover:shadow-lg transition">
                        <div class="inline-block p-4 bg-green-50 rounded-full mb-4">
                            <i class="fas fa-chart-line text-3xl text-primary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Plus de réservations</h3>
                        <p class="text-gray-600">Augmentez votre chiffre d'affaires grâce à notre système de réservation en ligne.</p>
                    </div>
                    
                    <div class="text-center p-6 rounded-lg shadow-md border border-gray-100 hover:shadow-lg transition">
                        <div class="inline-block p-4 bg-green-50 rounded-full mb-4">
                            <i class="fas fa-tools text-3xl text-primary"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Outils de gestion</h3>
                        <p class="text-gray-600">Bénéficiez d'outils performants pour gérer vos réservations et vos clients.</p>
                    </div>
                </div>
                
                <div class="flex justify-center">
                    <a href="#inscription" class="flex items-center px-6 py-3 bg-secondary text-gray-800 rounded-md font-semibold hover:bg-yellow-400 transition">
                        <i class="fas fa-handshake mr-2"></i> Remplir le formulaire d'inscription
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">TravelCam</h3>
                    <p class="text-gray-300">Votre plateforme de réservation de voyages et d'hébergements au Cameroun.</p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-white hover:text-secondary"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white hover:text-secondary"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white hover:text-secondary"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white hover:text-secondary"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Accueil</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Agences</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Destinations</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">À propos</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center"><i class="fas fa-map-marker-alt mr-2 text-secondary"></i> Douala, Cameroun</li>
                        <li class="flex items-center"><i class="fas fa-phone mr-2 text-secondary"></i> +237 6XX XXX XXX</li>
                        <li class="flex items-center"><i class="fas fa-envelope mr-2 text-secondary"></i> contact@travelcam.cm</li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-4">Informations légales</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Conditions générales</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Politique de confidentialité</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Mentions légales</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-10 pt-6 text-center text-gray-400">
                <p>&copy; 2025 TravelCam. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
                            
                           
                            
    <script>
            document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.step-content');
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');
            const stepIndicators = document.querySelectorAll('.step-indicator');
            const progressStatus = document.querySelector('.progress-status');
            const form = document.getElementById('partner-registration');
            let currentStep = 1;
                            
            function updateStep() {
                steps.forEach(step => {
                    step.classList.add('hidden');
                });
                stepIndicators.forEach(indicator => {
                    indicator.querySelector('.step-circle').classList.remove('bg-primary', 'text-white');
                    indicator.querySelector('.step-circle').classList.add('bg-gray-300', 'text-gray-600');
                });
                steps[currentStep - 1].classList.remove('hidden');
                stepIndicators[currentStep - 1].querySelector('.step-circle').classList.add('bg-primary', 'text-white');

                progressStatus.textContent = `Étape ${currentStep} sur ${steps.length} : ${stepIndicators[currentStep - 1].querySelector('.step-label').textContent}`;

                if (currentStep === 1) {
                    prevButtons[0].classList.add('hidden');
                } else {
                    prevButtons[0].classList.remove('hidden');
                }

                if (currentStep === steps.length) {
                    nextButtons[0].classList.add('hidden');
                } else {
                    nextButtons[0].classList.remove('hidden');
                }
            }

            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (currentStep < steps.length) {
                        currentStep++;
                        updateStep();
                    } else if (currentStep === steps.length) {
                        // Ici, vous pouvez ajouter la logique de soumission du formulaire
                        alert('Formulaire soumis!');
                        form.submit();
                    }
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (currentStep > 1) {
                    currentStep--;
                    updateStep();
                    }
                 });
            });

            updateStep(); // Initialisation de l'étape 1
        });
    </script>
</body>
</html>