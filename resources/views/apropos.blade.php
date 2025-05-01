<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - TravelCam | Plateforme de Réservation au Cameroun</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0E7D4D', // Vert du drapeau camerounais
                        secondary: '#FCD116', // Jaune du drapeau camerounais
                        accent: '#CE1126', // Rouge du drapeau camerounais
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
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
            <img src="{{ asset('images/apropos.jpg') }}" alt="Belle vue du Cameroun" class="w-full h-full object-cover opacity-50">
        </div>
        <div class="relative container mx-auto px-4 py-24">
            <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">À propos de TravelCam</h1>
                    <p class="text-lg max-w-3xl mx-auto">Découvrez notre histoire, notre mission et notre équipe dédiée à révolutionner l'expérience de voyage au Cameroun.</p>
            </div>
                
        
        </div>
    </div>

    <!-- Notre histoire -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="md:w-1/2">
                    <img src="{{ asset('images/apropos1.jpg') }}" alt="Histoire de TravelCam" class="rounded-lg shadow-md w-full">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold mb-6 text-primary">Notre histoire</h2>
                    <p class="text-gray-600 mb-4">TravelCam a été fondée en 2023 par un groupe d'entrepreneurs camerounais passionnés de technologie et de voyage. Face aux difficultés rencontrées pour réserver des transports et hébergements à travers le pays, ils ont décidé de créer une solution innovante et centralisée.</p>
                    <p class="text-gray-600 mb-4">Avec une première version lancée en janvier 2023 couvrant uniquement les grandes villes comme Yaoundé et Douala, la plateforme a rapidement évolué pour inclure des agences partenaires dans plus de 25 villes à travers le Cameroun.</p>
                    <p class="text-gray-600">Aujourd'hui, TravelCam est fière de connecter des milliers de voyageurs avec les meilleures agences de transport et d'hébergement du pays, contribuant ainsi au développement du tourisme local et à la digitalisation du secteur.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Notre mission et vision -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Notre mission -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-bullseye text-2xl text-primary"></i>
                    </div>
                    <h2 class="text-2xl font-bold mb-4 text-primary">Notre mission</h2>
                    <p class="text-gray-600 mb-4">Faciliter les déplacements et l'hébergement au Cameroun en offrant une plateforme technologique intuitive qui connecte les voyageurs avec des prestataires de services locaux fiables.</p>
                    <p class="text-gray-600">Nous nous engageons à simplifier chaque étape du voyage, de la réservation à l'arrivée à destination, en garantissant transparence, fiabilité et satisfaction client.</p>
                    <ul class="mt-6 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span class="text-gray-600">Connecter directement les voyageurs aux agences locales</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span class="text-gray-600">Offrir un système de réservation simple et sécurisé</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span class="text-gray-600">Promouvoir le tourisme local et la mobilité à travers le pays</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Notre vision -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-eye text-2xl text-primary"></i>
                    </div>
                    <h2 class="text-2xl font-bold mb-4 text-primary">Notre vision</h2>
                    <p class="text-gray-600 mb-4">Devenir la référence incontournable en matière de réservation de voyage au Cameroun et en Afrique centrale, en révolutionnant l'expérience utilisateur grâce à la technologie.</p>
                    <p class="text-gray-600">Nous aspirons à créer un écosystème digital complet qui valorise les services locaux, facilite la mobilité, et contribue activement au développement du tourisme dans la région.</p>
                    <ul class="mt-6 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span class="text-gray-600">Étendre notre réseau à toute l'Afrique centrale d'ici 2027</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span class="text-gray-600">Digitaliser complètement l'industrie du voyage au Cameroun</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span class="text-gray-600">Devenir un acteur majeur du développement touristique régional</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Nos valeurs -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-center text-primary">Nos valeurs</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Valeur 1: Transparence -->
                <div class="bg-gray-50 p-6 rounded-lg text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-primary">Transparence</h3>
                    <p class="text-gray-600">Nous nous engageons à être clairs et ouverts sur nos partenariats, nos prix et nos conditions de services.</p>
                </div>
                
                <!-- Valeur 2: Fiabilité -->
                <div class="bg-gray-50 p-6 rounded-lg text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-primary">Fiabilité</h3>
                    <p class="text-gray-600">Nos partenaires sont soigneusement sélectionnés pour garantir des services de qualité et des informations précises.</p>
                </div>
                
                <!-- Valeur 3: Accessibilité -->
                <div class="bg-gray-50 p-6 rounded-lg text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-universal-access text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-primary">Accessibilité</h3>
                    <p class="text-gray-600">Nous concevons nos services pour qu'ils soient accessibles à tous, quels que soient les moyens techniques ou financiers.</p>
                </div>
                
                <!-- Valeur 4: Promotion locale -->
                <div class="bg-gray-50 p-6 rounded-lg text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marked-alt text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-primary">Promotion locale</h3>
                    <p class="text-gray-600">Nous valorisons et promouvons le tourisme camerounais et les acteurs économiques locaux.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- L'équipe -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4 text-center text-primary">Notre équipe</h2>
            <p class="text-gray-600 text-center mb-12 max-w-3xl mx-auto">Des professionnels passionnés qui travaillent chaque jour pour améliorer l'expérience de voyage au Cameroun.</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Membre 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ceo.jpg') }}" alt="CEO" class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <div class="flex space-x-3">
                                <a href="#" class="bg-white p-2 rounded-full text-primary hover:text-white hover:bg-primary transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-primary hover:text-white hover:bg-primary transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-1">Jean-Paul Mbida</h3>
                        <p class="text-primary mb-3">CEO & Co-fondateur</p>
                        <p class="text-gray-600 text-sm">Entrepreneur expérimenté avec plus de 10 ans dans le secteur du tourisme au Cameroun.</p>
                    </div>
                </div>
                
                <!-- Membre 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/cto1.jpg') }}" alt="CTO" class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <div class="flex space-x-3">
                                <a href="#" class="bg-white p-2 rounded-full text-primary hover:text-white hover:bg-primary transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-primary hover:text-white hover:bg-primary transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-1">Marie Ngoumou</h3>
                        <p class="text-primary mb-3">CTO & Co-fondatrice</p>
                        <p class="text-gray-600 text-sm">Ingénieure en informatique passionnée par la tech et l'innovation dans le secteur touristique.</p>
                    </div>
                </div>
                
                <!-- Membre 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ctoo.jpg') }}" alt="CMO" class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <div class="flex space-x-3">
                                <a href="#" class="bg-white p-2 rounded-full text-primary hover:text-white hover:bg-primary transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-primary hover:text-white hover:bg-primary transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-1">Samuel Atangana</h3>
                        <p class="text-primary mb-3">Directeur Marketing</p>
                        <p class="text-gray-600 text-sm">Expert en marketing digital avec une profonde connaissance du marché camerounais.</p>
                    </div>
                </div>
                
                <!-- Membre 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/directrice.jpg') }}" alt="COO" class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <div class="flex space-x-3">
                                <a href="#" class="bg-white p-2 rounded-full text-primary hover:text-white hover:bg-primary transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-primary hover:text-white hover:bg-primary transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-1">Christine Ondoa</h3>
                        <p class="text-primary mb-3">Directrice des Opérations</p>
                        <p class="text-gray-600 text-sm">Spécialiste en gestion des opérations et partenariats avec les agences locales.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comment ça marche -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4 text-center text-primary">Comment ça marche</h2>
            <p class="text-gray-600 text-center mb-12 max-w-3xl mx-auto">Un processus simple et efficace pour réserver votre prochain voyage au Cameroun.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Étape 1 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-xl font-bold mb-4">1</div>
                    <h3 class="text-xl font-semibold mb-3">Recherchez</h3>
                    <p class="text-gray-600">Utilisez notre moteur de recherche pour trouver une agence ou un service selon vos critères.</p>
                    <img src="https://via.placeholder.com/200x150" alt="Recherche" class="mt-4 rounded-lg shadow-sm">
                </div>
                
                <!-- Étape 2 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-xl font-bold mb-4">2</div>
                    <h3 class="text-xl font-semibold mb-3">Comparez</h3>
                    <p class="text-gray-600">Consultez les différentes offres, prix et avis pour faire le meilleur choix.</p>
                    <img src="https://via.placeholder.com/200x150" alt="Comparaison" class="mt-4 rounded-lg shadow-sm">
                </div>
                
                <!-- Étape 3 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-xl font-bold mb-4">3</div>
                    <h3 class="text-xl font-semibold mb-3">Réservez</h3>
                    <p class="text-gray-600">Effectuez votre réservation en remplissant un formulaire simple et sécurisé.</p>
                    <img src="https://via.placeholder.com/200x150" alt="Réservation" class="mt-4 rounded-lg shadow-sm">
                </div>
                
                <!-- Étape 4 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-xl font-bold mb-4">4</div>
                    <h3 class="text-xl font-semibold mb-3">Voyagez</h3>
                    <p class="text-gray-600">Recevez votre confirmation et profitez de votre voyage en toute sérénité.</p>
                    <img src="https://via.placeholder.com/200x150" alt="Voyage" class="mt-4 rounded-lg shadow-sm">
                </div>
            </div>
            
            <!-- Call to action -->
            <div class="text-center mt-12">
                <a href="#" class="bg-primary text-white px-6 py-3 rounded-md font-medium hover:bg-primary/90 transition">Essayez maintenant</a>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4 text-center text-primary">Questions fréquentes</h2>
            <p class="text-gray-600 text-center mb-12 max-w-3xl mx-auto">Retrouvez les réponses aux questions les plus courantes sur nos services.</p>
            
            <div class="max-w-3xl mx-auto space-y-6">
                <!-- Question 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left font-semibold flex justify-between items-center focus:outline-none">
                        <span>Comment puis-je réserver un billet de bus ?</span>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="px-6 py-4 border-t">
                        <p class="text-gray-600">Pour réserver un billet de bus, utilisez notre moteur de recherche en sélectionnant "Transport" comme service, puis indiquez votre ville de départ, de destination et la date souhaitée. Vous pourrez ensuite comparer les offres des différentes agences, choisir celle qui vous convient et procéder à la réservation en renseignant vos informations personnelles.</p>
                    </div>
                </div>
                
                <!-- Question 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left font-semibold flex justify-between items-center focus:outline-none">
                        <span>Les prix affichés incluent-ils toutes les taxes ?</span>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="px-6 py-4 border-t">
                        <p class="text-gray-600">Oui, tous les prix affichés sur notre plateforme incluent les taxes et frais de service. Cependant, certains services optionnels proposés par les agences (bagages supplémentaires, assurances, etc.) peuvent engendrer des frais additionnels qui seront clairement indiqués avant la finalisation de votre réservation.</p>
                    </div>
                </div>
                
                <!-- Question 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left font-semibold flex justify-between items-center focus:outline-none">
                        <span>Comment puis-je annuler ou modifier ma réservation ?</span>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="px-6 py-4 border-t">
                        <p class="text-gray-600">Pour annuler ou modifier une réservation, connectez-vous à votre compte TravelCam et accédez à la section "Mes réservations". Sélectionnez la réservation concernée et cliquez sur "Modifier" ou "Annuler". Veuillez noter que les conditions d'annulation et de modification varient selon les agences partenaires. Ces conditions sont toujours indiquées lors de votre réservation.</p>
                    </div>
                </div>
                
                <!-- Question 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left font-semibold flex justify-between items-center focus:outline-none">
                        <span>Comment sont sélectionnées les agences partenaires ?</span>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="px-6 py-4 border-t">
                        <p class="text-gray-600">Nous sélectionnons rigoureusement nos agences partenaires selon plusieurs critères : légalité des opérations, qualité des services, fiabilité, satisfaction client et engagement professionnel. Nous effectuons régulièrement des contrôles et suivons les avis des utilisateurs pour garantir le maintien de la qualité des services proposés sur notre plateforme.</p>
                    </div>
                </div>
                
                <!-- Question 5 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left font-semibold flex justify-between items-center focus:outline-none">
                        <span>Comment puis-je devenir partenaire de TravelCam ?</span>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="px-6 py-4 border-t">
                        <p class="text-gray-600">Si vous êtes une agence de transport, d'hébergement ou de tourisme au Cameroun et souhaitez rejoindre notre plateforme, rendez-vous sur la page "Devenir partenaire" accessible depuis le pied de page. Remplissez le formulaire de candidature et notre équipe vous contactera sous 48 heures pour discuter des modalités de partenariat.</p>
                    </div>
                </div>
            </div>
            
            <!-- Plus de questions -->
            <div class="text-center mt-10">
                <a href="#" class="text-primary hover:underline font-medium">Voir toutes les questions fréquentes</a>
            </div>
        </div>
    </section>

    <!-- Nos partenaires -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4 text-center text-primary">Nos partenaires principaux</h2>
            <p class="text-gray-600 text-center mb-12 max-w-3xl mx-auto">Des acteurs majeurs du transport et de l'hébergement au Cameroun qui nous font confiance.</p>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8">
                <!-- Partenaire 1 -->
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                
                <!-- Partenaire 2 -->
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo2.jpeg') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                
                <!-- Partenaire 3 -->
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo2.png') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                <!-- Partenaire 4 -->
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo4.jpeg') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                <!-- Partenaire 5 -->  
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo5.png') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                <!-- Partenaire 6 -->
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo6.png') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                <!-- Partenaire 7 -->
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo7.png') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                <!-- Partenaire 8 -->
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo8.png') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                <!-- Partenaire 9-->  
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo3.jpeg') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                <!-- Partenaire 10 -->
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo8.jpeg') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                <!-- Partenaire 11 -->
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo6.jpeg') }}" alt="Logo partenaire" class="max-h-16">
                </div>
                <!-- Partenaire 12 -->
                <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/logo5.jpeg') }}" alt="Logo partenaire" class="max-h-16">
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
     
     <!-- Pied de page -->
     <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <!-- À propos -->
                <div>
                    <h3 class="text-xl font-bold mb-4">À propos de TravelCam</h3>
                    <p class="text-gray-400 mb-4">Plateforme camerounaise dédiée à faciliter vos réservations de transport et d'hébergement dans tout le pays.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-secondary transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white hover:text-secondary transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white hover:text-secondary transition"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white hover:text-secondary transition"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <!-- Liens rapides -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Accueil</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">À propos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Nos agences</a></li>
                        <li><a href="#" class="text-gray-<li><a href="#" class="text-gray-400 hover:text-white transition">Services</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Politique de confidentialité</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Conditions d'utilisation</a></li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Nos services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Transport interurbain</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Hôtels et résidences</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Circuits touristiques</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Location de véhicules</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Voyages organisés</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Transport VIP</a></li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Restez informé</h3>
                    <p class="text-gray-400 mb-4">Inscrivez-vous à notre newsletter pour recevoir nos meilleures offres et actualités.</p>
                    <form class="flex flex-col sm:flex-row gap-2">
                        <input type="email" placeholder="Votre adresse email" class="px-4 py-2 rounded bg-gray-800 border border-gray-700 focus:outline-none focus:border-secondary text-white flex-grow">
                        <button type="submit" class="px-4 py-2 bg-secondary text-white rounded hover:bg-secondary/90 transition">S'abonner</button>
                    </form>
                </div>
            </div>
            
            <!-- Ligne séparatrice -->
            <div class="border-t border-gray-800 my-8"></div>
            
            <!-- Copyright et mentions légales -->
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">&copy; 2025 TravelCam. Tous droits réservés.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#" class="text-gray-400 hover:text-white transition text-sm">Mentions légales</a>
                    <a href="#" class="text-gray-400 hover:text-white transition text-sm">Politique de confidentialité</a>
                    <a href="#" class="text-gray-400 hover:text-white transition text-sm">Conditions générales</a>
                    <a href="#" class="text-gray-400 hover:text-white transition text-sm">Plan du site</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script pour les carrousels -->
    <script>
        // Script simple pour simuler les carrousels
        // En production, utilisez une bibliothèque comme Swiper.js ou similaire
        document.addEventListener('DOMContentLoaded', function() {
            // Fonctions pour gérer les carrousels - à compléter avec une vraie implémentation
            // Ici, c'est juste pour montrer la structure
            console.log('Carrousels chargés');
            
            // Exemple de fonction pour le carousel principal (à implémenter)
            function setupMainCarousel() {
                // Code pour gérer le carousel principal
            }
            
            // Initialisation
            setupMainCarousel();
        });
    </script>
</body>
</html>

                