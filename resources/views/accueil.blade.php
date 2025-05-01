<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelCam - Réservation de Voyages et Hébergements au Cameroun</title>
    <link rel="stylesheet" href="{{asset('build/assets/app-LZ0pDyjz.css')}}"/>           
    <script src="{{asset('build/assets/app-Bo-u61x1.js')}}"></script>

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
                    <a href="{{ route('login') }}" class="hover:text-blue-500" class="bg-white text-primary border border-primary hover:bg-primary hover:text-white px-4 py-2 rounded-md transition">Se connecter</a>
                    <a href="{{ route('register') }}" class="hover:text-blue-500" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-green-700 transition">S'inscrire</a>
                    
                </div>
                <div class="md:hidden flex items-center">
                    <button class="text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
<!-- Bouton flottant pour devenir partenaire -->
<div class="fixed bottom-8 right-8 z-50">
    <a href="#" class="flex items-center px-4 py-3 bg-secondary text-gray-800 rounded-full shadow-lg hover:bg-yellow-400 transition">
        <i class="fas fa-handshake mr-2"></i>
        <span class="font-medium">Devenir partenaire</span>
    </a>
</div>
    <!-- Hero Section -->
    <div class="relative bg-gray-900 text-white">
        <div class="absolute inset-0 overflow-hidden">
            <img src="{{ asset('images/bv2.jpg') }}" alt="Belle vue du Cameroun" class="w-full h-full object-cover opacity-50">
        </div>
        <div class="relative container mx-auto px-4 py-24">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Réservez vos voyages et hébergements au Cameroun</h1>
                <p class="text-xl mb-8">La meilleure sélection d'agences de voyage pour découvrir toutes les richesses du Cameroun</p>
                
                <!-- Barre de recherche rapide -->
                <div class="w-full max-w-3xl bg-white rounded-lg p-4 shadow-lg">
                        <form class="flex flex-col md:flex-row gap-4">
                            <div class="flex-1">
                                <select class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option value="" disabled selected>Recherchez une agence</option>
                                    <option value="transport">Agence de transport</option>
                                    <option value="hotel">Agence d'hébergement</option>
                                    <option value="tourism">Agence touristique</option>
                                </select>
                            </div>
                            <div class="flex-1">
                                <select class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option value="" disabled selected>Ville</option>
                                    <option value="yaounde">Yaoundé</option>
                                    <option value="douala">Douala</option>
                                    <option value="kribi">Kribi</option>
                                    <option value="limbe">Limbé</option>
                                </select>
                            </div>
                            <button type="submit" class="bg-primary text-white p-3 rounded hover:bg-primary/90 transition duration-300">
                                <i class="fas fa-search mr-2"></i>Rechercher
                            </button>
                        </form>
                    </div>
        
            </div>
        </div>
    </div>

    <!-- Agences Partenaires -->
    <section id="agencies" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Nos Agences Partenaires</h2>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Découvrez notre réseau de plus de 50 agences de voyage à travers le Cameroun, offrant des services professionnels et personnalisés.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Agence 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <img src="{{ asset('images/Aguiabranca.jpeg') }}" alt="Agence de voyage" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-gray-800">AGUIABRANCA</h3>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star-half-alt text-yellow-400"></i>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Spécialiste des circuits touristiques à travers le Cameroun depuis plus de 15 ans.</p>
                        <div class="flex items-center text-gray-500 mb-4">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span>Douala, Quartier Akwa</span>
                        </div>
                        <a href="#" class="block text-center bg-primary text-white py-2 rounded-md hover:bg-green-700 transition">Voir les offres</a>
                    </div>
                </div>
                
                <!-- Agence 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <img src="{{ asset('images/biobioBus.jpeg') }}" alt="Agence de voyage" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-gray-800">BIO BIO</h3>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Voyages d'affaires et tourisme de luxe dans toutes les régions du Cameroun.</p>
                        <div class="flex items-center text-gray-500 mb-4">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span>Yaoundé, Centre-ville</span>
                        </div>
                        <a href="#" class="block text-center bg-primary text-white py-2 rounded-md hover:bg-green-700 transition">Voir les offres</a>
                    </div>
                </div>
                
                <!-- Agence 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <img src="{{ asset('images/cometa.jpeg') }}" alt="Agence de voyage" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-gray-800">COMETA EXPRESS</h3>
                            <div class="flex">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="far fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Spécialiste des séjours balnéaires et excursions sur la côte camerounaise.</p>
                        <div class="flex items-center text-gray-500 mb-4">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span>Kribi, Front de mer</span>
                        </div>
                        <a href="#" class="block text-center bg-primary text-white py-2 rounded-md hover:bg-green-700 transition">Voir les offres</a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-10">
                <a href="#" class="inline-flex items-center px-6 py-3 border border-primary text-primary hover:bg-primary hover:text-white rounded-md transition">
                    Voir toutes les agences
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Pourquoi nous choisir -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Pourquoi réserver via nos agences partenaires</h2>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Bénéficiez des meilleurs services de voyage au Cameroun avec notre réseau d'agences vérifiées.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg text-center">
                    <div class="text-primary text-4xl mb-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Agences vérifiées</h3>
                    <p class="text-gray-600">Toutes nos agences partenaires sont certifiées et régulièrement évaluées.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg text-center">
                    <div class="text-primary text-4xl mb-4">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Meilleurs tarifs</h3>
                    <p class="text-gray-600">Comparez et trouvez les meilleurs prix pour vos voyages et hébergements.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg text-center">
                    <div class="text-primary text-4xl mb-4">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Support 24/7</h3>
                    <p class="text-gray-600">Une assistance disponible en permanence pour répondre à vos questions.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg text-center">
                    <div class="text-primary text-4xl mb-4">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Paiement sécurisé</h3>
                    <p class="text-gray-600">Vos transactions sont protégées par des systèmes de sécurité avancés.</p>
                </div>
            </div>
        </div>
    </section>

     <!-- Services principaux -->
     <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Nos services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- avion -->
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/transport.jpg') }}" alt="Transport" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-primary mb-3">Envolez-vous  </h3>
                        <p class="text-gray-600 mb-4">Accédez à une multitude de vols, des compagnies low-cost aux vols long-courriers, grâce à nos agences partenaires spécialisées.  </p>
                        <a href="#" class="text-primary hover:underline font-medium flex items-center">
                            Découvrir <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                
                <!-- bus -->
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/omega.jpeg') }}" alt="Hébergement" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-primary mb-3">Voyagez en bus </h3>
                        <p class="text-gray-600 mb-4">Explorez des destinations variées à travers le pays grâce à notre vaste réseau de partenaires bus.</p>
                        <a href="#" class="text-primary hover:underline font-medium flex items-center">
                            Découvrir <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                
                <!-- train -->
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/train.jpg') }}" alt="Circuits touristiques" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-primary mb-3">Voyagez en train  </h3>
                        <p class="text-gray-600 mb-4">Optez pour la rapidité et le confort du train pour vos déplacements.</p>
                        <a href="#" class="text-primary hover:underline font-medium flex items-center">
                            Découvrir <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12"></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- appartement -->
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/hebergement.jpg') }}" alt="Transport" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-primary mb-3">Appartements </h3>
                        <p class="text-gray-600 mb-4">Profitez d'un espace généreux et de toutes les commodités nécessaires pour un séjour confortable.</p>
                        <a href="#" class="text-primary hover:underline font-medium flex items-center">
                            Découvrir <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                
                <!-- studio -->
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/studio.jpg') }}" alt="Hébergement" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-primary mb-3">Studios</h3>
                        <p class="text-gray-600 mb-4">Profitez d'un espace optimisé et fonctionnel avec nos studios partenaires.</p>
                        <a href="#" class="text-primary hover:underline font-medium flex items-center">
                            Découvrir <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                
                <!-- chambre -->
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/chambre.jpg') }}" alt="Circuits touristiques" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-primary mb-3">Chambres</h3>
                        <p class="text-gray-600 mb-4">Optez pour une chambre confortable et accueillante, idéale pour les voyageurs solo ou les couples. </p>
                        <a href="#" class="text-primary hover:underline font-medium flex items-center">
                            Découvrir <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations populaires -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Destinations populaires</h2>
            
            <div class="relative">
                <!-- Carrousel des destinations -->
                <div class="flex overflow-x-auto gap-6 pb-4 hide-scrollbar">
                    <!-- Destination 1: Yaoundé -->
                    <div class="min-w-[250px] md:min-w-[300px] rounded-lg overflow-hidden shadow-md relative group">
                        <img src="{{ asset('images/_ (1).jpeg') }}" alt="Yaoundé" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-xl font-bold mb-1">Yaoundé</h3>
                            <p class="text-sm opacity-90">La capitale aux sept collines</p>
                            <span class="inline-block mt-2 text-xs bg-primary/80 px-2 py-1 rounded">32 agences disponibles</span>
                        </div>
                    </div>
                    
                    <!-- Destination 2: Douala -->
                    <div class="min-w-[250px] md:min-w-[300px] rounded-lg overflow-hidden shadow-md relative group">
                        <img src="{{ asset('images/Douala 🔥🇨🇲.jpeg') }}" alt="Douala" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-xl font-bold mb-1">Douala</h3>
                            <p class="text-sm opacity-90">Capitale économique</p>
                            <span class="inline-block mt-2 text-xs bg-primary/80 px-2 py-1 rounded">48 agences disponibles</span>
                        </div>
                    </div>
                    
                    <!-- Destination 3: Kribi -->
                    <div class="min-w-[250px] md:min-w-[300px] rounded-lg overflow-hidden shadow-md relative group">
                        <img src="{{ asset('images/Évasion Ensoleillée à Kribi 🇨🇲.jpeg') }}" alt="Kribi" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-xl font-bold mb-1">Kribi</h3>
                            <p class="text-sm opacity-90">Plages paradisiaques</p>
                            <span class="inline-block mt-2 text-xs bg-primary/80 px-2 py-1 rounded">15 agences disponibles</span>
                        </div>
                    </div>
                    
                    <!-- Destination 4: Limbé -->
                    <div class="min-w-[250px] md:min-w-[300px] rounded-lg overflow-hidden shadow-md relative group">
                        <img src="{{ asset('images/limbe.jpeg') }}" alt="Limbé" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-xl font-bold mb-1">Limbé</h3>
                            <p class="text-sm opacity-90">La ville balnéaire</p>
                            <span class="inline-block mt-2 text-xs bg-primary/80 px-2 py-1 rounded">12 agences disponibles</span>
                        </div>
                    </div>
                    
                    <!-- Destination 5: Bafoussam -->
                    <div class="min-w-[250px] md:min-w-[300px] rounded-lg overflow-hidden shadow-md relative group">
                        <img src="{{ asset('images/_ (2).jpeg') }}" alt="Bafoussam" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-xl font-bold mb-1">Bafoussam</h3>
                            <p class="text-sm opacity-90">Cœur de l'Ouest</p>
                            <span class="inline-block mt-2 text-xs bg-primary/80 px-2 py-1 rounded">18 agences disponibles</span>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Ce que disent nos clients</h2>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Découvrez les expériences de voyageurs satisfaits qui ont réservé via notre plateforme.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"Service impeccable ! J'ai pu réserver mon voyage à Limbé en quelques clics et l'agence m'a fourni un service personnalisé de grande qualité."</p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/merveile.jpeg') }}" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Marie Nkodo</h4>
                            <p class="text-gray-500 text-sm">Douala</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"Excellente plateforme ! J'ai pu comparer plusieurs agences et choisir celle qui correspondait le mieux à mes besoins pour mon séjour à Kribi."</p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/merveile.jpeg') }}" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Jean Kamga</h4>
                            <p class="text-gray-500 text-sm">Yaoundé</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"TravelCam m'a permis de découvrir des agences spécialisées dans les circuits culturels que je ne connaissais pas. Mon voyage dans l'Ouest a été fantastique!"</p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/merveile.jpeg') }}" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Sophie Mballa</h4>
                            <p class="text-gray-500 text-sm">Bafoussam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistiques -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <!-- Statistique 1 -->
                <div>
                    <i class="fas fa-building text-4xl mb-4 text-secondary"></i>
                    <h3 class="text-4xl font-bold mb-2">125+</h3>
                    <p class="text-white/80">Agences partenaires</p>
                </div>
                
                <!-- Statistique 2 -->
                <div>
                    <i class="fas fa-ticket-alt text-4xl mb-4 text-secondary"></i>
                    <h3 class="text-4xl font-bold mb-2">15,000+</h3>
                    <p class="text-white/80">Réservations</p>
                </div>
                
                <!-- Statistique 3 -->
                <div>
                    <i class="fas fa-users text-4xl mb-4 text-secondary"></i>
                    <h3 class="text-4xl font-bold mb-2">9,500+</h3>
                    <p class="text-white/80">Clients satisfaits</p>
                </div>
                
                <!-- Statistique 4 -->
                <div>
                    <i class="fas fa-map-marker-alt text-4xl mb-4 text-secondary"></i>
                    <h3 class="text-4xl font-bold mb-2">25+</h3>
                    <p class="text-white/80">Villes couvertes</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Devenir Partenaire -->
