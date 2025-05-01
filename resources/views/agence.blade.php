<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Répertoire des Agences - TravelCam</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" rel="stylesheet">
    
    <style>
        #map { height: 500px; }
    </style>
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
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-primary">Accueil</a>
                    <a href="{{ url('/apropos') }}agencies" class="text-primary hover:text-primary">A Propos </a>
                    <a href="{{ url('/agence') }}" class="text-gray-700 hover:text-primary"> Nos Agences</a>
                    <a href="{{ url('/service') }}" class="text-gray-700 hover:text-primary">Services</a>
                    <a href="{{ url('/contact') }}" class="text-gray-700 hover:text-primary">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/login') }}" class="bg-white text-primary border border-primary hover:bg-primary hover:text-white px-4 py-2 rounded-md transition">Se connecter</a>
                    <a href="{{ url('/register') }}" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-green-700 transition">S'inscrire</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bannière À propos -->
    <div class="relative bg-gray-900 text-white">
        <div class="absolute inset-0 overflow-hidden">
            <img src="{{ asset('images/bv2.jpg') }}" alt="Belle vue du Cameroun" class="w-full h-full object-cover opacity-50">
        </div>
        <div class="relative container mx-auto px-4 py-24">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Répertoire des Agences Partenaires</h1>
                <p class="text-xl mb-8">Découvrez notre réseau d'agences de voyage certifiées à travers le Cameroun. Comparez leurs services et choisissez celle qui répond le mieux à vos besoins</p>
                
                <!-- Barre de recherche rapide -->
                <div class="w-full max-w-3xl bg-white rounded-lg p-4 shadow-lg">
                        <form class="flex flex-col md:flex-row gap-4">
                            <button type="submit" class="bg-primary text-white p-3 rounded hover:bg-primary/90 transition duration-300">
                                <i class="fas fa-search mr-2"></i>Rechercher
                            </button>
                        </form>
                    </div>
        
            </div>
        </div>
    </div>
    

    <!-- Filtres et Carte -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filtres -->
            <div class="lg:w-1/4">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-4 text-gray-800">Filtres</h2>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Ville</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            <option>Toutes les villes</option>
                            <option>Douala</option>
                            <option>Yaoundé</option>
                            <option>Kribi</option>
                            <option>Limbé</option>
                            <option>Bafoussam</option>
                            <option>Buea</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Spécialités</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="national" class="mr-2">
                                <label for="national">Voyages nationaux</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="international" class="mr-2">
                                <label for="international">Voyages internationaux</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="business" class="mr-2">
                                <label for="business">Voyages d'affaires</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="tourism" class="mr-2">
                                <label for="tourism">Tourisme</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="adventure" class="mr-2">
                                <label for="adventure">Aventure</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Note minimum</label>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star cursor-pointer"></i>
                            <i class="fas fa-star cursor-pointer"></i>
                            <i class="fas fa-star cursor-pointer"></i>
                            <i class="far fa-star cursor-pointer"></i>
                            <i class="far fa-star cursor-pointer"></i>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Services</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="airport" class="mr-2">
                                <label for="airport">Transfert aéroport</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="guide" class="mr-2">
                                <label for="guide">Guide touristique</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="visa" class="mr-2">
                                <label for="visa">Assistance visa</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="car" class="mr-2">
                                <label for="car">Location de voiture</label>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full bg-primary text-white py-2 rounded-md hover:bg-green-700 transition">Appliquer les filtres</button>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                    <h3 class="text-lg font-bold mb-3 text-gray-800">Besoin d'aide ?</h3>
                    <p class="text-gray-600 mb-4">Nous pouvons vous aider à trouver l'agence idéale pour votre voyage.</p>
                    <a href="#" class="flex items-center text-primary hover:text-green-700">
                        <i class="fas fa-phone-alt mr-2"></i>
                        <span>Nous contacter</span>
                    </a>
                </div>
            </div>
            
            <!-- Carte et Liste -->
            <div class="lg:w-3/4">
                <!-- Carte interactive -->
                <div class="bg-white p-4 rounded-lg shadow-md mb-8">
                    <h2 class="text-xl font-bold mb-4 text-gray-800">Carte des agences</h2>
                    <div id="map" class="rounded-lg"></div>
                </div>
                
                <!-- Liste des agences -->
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800">50 agences trouvées</h2>
                        <div class="flex items-center">
                            <span class="mr-2 text-gray-600">Trier par :</span>
                            <select class="px-3 py-2 border border-gray-300 rounded-md">
                                <option>Popularité</option>
                                <option>Note</option>
                                <option>A-Z</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Liste des agences -->
                    <div class="space-y-6">
                        <!-- Agence 1 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            <div class="md:flex">
                                <div class="md:w-1/3">
                                    <img src="/api/placeholder/400/300" alt="Cameroun Voyages" class="w-full h-full object-cover">
                                </div>
                                <div class="p-6 md:w-2/3">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800 mb-2">Cameroun Voyages</h3>
                                            <div class="flex text-yellow-400 mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span class="text-gray-600 ml-2">(128 avis)</span>
                                            </div>
                                        </div>
                                        <span class="bg-secondary text-primary px-3 py-1 rounded-full text-sm font-semibold">Premium</span>
                                    </div>
                                    
                                    <p class="text-gray-600 mb-4">Spécialiste des circuits touristiques à travers le Cameroun depuis plus de 15 ans. Voyages sur mesure et excursions guidées dans les parcs nationaux.</p>
                                    
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div class="flex items-center text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                                            <span>Douala, Quartier Akwa</span>
                                        </div>
                                        <div class="flex items-center text-gray-500">
                                            <i class="fas fa-phone mr-2 text-primary"></i>
                                            <span>+237 233 456 789</span>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Voyages nationaux</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Tourisme</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Aventure</span>
                                    </div>
                                    
                                    <div class="flex justify-end">
                                        <a href="agency-detail.html" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-green-700 transition">Voir les détails</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Agence 2 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            <div class="md:flex">
                                <div class="md:w-1/3">
                                    <img src="/api/placeholder/400/300" alt="Aventures Afrique" class="w-full h-full object-cover">
                                </div>
                                <div class="p-6 md:w-2/3">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800 mb-2">Aventures Afrique</h3>
                                            <div class="flex text-yellow-400 mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="text-gray-600 ml-2">(95 avis)</span>
                                            </div>
                                        </div>
                                        <span class="bg-secondary text-primary px-3 py-1 rounded-full text-sm font-semibold">Premium</span>
                                    </div>
                                    
                                    <p class="text-gray-600 mb-4">Voyages d'affaires et tourisme de luxe dans toutes les régions du Cameroun. Spécialiste des excursions dans l'Ouest et safari photo au Nord.</p>
                                    
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div class="flex items-center text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                                            <span>Yaoundé, Centre-ville</span>
                                        </div>
                                        <div class="flex items-center text-gray-500">
                                            <i class="fas fa-phone mr-2 text-primary"></i>
                                            <span>+237 222 333 444</span>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Voyages nationaux</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Voyages internationaux</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Voyages d'affaires</span>
                                    </div>
                                    
                                    <div class="flex justify-end">
                                        <a href="agency-detail.html" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-green-700 transition">Voir les détails</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Agence 3 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            <div class="md:flex">
                                <div class="md:w-1/3">
                                    <img src="/api/placeholder/400/300" alt="Kribi Express" class="w-full h-full object-cover">
                                </div>
                                <div class="p-6 md:w-2/3">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800 mb-2">Kribi Express</h3>
                                            <div class="flex text-yellow-400 mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span class="text-gray-600 ml-2">(76 avis)</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <p class="text-gray-600 mb-4">Spécialiste des séjours balnéaires et excursions sur la côte camerounaise. Organisation de plongées sous-marines et activités nautiques.</p>
                                    
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div class="flex items-center text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                                            <span>Kribi, Front de mer</span>
                                        </div>
                                        <div class="flex items-center text-gray-500">
                                            <i class="fas fa-phone mr-2 text-primary"></i>
                                            <span>+237 244 555 666</span>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Tourisme</span>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Aventure</span>
                                    </div>
                                    
                                    <div class="flex justify-end">
                                        <a href="agency-detail.html" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-green-700 transition">Voir les détails</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="flex justify-center mt-10">
                        <nav class="flex items-center space-x-2">
                            <a href="#" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">Précédent</a>
                            <a href="#" class="px-4 py-2 rounded-md bg-primary text-white">1</a>
                            <a href="#" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">2</a>
                            <a href="#" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">3</a>
                            <span class="px-2">...</span>
                            <a href="#" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">10</a>
                            <a href="#" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">Suivant</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer - même style que la page d'accueil -->
    <footer class="bg-gray-800 text-white py-12 mt-16">
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
                        <li><a href="index.html" class="text-gray-300 hover:text-white">Accueil</a></li>
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
            // Initialisation de la carte Leaflet
            var map = L.map('map').setView([4.0511, 9.7679], 6); // Centré sur le Cameroun
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            
            // Ajouter des marqueurs pour les agences (exemples)
            L.marker([4.0511, 9.7679]).addTo(map) // Douala
                .bindPopup('<b>Cameroun Voyages</b><br>Douala, Quartier Akwa')
                .openPopup();
                
            L.marker([3.8667, 11.5167]).addTo(map) // Yaoundé
                .bindPopup('<b>Aventures Afrique</b><br>Yaoundé, Centre-ville');
                
            L.marker([2.9373, 9.9107]).addTo(map) // Kribi
                .bindPopup('<b>Kribi Express</b><br>Kribi, Front de mer');
                
            L.marker([4.0293, 9.2131]).addTo(map) // Limbé
                .bindPopup('<b>Limbé Tours</b><br>Limbé, Mile 4');
                
            L.marker([5.4737, 10.4171]).addTo(map) // Bafoussam
                .bindPopup('<b>Ouest Voyage</b><br>Bafoussam, Centre commercial');
                
            L.marker([4.1575, 9.2337]).addTo(map) // Buea
                .bindPopup('<b>Mount Cameroon Expeditions</b><br>Buea, Molyko');
        });
    </script>
</body>
</html>