<section class="py-16 bg-white border-t border-gray-200">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Vous êtes une agence de voyage ou d'hébergement ?</h2>
            <p class="text-xl text-gray-600 mb-8">Rejoignez notre réseau de partenaires et développez votre activité en touchant plus de clients à travers le Cameroun.</p>
            <div class="flex flex-col md:flex-row justify-center gap-6">
                <div class="bg-gray-50 p-6 rounded-lg shadow-md text-center">
                    <div class="text-primary text-4xl mb-4">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Visibilité nationale</h3>
                    <p class="text-gray-600">Attirez de nouveaux clients dans tout le pays.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-md text-center">
                    <div class="text-primary text-4xl mb-4">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Augmentez vos ventes</h3>
                    <p class="text-gray-600">Recevez plus de réservations grâce à notre plateforme.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-md text-center">
                    <div class="text-primary text-4xl mb-4">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Outils de gestion</h3>
                    <p class="text-gray-600">Gérez facilement vos offres et réservations.</p>
                </div>
            </div>
            
            <a href="#" class="inline-block mt-10 px-8 py-4 bg-secondary text-gray-800 rounded-md text-xl font-semibold hover:bg-yellow-400 transition shadow-md">
                <i class="fas fa-handshake mr-2"></i> Devenir partenaire
            </a>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script>
        // Script simple pour la démo
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des éléments au scroll
            const animateOnScroll = () => {
                const elements = document.querySelectorAll('.grid > div');
                elements.forEach(el => {
                    const rect = el.getBoundingClientRect();
                    const isVisible = rect.top < window.innerHeight && rect.bottom >= 0;
                    if (isVisible) {
                        el.classList.add('opacity-100');
                        el.classList.remove('opacity-0', 'translate-y-10');
                    }
                });
            };
            
            // Initialisation
            animateOnScroll();
            window.addEventListener('scroll', animateOnScroll);
        });
    </script>
</body>
</html>